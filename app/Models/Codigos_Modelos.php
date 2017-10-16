<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codigos_Modelos extends Model
{
    protected $table = 'codigos_modelos';
    protected $primaryKey = 'id_codigo_modelo';

    public function OT() { return $this->hasMany('App\Models\OT', 'id_codigo_modelo'); }
}
