<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use App\Models\Clientes;
use App\Models\Cliente_Direcciones;
use App\Models\Tipo_Direccion;
use App\Models\Regiones;
use App\Models\Ciudades;
use App\Models\Comunas;
use App\Models\Atenciones;
use App\Models\OT;
use App\User;
use DB;
use Datatables;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
    	return view('Clientes.index', [
            'rut' => $request->rut,
            'dv' => $request->dv
        ]);
    }

    public function submit(Request $request)
    {
    	switch ($request->hf_btn) {
    		case 'add':
    			$datos = $this->nuevo_cliente($request->rut, $request->dv);
    			return view('Clientes.add', $datos);
    			break;
    		
    		case 'search':
    			$this->search($request);
    			break;
    	}
    }

    public function add(Request $request)
    {
    	$tipo_direccion = Tipo_Direccion::All();
		$regiones = Regiones::All();

		return view('Clientes.add', [
			'tipo_direcciones' => $tipo_direccion,
			'regiones' => $regiones,
			'rut' => $request->rut,
			'dv' => $request->dv,
			'msg_nuevo' => $request->hf_msg_nuevo,
		]);

    }

    public function ficha(Request $request)
    {
        //dd($request);
    	$cliente_direccion = Cliente_Direcciones::where('id_cliente_direccion', $request->id_cliente_direccion)->first();
        $ot = OT::join('atenciones', 'atenciones.id_atencion', '=', 'ot.id_atencion')
                ->where('atenciones.id_cliente_direccion', $request->id_cliente_direccion)
                ->whereNotIn('ot.id_tipo_servicio', ['42','13','22','24','25','26','37','38','39','40','41','47'])
                ->orderBy('ot.id_atencion')
                ->first();

        $num_pendientes = OT::join('atenciones', 'atenciones.id_atencion', '=', 'ot.id_atencion')
                            ->where('atenciones.id_cliente_direccion', $request->id_cliente_direccion)
                            ->where('ot.f_final', '0')
                            ->count();

        if (!$ot) $ot = new OT;

    	return view('Clientes.atenciones', [
            'detalle' => false,
            'cliente_direccion' => $cliente_direccion,
            'ot' => $ot,
            'num_pendientes' => $num_pendientes
            ]);
    }

    public function edit(Request $request)
    {
    	$cliente_direccion = Cliente_Direcciones::where('id_cliente_direccion', $request->id_cliente_direccion)->first();
    	$tipo_direccion = Tipo_Direccion::All();
		$regiones = Regiones::All();
		$ciudades = Ciudades::where('id_region', $cliente_direccion->id_region)->get();
		$comunas = Comunas::where('id_ciudad', $cliente_direccion->id_ciudad)->get();
			
		return view('Clientes.edit', [
			'tipo_direcciones' => $tipo_direccion,
			'regiones' => $regiones,
			'ciudades' => $ciudades,
			'comunas' => $comunas,
			'msg_nuevo' => 'no',
			'cliente_direccion' => $cliente_direccion
		]);

    }

    public function search(Request $request)
    {
    	// switch ($request->chk_search) {
    	// 	case 1:
    	// 		$this->validate($request, ['rut' => 'required|numeric']);
     //            //$clientes = Datatables::of(Clientes::where('rut', 'like', '%' .$request->rut. '%')->orderBy('nombre')->get())->make(true);
     //            return Datatables::of(Clientes::where('rut', 'like', '%' .$request->rut. '%')->orderBy('nombre')->get())->make(true);
    	// 		//$clientes = Clientes::where('rut', 'like', '%' .$request->rut. '%')->orderBy('nombre')->paginate(50);
    	// 		break;
    	// 	case 2:
    	// 		$clientes = collect(new Clientes);
    	// 		break;
    	// 	case 3:
    	// 		$this->validate($request, ['fono_particular' => 'required|numeric']);
    	// 		$clientes = Clientes::Where('fono_particular', 'like', '%' . $request->fono_particular . '%')
    	// 			->orderBy('nombre')
		   //      	->paginate(50);
    	// 		break;
    	// 	case 4:
    	// 		$this->validate($request, ['nombre' => 'required']);
    	// 		$clientes = Clientes::where('nombre', 'like', '%' .$request->nombre. '%')
    	// 			->orderBy('nombre')
     //    			->paginate(50);
    	// 		break;
    	// 	default:
    	// 		$clientes = collect(new Clientes);
    	// 		break;
    	//}

        $clientes = Cliente_Direcciones::join('Clientes', 'cliente_direcciones.id_cliente', '=', 'clientes.id_cliente')
                                        ->where('clientes.rut', 'like', '%'.$request->rut.'%')
                                        ->orderBy('cliente_direcciones.contacto', 'desc')
                                        ->select(['cliente_direcciones.contacto', 'cliente_direcciones.id_cliente_direccion', 'clientes.rut', 'cliente_direcciones.direccion', 'cliente_direcciones.fono_particular', 'clientes.dv']);

        return Datatables::of($clientes)
                            ->editColumn('rut', function($clientes) {
                                $col = $clientes->rut.'-'.$clientes->dv;
                                return $col;
                            })
                            ->addColumn('nom_cliente', function ($clientes) { 
                                $col = '<table width="213" border="0" cellspacing="0" cellpadding="0">'.
                                    '<tr>'.
                                    '<td width="20" align="left" valign="top"><img src="'.asset('img/user_p.png').'" width="20" height="20" /></td>'.
                                    '<td width="199">'.$clientes->contacto.'</td>'.
                                    '</tr>'.
                                    '</table>';
                                return $col;
                            })
                            ->addColumn('editar', function($clientes) {
                                $col = '<a href="javascript:;" onclick="editar('.$clientes->id_cliente_direccion.');" ><img src="'.asset('img/sav.png').'" alt="Editar Cliente" width="30" height="20" border="0" /></a>';
                                return $col;
                            })
                            ->addColumn('atencion', function($clientes) {
                                $col = '<a href="javascript:;" onclick="atencion('.$clientes->id_cliente_direccion.');"><img src="'.asset('img/play.png').'" width="21" height="20" border="0" /></a>';
                                return $col;
                            })
                            ->rawColumns(['nom_cliente', 'editar', 'atencion'])
                            ->make(true);

	 	//return view('Clientes.index', ['clientes' => $clientes, 'chk' => $request->chk_search]);
    }

    public function historico(Request $request)
    {
        $ot = OT::Join('atenciones', 'atenciones.id_atencion', '=', 'ot.id_atencion')
            ->leftJoin('tipo_trabajos', 'ot.id_tipo_trabajo', 'tipo_trabajos.id_tipo_trabajo')
            ->leftJoin('stec', 'ot.id_stec', 'stec.id_stec')
            ->leftJoin('tipo_servicios', 'ot.id_tipo_servicio', 'tipo_servicios.id_tipo_servicio')
            ->leftJoin('users', 'atenciones.id_usr', 'users.id')
            ->leftJoin('tipo_pagos', 'ot.id_tipo_pago', 'tipo_pagos.id_tipo_pago')
            ->where('atenciones.id_cliente_direccion', $request->id_cliente_direccion)
            ->orderBy('ot.id_atencion', 'asc')
            ->orderBy('atenciones.obs', 'asc')
            ->select(['atenciones.id_atencion', 'ot.f_prom', 'tipo_trabajos.desc_tipo_trabajo', 'stec.desc_stec', 'tipo_servicios.desc_tipo_servicio', 'users.nom_usr', 'ot.f_final', 'tipo_servicios.m_ppto AS ppto', 'ot.m_ppto AS tppto', 'ot.cd_pos', 'ot.m_null', 'tipo_pagos.desc_tipo_pago', 'ot.v_pendiente', 'ot.id_ot']);

        return Datatables::of($ot)
            ->addColumn('icono', function () { 
                $col = '<td height="26" bgcolor="#666666" class="prsnal"><img src="'.asset('img/rde3.png').'" width="11" height="13" /></td>';
                return $col;
            })
            ->editColumn('f_prom', function($ot) {
                $col = date('d/m/Y', strtotime($ot->f_prom));
                return $col;
            })
            ->editColumn('desc_stec', function($ot) {
                if ($ot->desc_stec) return $ot->desc_stec;
                else return 'No definido';
            })
            ->editColumn('desc_tipo_servicio', function($ot) {
                if ($ot->desc_tipo_servicio) return $ot->desc_tipo_servicio;
                else return 'No definido';
            })
            ->editColumn('nom_usr', function($ot) {
                if ($ot->nom_usr) return $ot->nom_usr;
                else return 'No definido';
            })
            ->addColumn('estado', function($ot) {
                $state = 'No definido';

                if ($ot->f_final == "" || $ot->f_final == 0) $state = "Abierta";
                else $state = "Cerrada";
                
                if ($ot->ppto == "1") $state = "PPTO";
                        
                if ($ot->tppto == "2") $state = "PPTO aceptado";
                        
                if ($ot->tppto == "3") $state = "PPTO rechazado";
                        
                if ($ot->cd_pos != "0" && $ot->f_final == "") $state = "En ruta(" . $ot->cd_pos. ")";
                
                if ($ot->f_final == "") $state = "Cerrada";
                        
                if ($ot->m_null == "S") $state = "Nula";

                return $state;
            })
            ->editColumn('desc_tipo_pago', function($ot) {
                if ($ot->desc_tipo_pago) return $ot->desc_tipo_pago;
                else return 'No definido';
            })
            ->editColumn('v_pendiente', function($ot) {
                return '<table width="100%" border="0" cellspacing="0" cellpadding="0">'.
                        '<tr>'.
                        '<td width="17%" align="center" valign="middle" >$</td>'.
                        '<td width="83%">'.number_format($ot->v_pendiente, 0, ',', '.').'</td>'.
                        '</tr>'.
                        '</table>';
            })
            ->addColumn('action', function($ot) {
                $col = '<table width="10" border="0" cellspacing="0" cellpadding="0"><tr>';
                if ($ot->cd_pos != 0 && $ot->cd_pos != "") {
                    $col .= '<td width="22" height="24" align="center" valign="middle">'.
                        '<a href="javascript:;"><img src="'.asset('img/play4.png').'" alt="Ver ruta" width="21" height="20" border="0" /></a>'.
                        '</td>';
                }
                    
                if ($ot->ppto == 1 && $ot->tppto != 2 && $ot->tppto != 3) {
                    $col .= '<td width="22">'.
                        '<a href="javascript:;"><img src="'.asset('img/play2.png').'" alt="Aprobar presupuesto" width="21" height="20" border="0" /></a>'.
                        '</td>'.
                        '<td width="21">'.
                        '<a href="javascript:;"><img src="'.asset('img/play3.png').'" alt="Rechazar presupuesto" width="21" height="20" border="0" /></a>'.
                        '</td>';
                }
                    
                $col .= '<td width="15">'.
                    '<a href="javascript:;" onclick="load_detalle('.$ot->id_ot.')"><img src="'.asset('img/play.png').'" width="21" height="20" border="0" /></a>'.
                    '</td>'.
                    '</tr>'.
                    '</table>';
                return $col;
            })
            ->rawColumns(['icono', 'v_pendiente', 'action'])
            ->make(true);
    }

    public function save_cliente(Request $request)
    {
    	$this->validate($request, [
            'rut' => 'required|numeric',
            'dv' => 'required',
            'nombre' => 'required',
            'id_tipo_direccion' => 'required|exists:tipo_direccion,id_tipo_direccion',
            'direccion' => 'required',
            'sector' => 'required',
            'id_region' => 'required|exists:regiones,id_region',
            'id_ciudad' => 'required|exists:ciudades,id_ciudad',
            'id_comuna' => 'required|exists:comunas,id_comuna',
            'fono_particular' => 'required|numeric',
            'celular' => 'required|numeric',
            'fono_trabajo' => 'required|numeric',
            'email' => 'required|email'
        ]);

        try {

            DB::beginTransaction();

            $id_cliente = $request->id_cliente;

            if ($id_cliente) {
                //Crear Cliente
                $cliente = Clientes::where('id_cliente', $id_cliente)->first();
                $cliente->save();
            } else {
                //Actualizar Cliente
                $id_cliente = Clientes::insertGetId([
                    'rut' => $request->rut,
                    'dv' => $request->dv,
                    'nombre' => $request->nombre,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            }


            $id_cliente_direccion = Cliente_Direcciones::insertGetId([
                'id_cliente' => $id_cliente,
                'id_sucursal_tmp' => 0,
                'contacto' => $request->nombre,
                'direccion' => $request->direccion,
                'sector' => $request->sector,
                'id_region' => $request->id_region,
                'id_ciudad' => $request->id_ciudad,
                'id_comuna' => $request->id_comuna,
                'fono_particular' => $request->fono_particular,
                'fono_trabajo' => $request->fono_trabajo,
                'celular' => $request->celular,
                'email' => $request->email,
                'id_tipo_direccion' => $request->id_tipo_direccion,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'id_cliente_direccion' => $id_cliente_direccion
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg_error' => $e]);
        }
    }

    public function existe(Request $request)
    {
    	$cliente = Clientes::where('rut', $request->rut)->where('dv', $request->dv)->first();

    	if(!$cliente){
    		return response()->json(['existe' => false]);
    	} else {
    		return response()->json(['existe' => true, 'id_cliente_direccion' => $cliente->direcciones()->first()->id_cliente_direccion]);
    	}
    }

    public function detalle(Request $request)
    {
        $ot = OT::where('id_ot', $request->id_ot)->first();
        $num_pendientes = OT::join('atenciones', 'atenciones.id_atencion', '=', 'ot.id_atencion')
            ->where('atenciones.id_cliente_direccion', $ot->atencion->id_cliente_direccion)
            ->where('ot.f_final', '0')
            ->count();

        //dd($ot->horario);
        $estado = 'Abierta';
        if ($ot->f_final > 10000000) $estado = "Cerrada";
        if ($ot->m_null == 'S') $estado = "Nula";

        return view('Clientes.atenciones', [
            'detalle' => true,
            'ot' => $ot,
            'cliente_direccion' => $ot->atencion->direccion,
            'num_pendientes' => $num_pendientes,
            'estado' => $estado
        ]);
    }

}
