<?php

namespace App\Http\Controllers;

use App\Models\SecretQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CambioContrasenaPreguntasController
{
    public function index()
    {
        return view('cambiosContrasenas.porPregunstas.contrasPreguntas');
    }

    public function findCorreo(Request $request)
    {
        $request->validate([
            'email' => 'required|string|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/',
        ]);
        $userId = User::where('email', $request->post('email'))->first();
        return redirect()->route('user.preguntas', ['id_user' => $userId->user_id]);
    }

    public function preguntasUser($id_user)
    {
        $userEmail = User::where('user_id', $id_user)->first();
        $questionsUser = SecretQuestion::select('fk_question', 'question')
            ->join('questions', 'questions.id_question', '=', 'secret_questions.fk_question')
            ->where('fk_user', $id_user)
            ->get();
        return view('cambiosContrasenas.porPregunstas.formPreguntas', compact('questionsUser', 'userEmail'));
    }

    public function respuestasUser(Request $request, $id_user)
    {
        $request->validate([
            'respuestaN1' => 'required|string',
            'respuestaN2' => 'required|string',
            'respuestaN3' => 'required|string',
        ]);

        $questionsXusers = SecretQuestion::where('fk_user', $id_user)->get();

        $respuestas = [
            'respuestaN1' => $request->post('respuestaN1'),
            'respuestaN2' => $request->post('respuestaN2'),
            'respuestaN3' => $request->post('respuestaN3'),
        ];

        $coincidencias = true;

        foreach ($questionsXusers as $question) {
            $respuestaKey = 'respuestaN' . $question->fk_question; 

            if (!password_verify($respuestas[$respuestaKey], $question->answer)){
                $coincidencias = false;
                break;
            }
        }

        if (!$coincidencias) {
            return redirect()->back()->with('danger','Alguna o varias de las respuestas son incorrectas');
        }

        return redirect()->route('userPass.edit',['id_user' => $id_user]);
    }

    public function updatePass(Request $request, $id_user)
    {
        $request->validate([
            'newPassword' => 'required|string|min:8',
            'passwordConfirmation' => 'required|string|min:8',
        ]);

        if ($request->post('newPassword') == $request->post('passwordConfirmation')) {

            User::where('user_id',$id_user)
            ->update(
                ['password' => Hash::make($request->post('newPassword'))],
            );
            return redirect()->route('login')->with('success','Contraseña actualizada con éxito');
        }
        return redirect()->back()->with('danger','Las contraseñas no coinciden');
    }
}
