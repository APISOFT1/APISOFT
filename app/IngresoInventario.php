<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IngresoLamina extends Model
{
    protected $table='ingreso_inventario';

    protected $primaryKey='idingreso_inventario';

    public $timestamps=false;

    protected $fillable =[
     'idproveedor',
     'idusuario',
     'tipo_comprobante',
     'serie_comprobante',
     'tipo_pago',
     'total_venta',
     'fecha_hora',
     'estado'
    ];
    protected $guarded =[
    ];
}
