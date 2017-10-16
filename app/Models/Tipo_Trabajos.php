<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Trabajos extends Model
{
    protected $table = 'tipo_trabajos';
    protected $primaryKey = 'id_tipo_trabajo';

    public function tipo_atenciones() { return $this->belongsTo('App\Models\Tipo_Atenciones', 'id_tipo_atencion'); }
    public function presupuesto_trabajo() { return $this->hasMany('App\Models\Presupuestos_Trabajos', 'id_tipo_trabajo'); }
}
