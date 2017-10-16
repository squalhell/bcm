<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabricas extends Model
{
    protected $table = 'fabricas';
    protected $primaryKey = 'id_fabrica';

    public function modelos() { return $this->hasMany('App\Models\Modelos', 'id_fabrica'); }
}
