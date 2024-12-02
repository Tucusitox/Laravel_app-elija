<?php

namespace App\Providers;

use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class FechaNacimientoProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('validateFechaNacimiento', function ($attribute, $value, $parameters, $validator) 
        {
            // CAPTURAR VARIABLES
            $fechaNaci = $parameters[0];
            $bolean = '';
            // VALIDAR EL FORMATO DE LA FECHA
            if (!preg_match('/^\d{4}\-\d{2}\-\d{2}$/', $fechaNaci)) {
                return false;
            }
            // VALIDAR SI EL USUARIO ES MAYOR DE EDAD
            $fechaActual = date('Y-m-d');
            $fechaNaci_convertida = DateTime::createFromFormat('Y-m-d', $fechaNaci);
            $fecha_actual_convertida = new DateTime($fechaActual);
            $edad = $fecha_actual_convertida->diff($fechaNaci_convertida)->y;
            // SI ES >=19 AÑOS RETORNA TRUE SI NO RETORNA FALSE 
            $edad >= 18 ? $bolean = true : $bolean = false;
            return $bolean;
        });
        // RETORNAR MENSAJE DE VALIDACION
        Validator::replacer('validateFechaNacimiento', function ($message, $attribute, $rule, $parameters)
        {
            // CAPTURAR VARIABLES
            $fechaNaci = $parameters[0];
            // VALIDAR EL FORMATO DE LA FECHA
            if (!preg_match('/^\d{4}\-\d{2}\-\d{2}$/', $fechaNaci)) {
                return "¡El formato de la fecha de nacimiento es incorrecto! Debe ser DD/MM/AAAA";
            }
            // SI LA EDAD ES >= 18 RETORNAR ESTE MENSAJE
            return "El usuario debe ser mayor de edad para registrarse en el sistema";
        });
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
}
