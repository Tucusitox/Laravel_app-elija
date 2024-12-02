<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Nationality;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('validateIdentification', function ($attribute, $value, $parameters, $validator) {
            $tiposNaci = $parameters[0];

            // VALIDAMOS LA IDENTIFICACION INGRESADA CON LAS REGEX DE LA TABLA "nationalities"
            $nacionalidad = Nationality::select('nationality_regex')
                ->where('id_nationality', $tiposNaci)
                ->first();

            if (!$nacionalidad || !$nacionalidad->nationality_regex) {
                return false;
            }
            
            return true;
        });

        // RETORNAR MENSAJE DE ERROR DE VALIDACION
        Validator::replacer('validateIdentification', function ($message, $attribute, $rule, $parameters) {
            return "El campo $attribute no cumple con el formato esperado para la nacionalidad seleccionada";
        });
    }

    public function register()
    {
        //
    }
}
