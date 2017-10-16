<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

use App\Models\Cursos;
use App\Models\Cursos_Horarios;
use App\Models\Matriculas;
use App\Models\Inscripciones;

class MatriculasController extends Controller
{

	public function index()
	{
		return view('Cursos.Matriculas.index');
	}

    public function nuevo()
    {
    	$cursos = Cursos_Horarios::join('cursos', 'cursos.id_curso', '=', 'cursos_horarios.id_curso')
    		->select('cursos.id_curso', 'cursos.desc_curso')
    		->distinct()
    		->get();

    	return view('Cursos.Matriculas.add', [
    		'cursos' => $cursos
    	]);
    }

    public function add(Request $request)
    {

    	$this->validate(
            $request, 
            [
                'chk_inscripcion'      =>  'required',
                'id_curso_horario'    =>  'required',
            ],
            [
            	'chk_inscripcion.required'	=> 'Debe seleccionar al menos un gasfiter.',
            	'id_curso_horario.required'			=>	'Debe seleccionar un horario.'
            ]
        );

        try {

            DB::beginTransaction();

            foreach ($request->chk_inscripcion as $id_inscripcion) {
            	$inscripcion = Inscripciones::where('id_inscripcion', $id_inscripcion)->first();
                $inscripcion->matriculado = 1;
                $inscripcion->save();

                Matriculas::insertGetId([
                    'id_inscripcion' => $id_inscripcion,
                    'id_curso_horario' => $request->id_curso_horario,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            }

            

            DB::commit();

            return response()->json([
                'status' => true
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg_error' => $e]);
        }


    }

    public function get_matriculas()
    {
    	$matriculas = DB::table('matriculas AS m')
    					->join('inscripciones AS i', 'i.id_inscripcion', '=', 'm.id_inscripcion')
    					->join('junkerschile_bcm.gasfiter AS g', 'g.id', '=', 'i.id_gasfiter')
    					->join('cursos AS c', 'c.id_curso', '=', 'i.id_curso')
    					->join('cursos_horarios AS ch', 'ch.id_curso_horario', '=', 'm.id_curso_horario')
    					->join('relatores AS r', 'r.id_relator', '=', 'ch.id_relator')
    					->join('salas AS s', 's.id_sala', '=', 'ch.id_sala')
    					->join('comunas AS co', 'co.id_comuna', '=', 's.id_comuna')
    					->join('ciudades AS ci', 'ci.id_ciudad', '=', 'co.id_ciudad')
    					->join('regiones AS re', 're.id_region', '=', 'ci.id_region')
    					->select([
    						'm.id_matricula',
    						'm.id_inscripcion',
    						'i.id_curso',
    						'c.desc_curso',
    						'i.id_gasfiter',
    						DB::RAW("CONCAT(g.NombreGas, ' ', g.apellidoGas) AS gasfiter"),
    						DB::RAW("CASE i.matriculado WHEN 1 THEN 'Si' ELSE 'No' END AS matriculado"),
    						DB::RAW("CASE i.terminado WHEN 1 THEN 'Si' ELSE 'No' END AS terminado"),
    						'm.id_curso_horario',
    						DB::RAW("CONCAT(r.nombre, ' ', r.a_paterno, ' ', r.a_materno) AS relator"),
    						's.nombre AS sala', 
    						's.direccion', 
    						'co.desc_comuna',
    						'ci.desc_ciudad',
    						're.desc_region',
    						DB::RAW("DATE_FORMAT(ch.f_inicio, '%d/%m/%Y') AS f_inicio"),
                            DB::RAW("DATE_FORMAT(ch.f_fin, '%d/%m%Y') AS f_fin")
    					]);

    	return Datatables::of($matriculas)
    			->addColumn('viñeta', function($matriculas) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
                ->rawColumns(['viñeta'])
    			->make(true);
    }

}
