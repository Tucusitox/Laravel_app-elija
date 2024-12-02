<?php

namespace App\Http\Controllers;

use App\Models\SessionsUser;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticationController
{
    // METODO DE AUTENTICACION
    public function autenticar(Request $request)
    {
        // CASO 1: EVALUAR SI EXISTE ALGUNA SESIÓN ABIERTA EN EL NAVEGADOR
        if (Auth::check()) {
            return redirect()->route('login')->with('danger', 'Ya existe una Sesión Activa en el Navegador');
        }
        // OBTENER LAS CREDENCIALES DE ACCESO Y VALIDARLAS
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);
        // SI LAS CREDENCIALES SON CORRECTAS
        if (Auth::attempt($credentials)) 
        {   //OBTENER LOS DATOS DEL USUARIO UTENTICADO
            $user = Auth::user();
            // CASO 2: VALIDAR SI EL CORREO ESTA VERIFICADO
            if ($user->email_verified !== 'true') {
                $this->logoutAndRedirect($request);
                return redirect()->route('correo.confirm', ['id_user'=>$user->user_id]);
            }
            // CASO 3: VALIDAR SI YA TIENE UNA SESION ACTIVA
            if (SessionsUser::where('fk_user', $user->user_id)->where('session_status', 'activo')->exists()) {
                $this->logoutAndRedirect($request);
                return redirect()->route('login')->with('danger', 'Este usuario tiene una sesión activa en el sistema');
            }
            // CASO IDEAL: INICIAR LA SESION DEL USURIO
            SessionsUser::create([
                'fk_user' => $user->user_id,
                'session_date' => now()->setTimezone('America/Caracas')->format('Y-m-d'),
                'session_time_start' => now()->setTimezone('America/Caracas')->format('H:i:s'),
                'session_time_closing' => null,
                'session_duration' => null,
                'session_status' => 'activo',
            ]);
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }
        // SI LAS CREDENCIALES SON INCORRECTAS REDIRIGIR AL USUARIO AL LOGIN
        return redirect()->route('login')->with('danger', 'Correo o clave incorrectos');
    }

    // METODO DE CIERRE DE SESIÓN
    public function logout(Request $request)
    {
        // CAPTURAR EL TIEMPO DE INICIO DE LA SESION
        $sessionInicio = SessionsUser::select('session_time_start')
            ->where('fk_user', Auth::id())
            ->whereNull('session_time_closing')
            ->first();

        // CALCULAR LA DIFERENCIA ENTRE EL INICIO Y FNAL DE LA SESION
        $inicio = new DateTime($sessionInicio->session_time_start);
        $actual = new DateTime(now()->setTimezone('America/Caracas')->format('H:i:s'));
        $diferencia = $inicio->diff($actual);

        // ACTUALIZAR LA TABLA CON LOS NUEVOS DATOS
        SessionsUser::where('fk_user', Auth::id())
            ->whereNull('session_time_closing')
            ->update([
                'session_time_closing' => now()->setTimezone('America/Caracas')->format('H:i:s'),
                'session_status' => 'inactivo',
                'session_duration' => $diferencia->format('%h:%i:%s'),
            ]);

        // CERRAR LA SESION DEL USUARIO
        $this->logoutAndRedirect($request);
        session()->forget('ultimaActividad');
        return redirect()->route('login');
    }

    // METODO PARA MANEJAR UXILIAR PARA EL CIERRE DE SESION DEL NAVEGADOR
    private function logoutAndRedirect(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    // METODO PARA DAR ACCESO AL DASHBOARD
    public function dashboard()
    {
        $userDetalles = User::select('*')
        ->selectRaw("CONCAT(person_name,' ',person_lastname) AS Nombre_Apellido")
        ->selectRaw("TIMESTAMPDIFF(YEAR, person_birthDate, NOW()) AS person_age")
        ->join('persons','persons.id_person','=','users.fk_person')
        ->where('user_id', Auth::Id())
        ->first();
        return view('viewsDashboard.perfilDashboard', compact('userDetalles'));
    }
}
