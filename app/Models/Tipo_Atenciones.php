<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Atenciones extends Model
{
    protected $table = 'tipo_atenciones';
    protected $primaryKey = 'id_tipo_atencion';

    public function Tipo_Trabajos() { return $this->hasMany('App\Models\Tipo_Trabajos', 'id_tipo_atencion'); }
    public function OT() { return $this->hasMany('App\Models\OT', 'id_tipo_atencion'); }
}
