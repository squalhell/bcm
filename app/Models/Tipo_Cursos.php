<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cursos extends Model
{
    protected $table = 'tipo_cursos';
    protected $primaryKey = 'id_tipo_curso';

    public function cursos() { return $this->belongsTo('App\Models\Cursos', 'id_tipo_curso'); }
}
