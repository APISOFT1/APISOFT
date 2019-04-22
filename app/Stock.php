<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'precioTotal','producto_id','estanon_recepcions_id','cantidadDisponible'
    ];

    public function producto()
    {
        return $this->hasMany(EstanonRecepcion::class, 'producto_id');
    }
    public function estanon_recepcion()
    {
         return $this->belongsTo(EstanonRecepcion::class ,'estanon_recepcions_id');
    }

    
}
