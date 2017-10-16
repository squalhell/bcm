<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

use App\Models\Repuestos;
use App\Models\Atenciones;

class RepuestosController extends Controller
{
    public function index()
    {
    	return view('repuestos.index');
    }
}
