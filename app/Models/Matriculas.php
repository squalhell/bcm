<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    protected $table = 'Matriculas';
    protected $primaryKey = 'id_matricula';

    public function inscripcion() { return $this->belongsTo('App\Models\Inscripciones', 'id_inscripcion'); }
    public function curso_horario() { return $this->belongsTo('App\Models\Cursos_Horarios', 'id_curso_horario'); }
}
