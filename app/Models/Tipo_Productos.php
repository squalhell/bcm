<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Productos extends Model
{
    protected $table = 'Tipo_Productos';
    protected $primaryKey = 'id_tipo_producto';
    protected $fillable = ['id_tipo_producto', 'desc_tipo_producto', 'activo', 'img'];

    public function OT() { return $this->hasMany('App\Models\OT', 'id_tipo_producto'); }
    public function litraje() { return $this->hasMany('App\Models\Litrajes', 'id_tipo_producto'); }
}
