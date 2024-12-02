<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;

class ConfirmarCorreoController
{
    // RETORNAR LA VISTA CON EL FORMULARIO PARA CONFIRMAR EL CORREO
    public function index($id_user)
    {
        $validarVerifiUser = User::where('user_id',$id_user)->first();
        if ($validarVerifiUser->email_verified === 'true') {
            return redirect()->route('login')->with('success','Su correo ya fue confirmado anteriormente, puede iniciar sesión');
        }
        else{
            return view('auth.confirmarCorreo', compact('id_user'));    
        }
    }
    // LOGICA PARA VALIDAR EL CODIGO ENVIADO EL CORREO DEL USUARIO
    public function confirmCodigo(Request $request, $id_user)
    {
        $request->validate([
            'codigoCorreo'=>'required|string|regex:/^[A-Z0-9]{8}$/',
        ]);

        $codigo = $request->post('codigoCorreo');
        $userConfirm = User::where('user_id', $id_user)->first();
        
        if (password_verify($codigo, $userConfirm->email_verified)) {
            $userConfirm->email_verified = 'true';
            $userConfirm->save();
            return redirect()->route('login')->with('success','Su correo fue confirmado con éxito, ya puede iniciar sesión');
        }else {
            return redirect()->back()->with('danger','El código ingresado es incorrecto');
        }
    }
    // REFRESCAR EL CODIGO DEL USUARIO
    public function refrescarCodigo($id_user)
    {
        $emailUser = User::where('user_id', $id_user)->first();
        $EmailController = new EmailController;
        $EmailController->sendEmail($id_user, $emailUser->email);
        return redirect()->route('correo.confirm', $id_user)->with('success','Se ha enviado un nuevo código, verifique su correo');   
    }
}
