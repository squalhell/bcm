<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    protected $table = 'salas';
    protected $primaryKey = 'id_sala';

    public function comuna() { return $this->belongsTo('App\Models\Comunas', 'id_comuna'); }
    public function disponibilidad() { return $this->belongsTo('App\Models\Disponibilidades', 'id_disponibilidad'); }
    public function tipo_horario() { return $this->belongsTo('App\Models\Tipo_Horarios', 'id_tipo_horario'); }
}
