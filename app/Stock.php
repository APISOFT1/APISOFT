<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\RecepcionEstanon;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'precioUnitario','nombre','estanon_recepcions_id','cantidadDisponible'
    ];

   
    public function recepcionEstanon()
    {
         return $this->belongsTo(RecepcionEstanon::class ,'estanon_recepcions_id');
    }

    
}
