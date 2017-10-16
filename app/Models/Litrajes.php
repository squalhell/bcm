<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Litrajes extends Model
{
    protected $table = 'litrajes';
    protected $primaryKey = 'id_litraje';

    public function productos() { return $this->belongsTo('App\Models\Tipo_Productos', 'id_tipo_producto'); }
    public function OT() { return $this->hasMany('App\Models\OT', 'id_litraje'); }
}
