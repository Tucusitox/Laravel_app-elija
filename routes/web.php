<?php

use App\Http\Controllers\AutenticationController;
use App\Http\Controllers\CambioContrasenaCorreoController;
use App\Http\Controllers\CambioContrasenaPreguntasController;
use App\Http\Controllers\ConfirmarCorreoController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\sessionInactiva;

Route::get('/', function () {
    return view('auth.singIn');
})->name('login');

// RUTAS PARA AUTENTICAR Y REGISTRAR USUARIOS
Route::post('/autenticar', [AutenticationController::class, 'autenticar'])->name('autenticar.index');
Route::get('/registrar', [RegisterController::class, 'index'])->name('registrar.index');
Route::post('/registro', [RegisterController::class, 'store'])->name('registrar.store');

// RUTAS PARA CONFIRMAR CORREOS DE USUARIOS REGISTRADOS
Route::get('/confirmar/correo/{id_user}', [ConfirmarCorreoController::class, 'index'])->name('correo.confirm');
Route::post('/confirmar/codigo/{id_user}', [ConfirmarCorreoController::class, 'confirmCodigo'])->name('confirm.codigo');
Route::post('/refrescar/codigo/{id_user}', [ConfirmarCorreoController::class, 'refrescarCodigo'])->name('refresh.codigo');

// RUTA PRINCIPAL PARA CAMBIOS DE CONTRASEÑA DE USUARIOS
Route::get('/cambio/contrasena', function () {
    return view('cambiosContrasenas.cambioContraseña');
})->name('cambio.contras');

// RUTAS PARA CAMBIOS DE CONTRASEÑA DE USUARIOS POR CORREO
Route::get('/cambio/contrasena/correo', [CambioContrasenaCorreoController::class, 'index'])->name('cambio.correo');
Route::post('/cambiando/contrasena/correo', [CambioContrasenaCorreoController::class, 'store'])->name('cambioCorreo.enviar');
Route::get('/contraseña/comfirmar/{id_user}', [CambioContrasenaCorreoController::class, 'confirmContras'])->name('contras.confirm');
Route::post('/recuperando/contrasena/{id_user}', [CambioContrasenaCorreoController::class, 'recuperarContras'])->name('recuperar.contras');

// RUTAS PARA CAMBIOS DE CONTRASEÑA DE USUARIOS POR PREGUNTAS DE SEGURIDAD
Route::get('/cambio/contrasena/preguntas', [CambioContrasenaPreguntasController::class, 'index'])->name('cambio.preguntas');
Route::post('/buscar/user/correo', [CambioContrasenaPreguntasController::class, 'findCorreo'])->name('preguntas.findCorreo');
Route::get('/user/preguntas/{id_user}', [CambioContrasenaPreguntasController::class, 'preguntasUser'])->name('user.preguntas');
Route::post('/user/respuestas/{id_user}', [CambioContrasenaPreguntasController::class, 'respuestasUser'])->name('user.respuestas');

Route::get('/user/edit/password/{id_user}', function ($id_user) {
    return view('cambiosContrasenas.porPregunstas.contrasNew', compact('id_user'));
})->name('userPass.edit');

Route::put('/user/update/password/{id_user}', [CambioContrasenaPreguntasController::class, 'updatePass'])->name('userPass.update');

// RUTAS PARA EL USUARIO AUTENTICADO
Route::middleware(['auth', sessionInactiva::class])->group(function () {
    // DASHNOARD PERFIL
    Route::get('/dashboard', [AutenticationController::class, 'dashboard'])->name('user.dashboard');
    // DASHNOARD SITIOS WEBS
    Route::get('/sitios/webs', function () {
        return view('viewsDashboard.sitiosWebDashboard');
    })->name('user.sitiosWeb');
    // DASHNOARD REDES SOCIALES
    Route::get('/redes/sociales', function () {
        return view('viewsDashboard.redesSocialesDashboard');
    })->name('user.redesSociles');
    // LOGOUT
    Route::post('/logout', [AutenticationController::class, 'logout'])->name('user.logout');

    // RUTA PARA ACTUALIZAR LA SESION CUANDO EL USUARIO INTERACTUE CON LA APP
    Route::post('/actualizarSesion', function () {
        session()->put('ultimaActividad', time());
        return response()->json(['ultimaActividad' => session('ultimaActividad')]);
    });
});
