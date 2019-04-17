<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngresoLamina extends Model
{
    protected $table='detalle_ingreso_lamina';

    protected $primaryKey='iddetalle_ingreso_lamina';
    public $timestamps=false;

    protected $fillable =[
     'idingreso_lamina',
     'lamina_id',
     'Precio',
     'cantidad',
     'descuento'
    ];
    protected $guarded =[
    ];
}