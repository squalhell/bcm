<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Horarios extends Model
{
    protected $table = 'tipo_horarios';
    protected $primaryKey = 'id_tipo_horario';

    public function salas() { return $this->hasMany('App\Models\Salas', 'id_tipo_horario'); }
    
}
