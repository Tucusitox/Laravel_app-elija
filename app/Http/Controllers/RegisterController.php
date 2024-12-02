<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRegister;
use App\Http\Controllers\EmailController;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Person;
use App\Models\Question;
use App\Models\SecretQuestion;
use App\Models\SocialNetwork;
use App\Models\SocialnetworksXUser;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Facades\Hash;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;

class RegisterController
{
    // REGISTROS DE LA BASE DE DATOS PARA EL FORMULARIO DE REGISTRO
    public function index()
    {
        $generos = Gender::all();
        $tiposNaci = Nationality::select('id_nationality', 'nationality_name')->get();
        $socialesRedes = SocialNetwork::all();
        $preguntasSeg = Question::all();
        return view('auth.register', compact('generos', 'tiposNaci', 'socialesRedes', 'preguntasSeg'));
    }
    // GENERAR EL REGISTRO DEL USUARIO
    public function store(ValidateRegister $request)
    {
        if ($request->validated()) {
            // PROCESAMOS LA IMAGEN ENVIADA POR EL USUARIO
            $foto = $request->file("foto");
            $destinoCarpeta = "img/imgUsers";
            $rutaImg = "/" . $foto->getClientOriginalName();
            $request->file("foto")->move($destinoCarpeta, $rutaImg);
            $rutaFinalImg = $destinoCarpeta . $rutaImg; //DEFINIMOS LA RUTA DE LA IMAGEN

            // INSERTAR DATOS EN LA TABLA "persons"
            Person::insert([
                [
                    'fk_gender' => $request->post('genero'),
                    'fk_nationality' => $request->post('tiposNaci'),
                    'person_identification' => $request->post('identificacion'),
                    'person_img' => $rutaFinalImg,
                    'person_name' => $request->post('nombres'),
                    'person_lastname' => $request->post('apellidos'),
                    'person_birthDate' => $request->post('fechaNaci'),
                    'person_description' => $request->post('descripcion'),
                    'person_address' => $request->post('direccion'),
                ]
            ]);
            // CAPTURANDO ULTIMO ID GENERADO EN LA TABLA "persons"
            $ultPersRegis = Person::orderBy('id_person', 'desc')->first();
            $idPerson = $ultPersRegis->id_person;

            // INSERTAR DATOS EN LA TABLA "users"
            User::insert([
                [
                    'fk_person' => $idPerson,
                    'email' => $request->post('correo'),
                    'password' => Hash::make($request->post('contraseña')),
                ],
            ]);

            // CAPTURANDO ULTIMO ID GENERADO EN LA TABLA "users"
            $ultUserRegis = User::orderBy('user_id', 'desc')->first();
            $id_user = $ultUserRegis->user_id;

            // INSERTAR DATOS EN LA TABLA "socialNetworks_x_users"
            SocialnetworksXUser::insert([
                [
                    'fk_socialNetwork' => $request->post('tipoRedSocial'),
                    'fk_user' => $id_user,
                    'socialNetwUser_name' => $request->post('socialRedUser'),
                ],
            ]);

            // INSERTAR DATOS EN LA TABLA "secret_questions"
            SecretQuestion::insert([
                [
                    'fk_question' => 1,
                    'fk_user' => $id_user,
                    'answer' => Hash::make($request->post('preguntaN1')),
                ],
                [
                    'fk_question' => 2,
                    'fk_user' => $id_user,
                    'answer' => Hash::make($request->post('preguntaN2')),
                ],
                [
                    'fk_question' => 3,
                    'fk_user' => $id_user,
                    'answer' => Hash::make($request->post('preguntaN3')),
                ],
            ]);

            if ($request->post('sitioWeb') != null) {
                $url = $request->post('sitioWeb');
                $fecha = date('Y-m-d');
                $screenshotPath = 'img/urlCaptures/' . $fecha . uniqid() . '.png';

                // CAPTURAR TITULO DE LA PAGINA
                $titleUrl = Browsershot::url($url)
                    ->evaluate('document.title');
    
                // CAPTURA DE PANTALLA DE LA PAGINA
                Browsershot::url($url)
                    ->windowSize(1280, 800)
                    ->save($screenshotPath);
    
                // GUARDAR EN LA BASE DE DATOS
                Website::insert([
                    [
                        'fk_user' => $id_user,
                        'website_tittle' => $titleUrl,
                        'website_url' => $url,
                        'website_img' => $screenshotPath,
                    ],
                ]);
    
                // ENVIAR CORREO DE CONFIRMACION
                $EmailController = new EmailController;
                $EmailController->sendEmail($id_user, $request->post('correo'));
                return redirect()->route('correo.confirm', $id_user);
            }

            $EmailController = new EmailController;
            $EmailController->sendEmail($id_user, $request->post('correo'));
            return redirect()->route('correo.confirm', $id_user);
        }
    }
}
