<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\RecepcionEstanon;
class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';
    protected $fillable = [
       'producto_id',
       'presentacion_id',
       'cantidadDisponible', 
       'precioUnitario',
       'estanon_recepcions_id'
    ];
   
    public function recepcionEstanon()
    {
         return $this->belongsTo(RecepcionEstanon::class ,'estanon_recepcions_id');
    }
       public function producto()
    {
         return $this->belongsTo(Producto::class ,'producto_id');
    }
       public function presentacion()
    {
         return $this->belongsTo(Presentacion::class ,'presentacion_id');
    }
    
}