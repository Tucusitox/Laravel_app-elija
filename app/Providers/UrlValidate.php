<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class UrlValidate extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('UrlValidate', function ($attribute, $value, $parameters, $validator) {
            $sitioWeb = $parameters[0];

            // VALIDAR SI LA URL EXISTE
            if (!filter_var($sitioWeb, FILTER_VALIDATE_URL)) {
                return false;
            }
            // VERIFICAR SI LA URL RESPONDE A UN ESTADO VALIDO COMO UN 200 POR EJEMPLO
            $headers = @get_headers($sitioWeb); // @ SILENCIAR ERRORES DE HOST NO ENCONTRADO"
            if (!$headers || strpos($headers[0], '200') === false) {
                return false;
            }
            
            return true;
        });

        // RETORNAR MENSAJE DE ERROR DE VALIDACION
        Validator::replacer('UrlValidate', function ($message, $attribute, $rule, $parameters) {
            return "La página a la que apunta el campo $attribute no existe o no es accesible ";
        });
    }


    public function register(): void
    {
        //
    }
}
