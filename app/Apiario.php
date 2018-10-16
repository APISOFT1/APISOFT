<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apiario extends Model
{
    protected $table= 'apiarios';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'Descripcion',
        'Cantidad',
        'ubicacion_id'

    ];
    public function ubicacion() 
    {
        return $this->belongsTo(Ubicacion::class, 'ubicacion_id');
    }
}
