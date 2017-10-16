<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $table = 'modelos';
    protected $primaryKey = 'id_modelo';

    public function fabrica() { return $this->belongsTo('App\Models\Fabricas', 'id_fabrica'); }
    public function modelo() { return $this->belongsTo('App\Models\Modelos', 'id_especificacion'); }
    public function tiro() { return $this->belongsTo('App\Models\Tiros', 'id_especificacion'); }

}
