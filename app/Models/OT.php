<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
    protected $table = "ot";
    protected $primaryKey = "id_ot";
    //protected $fillable = ['id_ot', 'id_atencion', 'id_tipo_producto'];

    public function tipo_servicio() { return $this->belongsTo('App\Models\Tipo_Servicios', 'id_tipo_servicio'); }
    public function tipo_producto() { return $this->belongsTo('App\Models\Tipo_Productos', 'id_tipo_producto'); }
    public function atencion() { return $this->belongsTo('App\Models\Atenciones', 'id_atencion'); }
    public function marca() { return $this->belongsTo('App\Models\Marcas', 'id_marca'); }
    public function stec() { return $this->belongsTo('App\Models\Stec', 'id_stec'); }
    public function litraje() { return $this->belongsTo('App\Models\Litrajes', 'id_litraje'); }
    public function tipo_gas() { return $this->belongsTo('App\Models\Tipo_Gases', 'id_tipo_gas'); }
    public function tiro() { return $this->belongsTo('App\Models\Tiros', 'id_tiro'); }
    public function codigo_modelo() { return $this->belongsTo('App\Models\Codigos_Modelos', 'id_codigo_modelo'); }
    public function horario() { return $this->belongsTo('App\Models\Horarios', 'id_horario'); }
    public function tipo_atencion() { return $this->belongsTo('App\Models\Tipo_Atenciones', 'id_tipo_atencion'); }
    public function tipo_solicitante() { return $this->belongsTo('App\Models\Tipo_Solicitante', 'id_tipo_solicitante'); }
    public function distribuidor_atencion() { return $this->belongsTo('App\Models\Distribuidores_Atenciones', 'id_distribuidor_atencion'); }
    public function presupuesto_trabajo() { return $this->belongsTo('App\Models\Presupuestos_Trabajos', 'id_presupuesto_trabajo'); }
    public function tipo_trabajo() { return $this->belongsTo('App\Models\Tipo_Trabajos', 'id_tipo_trabajo'); }
    public function tienda_solicitante() { return $this->belongsTo('App\Models\Tiendas_Solicitantes', 'id_tienda_solicitante'); }
    public function tecnico() { return $this->belongsTo('App\User', 'id_usr_tecnico', 'id'); }
    public function tipo_pago() { return $this->belongsTo('App\Models\Tipo_Pagos', 'id_tipo_pago'); }

    //public function modelo() { return $this->belongsTo('App\Models\Modelos', 'id_modelo'); }
}
