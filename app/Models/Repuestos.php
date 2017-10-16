<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repuestos extends Model
{
    protected $table = 'repuestos';
    protected $primaryKey = 'id_repuesto';

    public function atencion() { return $this->hasMany('App\Models\Atenciones', 'id_atencion'); }
}
