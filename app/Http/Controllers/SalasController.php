<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;
use App\Models\Regiones;
use App\Models\Ciudades;
use App\Models\Comunas;
use App\Models\Disponibilidades;
use App\Models\Tipo_Horarios;
use DB;
use Datatables;

class SalasController extends Controller
{
    public function index(Request $request)
    {
    	return view('Mantenedores.Salas.index');
    }

	public function search(Request $request)
    {
        $salas = Salas::join('comunas', 'comunas.id_comuna', '=', 'salas.id_comuna')
                    ->join('ciudades', 'ciudades.id_ciudad', '=', 'comunas.id_ciudad')
                    ->join('regiones', 'regiones.id_region', '=', 'ciudades.id_region')
                    ->leftJoin('disponibilidades', 'disponibilidades.id_disponibilidad', '=', 'salas.id_disponibilidad')
                    ->leftJoin('tipo_horarios', 'tipo_horarios.id_tipo_horario', '=', 'salas.id_tipo_horario')
                    ->orderBy('comunas.id_comuna', 'asc')
                    ->select([
                        'salas.id_sala', 
                        'salas.nombre', 
                        'salas.direccion', 
                        'salas.id_comuna', 
                        'comunas.desc_comuna', 
                        'ciudades.desc_ciudad', 
                        'regiones.desc_region',
                        'salas.capacidad',
                        DB::RAW("CASE salas.banco_prueba WHEN 1 THEN 'Si' ELSE 'No' END AS banco_prueba"),
                        DB::RAW("CASE salas.id_disponibilidad WHEN 3 THEN CONCAT(disponibilidades.nom_disponibilidad, ' (', dia, ')') ELSE disponibilidades.nom_disponibilidad END AS disponibilidad"),
                        DB::raw("CONCAT(DATE_FORMAT(h_inicio, '%H:%i'), ' a ', DATE_FORMAT(h_fin, '%H:%i')) AS tipo_horario"),
                        'salas.dia'
                    ]); 

        return Datatables::of($salas)
                ->addColumn('editar', function($salas) {
                    $col = '<a href="javascript:;" onclick="editar('.$salas->id_sala.');" ><img src="'.asset('img/sav.png').'" alt="Editar Sala" width="30" height="20" border="0" /></a>';
                    return $col;
                })
                ->addColumn('horarios', function($salas) {
                    $col = '<a href="javascript:;" onclick="seleccionar_sala('.$salas->id_sala.', \''.$salas->nombre.'\', this);" ><img src="'.asset('img/play.png').'" alt="Seleccionar Sala" width="21" height="20" border="0" /></a>';
                    return $col;
                })
                ->addColumn('viñeta', function($salas) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
                ->rawColumns(['editar', 'horarios', 'viñeta'])
                ->make(true);

    }

    public function nuevo(Request $request)
    {
    	$regiones = Regiones::All();
        $disponibilidades = Disponibilidades::All();
        $tipo_horarios = Tipo_Horarios::select([
            'id_tipo_horario', 
            DB::RAW("DATE_FORMAT(h_inicio, '%H:%i') AS h_inicio"), 
            DB::RAW("DATE_FORMAT(h_fin, '%H:%i') AS h_fin")
        ])->get();

    	return view('Mantenedores.Salas.add', [
            'regiones' => $regiones,
            'tipo_horarios' => $tipo_horarios,
            'disponibilidades' => $disponibilidades
        ]);
    }

    public function add(Request $request)
    {

    	$this->validate($request, [
            'nombre' => 'required',
            'direccion' => 'required',
            'id_comuna' => 'required|exists:comunas,id_comuna',
            'capacidad' => 'required',
            'banco_prueba' => 'required',
            'id_disponibilidad' => 'required|exists:disponibilidades,id_disponibilidad',
            'id_tipo_horario' => 'required|exists:tipo_horarios,id_tipo_horario'
        ]);

        try {

            DB::beginTransaction();


            $id_sala = Salas::insertGetId([
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'id_comuna' => $request->id_comuna,
                'capacidad' => $request->capacidad,
                'banco_prueba' => $request->banco_prueba,
                'id_disponibilidad' => $request->id_disponibilidad,
                'id_tipo_horario' => $request->id_tipo_horario,
                'dia' => $request->dia,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'id_sala' => $id_sala
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg_error' => $e]);
        }
    }

    public function edit(Request $request)
    {
    	$sala = Salas::where('id_sala', $request->id_sala)->first();
        $id_region = $sala->comuna->ciudad->region->id_region;
        $id_ciudad = $sala->comuna->ciudad->id_ciudad;
        $id_comuna = $sala->comuna->id_comuna;
    	$regiones = Regiones::All();
        $ciudades = Ciudades::where('id_region', $id_region)->get();
        $comunas = Comunas::where('id_ciudad', $id_ciudad)->get();
        $disponibilidades = Disponibilidades::All();
        $tipo_horarios = Tipo_Horarios::All();

    	return view('Mantenedores.Salas.edit', [
            'sala' => $sala, 
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            'comunas' => $comunas,
            'id_region' => $id_region,
            'id_ciudad' => $id_ciudad,
            'id_comuna' => $id_comuna,
            'tipo_horarios' => $tipo_horarios,
            'disponibilidades' => $disponibilidades
        ]);
    }

    public function update(Request $request)
    {
    	try {
    		$this->validate($request, [
                'nombre' => 'required',
                'direccion' => 'required',
                'id_comuna' => 'required|exists:comunas,id_comuna',
                'capacidad' => 'required',
                'banco_prueba' => 'required',
                'id_disponibilidad' => 'required|exists:disponibilidades,id_disponibilidad',
                'id_tipo_horario' => 'required|exists:tipo_horarios,id_tipo_horario'
            ]);

    		$sala = Salas::where('id_sala', $request->id_sala)->first();

    		$sala->nombre = $request->nombre;
    		$sala->direccion = $request->direccion;
    		$sala->id_comuna = $request->id_comuna;
            $sala->capacidad = $request->capacidad;
            $sala->banco_prueba = $request->banco_prueba;
            $sala->id_disponibilidad = $request->id_disponibilidad;
            $sala->id_tipo_horario = $request->id_tipo_horario;
            $sala->dia = $request->dia;
    		
	    	$sala->save();

	    	return response()->json([
	    		'status' => true
	    	]);	
    	} catch (Exception $e) {
    		return response()->json(['status' => fase, 'msg_error' => $e]);
    	}
    }
}
