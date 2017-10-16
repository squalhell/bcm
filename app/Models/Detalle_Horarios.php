<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Horarios extends Model
{
    protected $table = 'detalle_horarios';
    protected $primaryKey = 'id_horario';

    public function curso_horario() { return $this->belongsTo('App\Models\Cursos_Horarios', 'id_curso_horario'); }
}
