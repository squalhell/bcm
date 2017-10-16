<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomina_Tiendas extends Model
{
    protected $table = 'nomina_tiendas';
    protected $primaryKey = 'id_nomina_tienda';

    //public function tiendas_solicitantes() { return $this->hasMany('App\Models\Tiendas_Solicitantes', 'id_nomina_tienda'); }

}
