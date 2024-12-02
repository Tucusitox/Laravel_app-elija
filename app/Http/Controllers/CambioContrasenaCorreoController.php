<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Hash;

class CambioContrasenaCorreoController
{
    public function index()
    {
        return view('cambiosContrasenas.porCorreo.contraseñaPorCorreo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/',
        ]);

        $contrasUser = User::where('email', $request->post('email'))->first();
        $EmailController = new EmailController;
        $EmailController->cambioContraseña($contrasUser->user_id, $contrasUser->email);
        return redirect()->route('contras.confirm',['id_user'=>$contrasUser->user_id]);
    }

    public function confirmContras($id_user)
    {
        return view('cambiosContrasenas.porCorreo.formCambioContraseña',compact('id_user'));
    }

    public function recuperarContras(Request $request, $id_user)
    {
        $request->validate([
            'contraseña' => 'required|string|min:8',
            'codigoRecuperacion'=>'required|string|regex:/^[A-Z0-9]{8}$/',
        ]);

        $user = User::where('user_id',$id_user)->first();

        if (password_verify($request->post('codigoRecuperacion'), $user->password)) {
            $user->password = Hash::make($request->post('contraseña'));
            $user->save();
            return redirect()->route('login')->with('success','Contraseña cambiada con éxito');
        } 
        else {
            return redirect()->back()->with('danger','El código de confirmación es incorrecto');
        }
    }
}
