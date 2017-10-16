<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
	protected $table = 'Marcas';
    protected $primaryKey = 'id_marca';

    public function OT() { return $this->hasMany('App\Models\OT', 'id_marca'); }
}
