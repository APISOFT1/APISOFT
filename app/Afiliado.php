<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table= 'afiliados';
    protected $primaryKey="id";
    public $timestamps=false;
    public $incrementing=false;

    protected $fillable =[
        'id',
        'Nombre',
        'apellido1',
        'apellido2',
        'Telefono',
        'email',
        'Direccion',
        'Fecha_Ingreso',
        'Num_Cuenta',
         'genero_id',
         'estado_civil_id',
         'estado_id'
    ];
   

    public function Genero() 
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }
    public function Estado_Civil() 
    {
        return $this->belongsTo(Estado_Civil::class, 'estado_civil_id');
    }   
}
