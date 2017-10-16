<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudades;

class CiudadesController extends Controller
{
    public function get_ciudades(Request $request)
    {
    	$ciudades = Ciudades::where('id_region', $request->id_region);
    	dd($ciudades);
    	return response()->json([
    		'ciudades' => $ciudades
    		]);
    }
}
