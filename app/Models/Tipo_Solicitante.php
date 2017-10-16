<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Solicitante extends Model
{
    protected $table = 'tipo_solicitante';
    protected $primaryKey = 'id_tipo_solicitante';

    public function OT() { return $this->hasMany('App\Models\OT', 'id_tipo_solicitante'); }
}
