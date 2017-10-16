<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table = 'ciudades';
    protected $primaryKey = 'id_ciudad';

    public function comunas() { return $this->hasMany('App\Models\Comunas', 'id_ciudad'); }
    public function region() { return $this->belongsTo('App\Models\Regiones', 'id_region'); }
}
