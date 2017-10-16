<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Validaciones Personalizadas
        Validator::extend('mayor_que', function($attribute, $value, $params, $validator){
            $request = app(Request::class);
            $other = $request->input($params[0]);
            return intval($value) > intval($other);
        });

        Validator::extend('tabla_existe', function($attribute, $value, $params, $validator){
            $request = app(Request::class);
            $horarios = json_decode($request->tabla_array);
            
            if(count($horarios) > 0 ) return true;
            else return false;
        });

        Validator::extend('fecha_mayor_que', function($attribute, $value, $params, $validator){
            $request = app(Request::class);
            $other = $request->input($params[0]);

            $f_inicio = date('d/m/Y', strtotime(str_replace('/', '-', $request->input($attribute))));
            $f_fin = date('d/m/Y', strtotime(str_replace('/', '-', $request->input($params[0]))));

            if($f_inicio>$f_fin) return true;
            else return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
