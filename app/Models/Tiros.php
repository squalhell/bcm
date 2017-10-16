<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiros extends Model
{
    
	protected $table = 'tiros';
	protected $primaryKey = 'id_tiro';
	
	public function tipo_gases() { return $this->belongsTo('App\Models\Tipo_Gases', 'id_gas'); }
	public function OT() { return $this->hasMany('App\Models\OT', 'id_tiro'); }

}
