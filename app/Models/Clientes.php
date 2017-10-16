<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = ['rut', 'dv', 'nombre', 'fono_particular', 'fono_trabajo', 'celular', 'fax', 'email'];

    public function direcciones() { return $this->hasMany('App\Models\Cliente_Direcciones', 'id_cliente'); }

}
