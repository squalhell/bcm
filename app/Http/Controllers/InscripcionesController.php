<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasfiter;
use App\Models\Cursos;
use App\Models\Inscripciones;
use DB;
use Datatables;

class InscripcionesController extends Controller
{
    public function index(Request $request)
    {
    	$gasfiter = Gasfiter::All();

    	return view('gasfiter.inscripciones', ['gasfiter' => $gasfiter]);
    }

    public function inscribir(Request $request)
    {
    	$this->validate($request, [
            'id_curso' => 'required',
            'id_gasfiter' => 'required'
        ]);

        try {

            DB::beginTransaction();


            $id_inscripcion = Inscripciones::insertGetId([
                'id_curso' => $request->id_curso,
                'id_gasfiter' => $request->id_gasfiter,
                'matriculado' => 0,
                'terminado' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'id_inscripcion' => $id_inscripcion
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg_error' => $e]);
        }
    }

    public function search(Request $request)
    {
    	$id_gasfiter = $request->_id_gasfiter;
    	if(!$id_gasfiter) $id_gasfiter = '0';

        $cursos = Cursos::join('tipo_cursos', 'tipo_cursos.id_tipo_curso', '=', 'cursos.id_tipo_curso')
                    ->orderBy('cursos.nivel', 'asc')
                    ->select(['cursos.id_curso', 'cursos.desc_curso', 'cursos.contenido', 'cursos.nivel', 'cursos.ponderacion_max', 'cursos.ponderacion_min', 'cursos.id_tipo_curso', 'tipo_cursos.desc_tipo_curso', DB::raw($id_gasfiter." as id_gasfiter")]);
        
        return Datatables::of($cursos)
                ->addColumn('cursar', function($cursos) {
                    $inscripciones = Inscripciones::where('id_gasfiter', $cursos->id_gasfiter)
                		->where('id_curso', $cursos->id_curso)->first();
                	$col = '';
                	if($inscripciones) 
                	{
                		$col = '<a href="javascript:;" onclick="alert(\'Curso ya inscrito.\');" ><img src="'.asset('img/play.png').'" alt="Inscribir Curso" width="30" height="20" border="0" /></a>';
                	}
                	else 
                	{
                		$col = '<a href="javascript:;" onclick="inscribir('.$cursos->id_curso.', '.$cursos->id_gasfiter.', event);" ><img src="'.asset('img/play.png').'" alt="Editar Curso" width="30" height="20" border="0" /></a>';
                	}
                	
                	return $col;
                })
                ->addColumn('inscrito', function($cursos) {
                	$inscripciones = Inscripciones::where('id_gasfiter', $cursos->id_gasfiter)
                		->where('id_curso', $cursos->id_curso)->first();

                	$col = '';
                	if($inscripciones) $col = 'Si';
                	else $col = 'No';
                	
                	return $col;
                })
                ->addColumn('cursado', function($cursos) {
                	$inscripciones = Inscripciones::where('id_gasfiter', $cursos->id_gasfiter)
                		->where('id_curso', $cursos->id_curso)
                		->where('terminado', 1)
                		->first();

                	$col = '';
                	if($inscripciones) $col = 'Si';
                	else $col = 'No';
                	
                	return $col;
                })
                ->addColumn('matriculado', function($cursos) {
                    $inscripciones = Inscripciones::where('id_gasfiter', $cursos->id_gasfiter)
                        ->where('id_curso', $cursos->id_curso)
                        ->where('matriculado', 1)
                        ->first();

                    $col = '';
                    if($inscripciones) $col = 'Si';
                    else $col = 'No';
                    
                    return $col;
                })
                ->addColumn('viñeta', function($salas) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
                ->rawColumns(['viñeta', 'editar', 'inscrito', 'cursar'])
                ->make(true);

    }
}
