<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ciudades;
use App\Models\Comunas;
use App\Models\Inscripciones;


class MantenedoresController extends Controller
{
    public function ajax_load_ciudades(Request $request)
    {
    	$ciudades = Ciudades::where('id_region', $request->id_region)
    		->where('activo', '1')
    		->get();
		return response()->json($ciudades);
    }

    public function ajax_load_comunas(Request $request)
    {
		$ciudades = Comunas::where('id_ciudad', $request->id_ciudad)
			->where('activo', '1')
			->get();
		return response()->json($ciudades);
    }

    public function ajax_num_inscritos(Request $request)
    {
        $num_inscritos = Inscripciones::where('id_curso', $request->id_curso)
            ->where('matriculado', '0')
            ->get()
            ->count();
        return response()->json($num_inscritos);
    }
    
}
