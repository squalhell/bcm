<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

use App\Models\Cursos_Horarios;
use App\Models\Detalle_Horarios;
use App\Models\Cursos;
use App\Models\Salas;
use App\Models\Relatores;
use App\Models\Inscripciones;

class HorariosController extends Controller
{

    public function index()
    {
        return view('Cursos.Horarios.index');
    }

    public function nuevo()
    {
    	$cursos = Cursos::orderBy('nivel', 'asc')->get();
    	$relatores = Relatores::where('activo', 1)->orderBy('nombre')->orderBy('a_paterno')->orderBy('a_materno')->get();
    	$salas = Salas::orderBy('nombre')->get();

    	return view('Cursos.Horarios.add', [
    		'cursos' => $cursos,
    		'relatores' => $relatores,
    		'salas' => $salas
    	]);
    }

    public function edit(Request $request)
    {
        $cursos = Cursos::orderBy('nivel', 'asc')->get();
        $relatores = Relatores::where('activo', 1)->orderBy('nombre')->orderBy('a_paterno')->orderBy('a_materno')->get();
        $salas = Salas::orderBy('nombre')->get();
        $curso_horario = Cursos_Horarios::where('id_curso_horario', $request->id_curso_horario)->first();
        $horarios = Detalle_Horarios::where('id_curso_horario', $request->id_curso_horario)->get();
        $dias = array();

        switch ($curso_horario->sala->disponibilidad->id_disponibilidad) {
            case '1':
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
                break;
            case '2':
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            case '3':
                $dias = [$curso_horario->sala->dia];
                break;
        }

        return view('Cursos.Horarios.edit', [
            'cursos' => $cursos,
            'relatores' => $relatores,
            'curso_horario' => $curso_horario,
            'horarios' => $horarios,
            'dias' => $dias

        ]);
    }

    public function seleccionar_sala(Request $request)
    {
        $sala = Salas::where('id_sala', $request->id_sala)->first();
        $dias = array();

        switch ($sala->disponibilidad->id_disponibilidad) {
            case '1':
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
                break;
            case '2':
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            case '3':
                $dias = [$sala->dia];
                break;
        }

        return response()->json([
            'dias' => $dias,
            'h_inicio' => date('H:i', strtotime($sala->tipo_horario->h_inicio)),
            'h_fin' => date('H:i', strtotime($sala->tipo_horario->h_fin))
        ]);
    }

