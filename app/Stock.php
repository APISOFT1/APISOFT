<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\RecepcionEstanon;
<<<<<<< HEAD

=======
>>>>>>> Caro
class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';
    protected $fillable = [
       'nombre','cantidadDisponible', 'precioUnitario','estanon_recepcions_id'
    ];
<<<<<<< HEAD

=======
>>>>>>> Caro
   
    public function recepcionEstanon()
    {
         return $this->belongsTo(RecepcionEstanon::class ,'estanon_recepcions_id');
    }
<<<<<<< HEAD

=======
>>>>>>> Caro
    
}