<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stec extends Model
{
    protected $table = 'stec';
    protected $primaryKey = 'id_stec';

    public function OT() { return $this->hasMany('App\Models\OT', 'id_stec'); }
}
