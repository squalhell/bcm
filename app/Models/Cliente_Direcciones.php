<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente_Direcciones extends Model
{
    protected $table = 'Cliente_Direcciones';
    protected $primaryKey = 'id_cliente_direccion';
    protected $fillable = ['id_cliente', 'contacto', 'direccion', 'sector', 'id_region', 'id_ciudad', 'id_comuna', 'fono_particular', 'fono_trabajo', 'celular', 'fax', 'email', 'id_tipo_direccion'];

    public function cliente() { return $this->belongsTo('App\Models\Clientes', 'id_cliente'); }
    public function tipo_direccion() { return $this->belongsTo('App\Models\Tipo_Direccion', 'id_tipo_direccion'); }
    public function ciudad() { return $this->belongsTo('App\Models\Ciudades', 'id_ciudad'); }
    public function comuna() { return $this->belongsTo('App\Models\Comunas', 'id_comuna'); }
    public function region() { return $this->belongsTo('App\Models\Regiones', 'id_region'); }
    public function atenciones() { return $this->hasMany('App\Models\Atenciones', 'id_cliente_direccion'); }
}
