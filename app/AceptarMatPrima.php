<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AceptarMatPrima extends Model
{
   
    protected $table= 'aceptar_mat_primas';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'descripcion'
    ];
   
}