    public function add(Request $request)
    {

    	$this->validate(
            $request, 
            [
                'id_curso'      =>  'required|exists:cursos,id_curso',
                'id_relator'    =>  'required|exists:relatores,id_relator',
                'id_sala'       =>  'required|exists:salas,id_sala',
                'tabla_array'   =>  'tabla_existe',
                'f_inicio'      =>  'required',
                'f_fin'         =>  'required',
                'f_fin'         =>  'fecha_mayor_que:f_inicio'
            ],
            [
                'id_curso.required'         =>  'Debe seleccionar un curso.',
                'id_curso.exists'           =>  'Curso seleccionado no encontrado en nuestros registros.',
                'id_relator.required'       =>  'Debe seleccionar un relator.',
                'id_relator.exists'         =>  'Relator seleccionado no encontrado en nuestros registros.',
                'id_sala.required'          =>  'Debe seleccionar una sala.',
                'id_sala.exists'            =>  'Sala seleccionada no encontrada en nuestros registros.',
                'tabla_array.tabla_existe'  =>  'Debe ingresar al menos un horario.',
                'f_inicio.required'         =>  'Debe seleccionar una fecha de inicio válida',
                'f_fin.required'            =>  'Debe seleccionar una fecha fin válida.',
                'f_fin.fecha_mayor_que'     =>  'Fecha de inicio no puede ser mayor que la fecha fin.'
            ]
        );

        try {

            DB::beginTransaction();

            $horarios = json_decode($request->tabla_array);

            $id_curso_horario = Cursos_Horarios::insertGetId([
                'id_curso' => $request->id_curso,
                'id_relator' => $request->id_relator,
                'id_sala' => $request->id_sala,
                'f_inicio' => date('Y-m-d', strtotime(str_replace('/', '-', $request->f_inicio))),
                'f_fin' => date('Y-m-d', strtotime(str_replace('/', '-', $request->f_fin))),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            foreach ($horarios as $key => $value) {
                Detalle_Horarios::insertGetId([
                    'id_curso_horario' => $id_curso_horario,
                    'dia' => $value->Dia,
                    'h_inicio' => $value->Inicio,
                    'h_fin' => $value->Fin,
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

    public function update(Request $request)
    {
        $this->validate(
            $request, 
            [
                'id_curso'      =>  'required|exists:cursos,id_curso',
                'id_relator'    =>  'required|exists:relatores,id_relator',
                'id_sala'       =>  'required|exists:salas,id_sala',
                'tabla_array'   =>  'tabla_existe',
                'f_inicio'      =>  'required',
                'f_fin'         =>  'required',
                'f_fin'         =>  'fecha_mayor_que:f_inicio'
            ],
            [
                'id_curso.required'         =>  'Debe seleccionar un curso.',
                'id_curso.exists'           =>  'Curso seleccionado no encontrado en nuestros registros.',
                'id_relator.required'       =>  'Debe seleccionar un relator.',
                'id_relator.exists'         =>  'Relator seleccionado no encontrado en nuestros registros.',
                'id_sala.required'          =>  'Debe seleccionar una sala.',
                'id_sala.exists'            =>  'Sala seleccionada no encontrada en nuestros registros.',
                'tabla_array.tabla_existe'  =>  'Debe ingresar al menos un horario.',
                'f_inicio.required'         =>  'Debe seleccionar una fecha de inicio válida',
                'f_fin.required'            =>  'Debe seleccionar una fecha fin válida.',
                'f_fin.fecha_mayor_que'     =>  'Fecha de inicio no puede ser mayor que la fecha fin.'
            ]
        );

        try {

            DB::beginTransaction();

            $horarios = json_decode($request->tabla_array);
            $horario = Cursos_Horarios::where('id_curso_horario', $request->id_curso_horario)->first();
            $horario->id_curso = $request->id_curso;
            $horario->id_relator = $request->id_relator;
            $horario->id_sala = $request->id_sala;
            $horario->f_inicio = date('Y-m-d', strtotime(str_replace('/', '-', $request->f_inicio)));
            $horario->f_fin = date('Y-m-d', strtotime(str_replace('/', '-', $request->f_fin)));


            $detalle_horarios = Detalle_Horarios::where('id_curso_horario', $request->id_curso_horario)->delete();

            foreach ($horarios as $key => $value) {
                Detalle_Horarios::insertGetId([
                    'id_curso_horario' => $request->id_curso_horario,
                    'dia' => $value->Dia,
                    'h_inicio' => $value->Inicio,
                    'h_fin' => $value->Fin,
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

    public function search(Request $request)
    {
        $id_curso = '';
        if($request->id_curso) $id_curso = $request->id_curso;
        
        $cursos_horarios = Cursos_Horarios::join('cursos', 'cursos.id_curso', '=', 'cursos_horarios.id_curso')
                            ->join('relatores', 'relatores.id_relator', '=', 'cursos_horarios.id_relator')
                            ->join('salas', 'salas.id_sala', '=', 'cursos_horarios.id_sala')
                            ->where('cursos.id_curso', 'like', $id_curso)
                            ->select([
                                'cursos_horarios.id_curso_horario', 
                                'cursos.desc_curso', 
                                DB::raw("CONCAT(relatores.nombre, ' ', relatores.a_paterno, ' ', relatores.a_materno) AS nom_relator"),
                                'salas.nombre',
                                DB::RAW("DATE_FORMAT(cursos_horarios.f_inicio, '%d/%m/%Y') AS f_inicio"),
                                DB::RAW("DATE_FORMAT(cursos_horarios.f_fin, '%d/%m%Y') AS f_fin"),
                                'cursos.id_curso'
                            ]);

        return Datatables::of($cursos_horarios)
                ->addColumn('viñeta', function($cursos_horarios) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
                ->addColumn('acciones', function($cursos_horarios) {
                    $col = '<table width="10" border="0" cellspacing="0" cellpadding="0">'.
                        '<tr>'.
                        '<td width="22" height="24" align="center" valign="middle">&nbsp;</td>'.
                        '<td style="display:none;"><a href="javascript:;"><img src="'.asset('img/play3.png').'" alt="Eliminar Horario" width="21" height="20" border="0" /></a></td>'.
                        '<td><a href="javascript:;" onclick="editar('.$cursos_horarios->id_curso_horario.');" ><img src="'.asset('img/play.png').'" alt="Editar Horario" width="21" height="20" border="0" /></a></td>'.
                        '</tr>'.
                        '</table>';
                    return $col;
                })
                ->addColumn('select_curso_horario', function($cursos_horarios) {
                    $inscritos = Inscripciones::where('id_curso', $cursos_horarios->id_curso)->get()->count();

                    $col = '<a href="javascript:;" onclick="select_curso_horario('.$cursos_horarios->id_curso_horario.', this);" ><img src="'.asset('img/play.png').'" alt="Editar Horario" width="21" height="20" border="0" /></a>';

                    return $col;
                })
                ->addColumn('horarios', function($cursos_horarios) {
                    $detalle_horarios = Detalle_Horarios::where('id_curso_horario', $cursos_horarios->id_curso_horario)->get();
                    $col = '';

                    foreach ($detalle_horarios as $dh) {;
                        $col .= ' - '.$dh->dia.' '.date('H:i', strtotime($dh->h_inicio)).' a las '.date('H:i', strtotime($dh->h_fin)).'<br >';
                    }
                    $col .= '<br>';
                    return $col;
                })
                ->rawColumns(['acciones', 'viñeta', 'horarios', 'select_curso_horario'])
                ->make(true);

    }

}
