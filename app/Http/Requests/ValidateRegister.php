<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ValidateRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [ 
            'tiposNaci' => 'required',
            'direccion' => 'required|string|min:30|max:150',
            'genero' => 'required|in:1,2',
            'foto' => 'required|image|max:2024',
            'fechaNaci' => ['required','validateFechaNacimiento:'.$request->post('fechaNaci')],
            'nombres' => 'required|string|regex:/^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+$/',
            'apellidos' => 'required|string|regex:/^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]+$/',
            "descripcion" => 'required|string|min:30|max:300',
            'correo' => 'required|string|unique:users,email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/',
            'contraseña' => 'required|string|min:8',
            'tipoRedSocial' => 'required|in:1,2,3,4',
            'socialRedUser' => 'required|string|min:3',
            'sitioWeb' => ['nullable','regex:/^https?:\/\/[\w\-]+(\.[\w\-]+)+[\/#?]?.*$/','UrlValidate:'.$request->post('sitioWeb')],
            'preguntaN1' => 'required|string|min:3',
            'preguntaN2' => 'required|string|min:3',
            'preguntaN3' => 'required|string|min:3',
            'identificacion' => ['required','unique:persons,person_identification','validateIdentification:'.$request->post('tiposNaci')],
        ];
    }
}
