<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribuidores_Atenciones extends Model
{
    protected $table = 'distribuidores_atenciones';
    protected $primaryKey = 'id_distribuidor_atencion';

    public function distribuidor() { return $this->belongsTo('App\Models\Distribuidores', 'id_distribuidor'); }
}
