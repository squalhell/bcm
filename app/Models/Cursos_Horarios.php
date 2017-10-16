<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos_Horarios extends Model
{
    protected $table = 'cursos_horarios';
    protected $primaryKey = 'id_curso_horario';

    public function curso() { return $this->belongsTo('App\Models\Cursos', 'id_curso'); }
    public function relator() { return $this->belongsTo('App\Models\Relatores', 'id_relator'); }
    public function sala() { return $this->belongsTo('App\Models\Salas', 'id_sala'); }
    public function detalle_horarios() { return $this->hasMany('App\Models\Detalle_Horarios', 'id_curso_horario'); }
}
