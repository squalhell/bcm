<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Tipo_Cursos;
use DB;
use Datatables;

class CursosController extends Controller
{
    public function index(Request $request)
    {
    	return view('mantenedores.cursos.index');
    }

	public function search(Request $request)
    {
        $cursos = Cursos::join('tipo_cursos', 'tipo_cursos.id_tipo_curso', '=', 'cursos.id_tipo_curso')
                    ->orderBy('cursos.nivel', 'asc')
                    ->select(['cursos.id_curso', 'cursos.desc_curso', 'cursos.contenido', 'cursos.nivel', 'cursos.ponderacion_max', 'cursos.ponderacion_min', 'cursos.id_tipo_curso', 'tipo_cursos.desc_tipo_curso']);

        return Datatables::of($cursos)
                ->addColumn('editar', function($cursos) {
                    $col = '<a href="javascript:;" onclick="editar('.$cursos->id_curso.');" ><img src="'.asset('img/sav.png').'" alt="Editar Curso" width="30" height="20" border="0" /></a>';
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
    	$tipo_cursos = Tipo_cursos::All();
    	return view('mantenedores.cursos.add', ['tipo_cursos' => $tipo_cursos]);
    }

    public function add(Request $request)
    {

    	$nivel = Cursos::max('nivel');
    	if (!$nivel) $nivel = 0;

    	$nivel += 1;

    	$this->validate($request, 
            [
            'desc_curso' => 'required',
            'contenido' => 'required',
            'ponderacion_max' => 'required|numeric|max:100|min:0|mayor_que:ponderacion_min',
            'ponderacion_min' => 'required|numeric|max:100|min:0',
            'id_tipo_curso' => 'required|exists:tipo_cursos,id_tipo_curso'
            ], 
            [
                'ponderacion_max.mayor_que' => 'Ponderación máxima debe ser mayor que la ponderación mínima',
                'ponderacion_max.max' => 'Ponderación máxima no puede ser mayor que 100',
                'ponderacion_min.min' => 'Ponderación mínima no puede ser mayor que 100'
            ]
        );

        try {

            DB::beginTransaction();


            $id_curso = Cursos::insertGetId([
                'desc_curso' => $request->desc_curso,
                'contenido' => $request->contenido,
                'nivel' => $nivel,
                'ponderacion_min' => $request->ponderacion_min,
                'ponderacion_max' => $request->ponderacion_max,
                'id_tipo_curso' => $request->id_tipo_curso,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'id_curso' => $id_curso
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg_error' => $e]);
        }
    }

    public function edit(Request $request)
    {
    	$curso = Cursos::where('id_curso', $request->id_curso)->first();
    	$tipo_cursos = Tipo_Cursos::All();

    	return view('Mantenedores.Cursos.edit', ['curso' => $curso, 'tipo_cursos' => $tipo_cursos]);
    }

    public function update(Request $request)
    {
    	try {
            $this->validate($request, 
            [
            'desc_curso' => 'required',
            'contenido' => 'required',
            'ponderacion_max' => 'required|numeric|max:100|min:0|mayor_que:ponderacion_min',
            'ponderacion_min' => 'required|numeric|max:100|min:0',
            'id_tipo_curso' => 'required|exists:tipo_cursos,id_tipo_curso'
            ], 
            [
                'ponderacion_max.mayor_que' => 'Ponderación máxima debe ser mayor que la ponderación mínima',
                'ponderacion_max.max' => 'Ponderación máxima no puede ser mayor que 100',
                'ponderacion_min.min' => 'Ponderación mínima no puede ser mayor que 100'
            ]
        );

    		$curso = Cursos::where('id_curso', $request->id_curso)->first();

    		$curso->desc_curso = $request->desc_curso;
    		$curso->contenido = $request->contenido;
    		$curso->ponderacion_max = $request->ponderacion_max;
    		$curso->ponderacion_min = $request->ponderacion_min;
    		$curso->id_tipo_curso = $request->id_tipo_curso;
    		
	    	$curso->save();

	    	return response()->json([
	    		'status' => true
	    	]);	
    	} catch (Exception $e) {
    		return response()->json(['status' => fase, 'msg_error' => $e]);
    	}
    }

}
