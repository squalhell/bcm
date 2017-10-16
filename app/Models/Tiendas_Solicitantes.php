<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiendas_Solicitantes extends Model
{
    protected $table = 'Tiendas_Solicitantes';
    protected $primaryKey = 'id_tienda_solicitante';

    public function nomina_tienda() { return $this->belongsTo('App\Models\Nomina_Tiendas', 'id_nomina_tienda'); }
}
