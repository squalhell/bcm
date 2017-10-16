<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

use App\Models\Inscripciones;
use App\Models\Gasfiter;

class GasfiterController extends Controller
{

    public function index()
    {
        return view('gasfiter.index');
    }

    public function inscripciones_search(Request $request)
    {
    	$inscripciones = Inscripciones::join('junkerschile_bcm.gasfiter AS g', 'g.id', '=', 'inscripciones.id_gasfiter')
    		->where('inscripciones.id_curso', $request->id_curso)
    		->where('inscripciones.matriculado', '0')
    		->select([
    			'inscripciones.id_inscripcion',
    			DB::RAW("CONCAT(g.nombreGas, ' ', g.apellidoGas) as gasfiter")
    		])
    		->orderBy('inscripciones.id_inscripcion');

    	return Datatables::of($inscripciones)
    	 		->addColumn('viñeta', function($inscripciones) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
    	 		->addColumn('check', function($inscripciones) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><input type="checkbox" id="chk_inscripcion" name="chk_inscripcion[]" value="'.$inscripciones->id_inscripcion.'"></td>';
                    return $col;
                })
                ->rawColumns(['viñeta', 'check'])
    	 		->make(true);
    }

    public function get_gasfiter(Request $request)
    {
        $gasfiter = DB::table('junkerschile_bcm.gasfiter AS g')
            ->leftjoin('junkerschile_bcm.tpo_stec AS s', 's.cd_stec', '=', 'g.TallerGas')
            ->select([
                's.dsc_stec',
                DB::RAW("REPLACE(REPLACE(s.RutGas, '.', ''), '-', '') AS rut"),
            ]);

        return Datatables::of($gasfiter)
                ->addColumn('viñeta', function($cursos_horarios) {
                    $col = '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                    return $col;
                })
                ->rawColumns(['viñeta'])
                ->make(true);
    }
}
