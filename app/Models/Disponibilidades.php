<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilidades extends Model
{
    protected $table = 'disponibilidades';
    protected $primaryKey = 'id_disponibilidad';

    public function salas() { return $this->hasMany('App\Models\Salas', 'id_disponibilidad'); }
    
}
