<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Presupuestos extends Model
{
    protected $table = 'tipo_presupuestos';
    protected $primaryKey = 'id_tipo_presupuesto';

    public function presupuesto_trabajo() { return $this->hasMany('App\Models\Presupuestos_Trabajos', 'id_tipo_presupuesto'); }
}
