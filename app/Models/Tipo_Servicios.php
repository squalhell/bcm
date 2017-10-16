<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Servicios extends Model
{
    protected $table = 'tipo_servicios';
    protected $primaryKey = 'id_tipo_servicio';

    public function ot(){ $this->hasMany('App\Models\OT', 'id_tipo_servicio'); }
}
