<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especificaciones extends Model
{
    protected $table = 'especificaciones';
    protected $primaryKey = 'id_especificacion';

    public function modelos() { return $this->hasMany('App\Models\Modelos', 'id_especificacion'); }
}
