<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuestos_Trabajos extends Model
{
    protected $table = 'presupuestos_trabajos';
    protected $primaryKey = 'id_presupuesto_trabajo';

    public function tipo_presupuesto() { return $this->belongsTo('App\Models\Tipo_Presupuestos', 'id_tipo_presupuesto'); }
    public function tipo_trabajo() { return $this->belongsTo('App\Models\Tipo_Trabajos', 'id_tipo_trabajo'); }
}
