<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    protected $table = 'Atenciones';
    protected $primaryKey = 'id_atencion';

    public function direccion() { return $this->belongsTo('App\Models\Cliente_Direcciones', 'id_cliente_direccion'); }
    public function users() { return $this->belongsTo('App\User', 'id_usr', 'id'); }
    public function OT() { return $this->hasMany('App\Models\OT', 'id_atencion'); }
}
