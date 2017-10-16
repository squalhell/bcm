<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Gases extends Model
{
    protected $table = 'tipo_gases';
    protected $primaryKey = 'id_tipo_gas';

    public function Tiros() { return $this->hasMany('App\Models\Tiro', 'id_gas'); }
    public function litraje() { return $this->belongsTo('App\Models\Litrajes', 'id_litraje'); }
    public function OT() { return $this->hasMany('App\Models\OT', 'id_tipo_gas'); }
}
