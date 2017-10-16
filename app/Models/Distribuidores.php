<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribuidores extends Model
{
    protected $table = 'distribuidores';
    protected $primaryKey = 'id_distribuidor';

    public function distribuidores_atenciones() { return $this->hasMany('App\Models\Distribuidores_Atenciones', 'id_distribuidor'); }
}
