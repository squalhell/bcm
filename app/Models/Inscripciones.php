<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    protected $table = 'inscripciones';
    protected $primaryKey = 'id_inscripcion';

    public function curso() { return $this->belongsTo('App\Models\Cursos', 'id_curso'); }
    public function gasfiter() { return $this->belongsTo('App\Models\Gasfiter', 'Id', 'id_gasfiter'); }
}
