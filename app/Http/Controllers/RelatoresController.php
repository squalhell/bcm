<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatores;
use DB;
use Datatables;

class RelatoresController extends Controller
{
    public function index(Request $request)
    {
    	return view('Mantenedores.Relatores.index');
    }

	public function search(Request $request)
    {
        $relatores = Relatores::orderBy('a_paterno', 'asc')
        			->orderBy('a_materno', 'asc')
        			->orderBy('nombre', 'asc')
                    ->select([
                        'id_relator', 
                        'rut', 
                        'nombre', 
                        'a_paterno', 
                        'a_materno', 
                        'mail', 
                        'celular', 
                        DB::RAW("CASE activo WHEN 1 THEN 'Si' ELSE 'No' END AS activo")
                    ]);

        return Datatables::of($relatores)
                ->addColumn('editar', function($relatores) {
                    $col = '<a href="javascript:;" onclick="editar('.$relatores->id_relator.');" ><img src="'.asset('img/sav.png').'" alt="Editar Sala" width="30" height="20" border="0" /></a>';
                    return $col;
                })
                ->addColumn('viñeta', function($salas) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
                ->rawColumns(['editar', 'viñeta'])
                ->make(true);

    }

    public function nuevo(Request $request)
    {
    	return view('Mantenedores.Relatores.add');
    }

    public function add(Request $request)
    {

    	$this->validate($request, [
    		'rut' => 'required',
    		'dv' => 'required',
            'nombre' => 'required',
            'a_paterno' => 'required',
            'a_materno' => 'required',
            'mail' => 'required|email',
            'celular' => 'required|numeric'
        ]);

        try {

            DB::beginTransaction();


            $id_relator = Relatores::insertGetId([
            	'rut' => $request->rut.'-'.$request->dv,
                'nombre' => $request->nombre,
                'a_paterno' => $request->a_paterno,
                'a_materno' => $request->a_materno,
                'mail' => $request->mail,
                'celular' => $request->celular,
                'activo' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'id_relator' => $id_relator
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg_error' => $e]);
        }
    }

    public function edit(Request $request)
    {
    	$relator = Relatores::where('id_relator', $request->id_relator)->first();

    	return view('Mantenedores.Relatores.edit', [
            'relator' => $relator
        ]);
    }

    public function update(Request $request)
    {
    	try {
    		$this->validate($request, [
            'nombre' => 'required',
            'a_paterno' => 'required',
            'a_materno' => 'required',
            'mail' => 'required|email',
            'celular' => 'required|numeric'
        ]);

    		$relator = Relatores::where('id_relator', $request->id_relator)->first();

    		$relator->nombre = $request->nombre;
    		$relator->a_paterno = $request->a_paterno;
    		$relator->a_materno = $request->a_materno;
    		$relator->mail = $request->mail;
    		$relator->celular = $request->celular;
    		$relator->activo = $request->activo;
    		
	    	$relator->save();

	    	return response()->json([
	    		'status' => true
	    	]);	
    	} catch (Exception $e) {
    		return response()->json(['status' => fase, 'msg_error' => $e]);
    	}
    }
}
