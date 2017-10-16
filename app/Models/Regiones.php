<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    protected $table = 'regiones';
    protected $primaryKey = 'id_region';

    public function ciudades() { return $this->hasMany('App\Models\Ciudades', 'id_ciudad'); }
}
