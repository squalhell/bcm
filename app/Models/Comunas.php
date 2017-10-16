<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunas extends Model
{
    protected $table = 'comunas';
    protected $primaryKey = 'id_comuna';

    public function cliente_direcciones() { return $this->hasMany('App\Models\Cliente_Direcciones', 'id_comuna'); }
    public function ciudad() { return $this->belongsTo('App\Models\Ciudades', 'id_ciudad'); }
}
