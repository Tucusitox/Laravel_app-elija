<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmailController
{
    // ENIVAR CORREO DE CONFIRMACION AL USUARIO CON UN CODIGO ALEATORIO
    public function sendEmail($id_user, $destinatario)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $longitud = 8;
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        // GENERAR UPDATE EN LA TABLA CON EL CODIGO DE CONFIRMACION
        User::where('user_id', $id_user)->update(['email_verified' => Hash::make($codigo)]);
        // ENVIAR CORREO AL USUARIO MEDIANTE UN JOB EN SEGUNDO PLANO
        $mensaje = "Estimado usuario confirme su correo con el siguiente código:";
        dispatch(new SendEmailJob($codigo, $mensaje, $destinatario));
    }
    // ENIVAR CORREO DE CONFIRMACION AL USUARIO CON UN CODIGO ALEATORIO
    public function cambioContraseña($id_user, $destinatario)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $longitud = 8;
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        // GENERAR UPDATE EN LA TABLA CON LA CONTRASEÑA
        User::where('user_id', $id_user)->update(['password' => Hash::make($codigo)]);
        // ENVIAR CORREO AL USUARIO MEDIANTE UN JOB EN SEGUNDO PLANO
        $mensaje = "Estimado usuario recupere su contraseña con el siguiente código:";
        dispatch(new SendEmailJob($codigo, $mensaje, $destinatario));
    }
}
