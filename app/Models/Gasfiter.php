<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasfiter extends Model
{
    protected $connection = 'bcm_old';
    protected $table = 'gasfiter';
    protected $primaryKey = 'Id';

    public function inscripciones() { return $this->hasMany('App\Models\Inscripciones', 'id_gasfiter', 'Id'); }
}
