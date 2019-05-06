<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'precioUnitario','nombre','estanon_recepcions_id','cantidadDisponible'
    ];

   
    public function estanon_recepcion()
    {
         return $this->belongsTo(EstanonRecepcion::class ,'estanon_recepcions_id');
    }

    
}
