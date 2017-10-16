<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = 'horarios';
    protected $primaryKey = 'id_horario';

    public function OT() { return $this->hasMany('App\Models\OT', 'id_horario'); }
}
