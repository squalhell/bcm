<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';

    public function cliente() { return $this->hasMany('App\Models\Tipo_Cursos', 'id_tipo_curso'); }
    
}
