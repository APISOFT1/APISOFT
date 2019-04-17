<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IngresoLamina extends Model
{
    protected $table='ingreso_lamina';

    protected $primaryKey='idingreso_lamina';

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
