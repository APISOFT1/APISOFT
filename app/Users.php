<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\MailResetPasswordToken;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Model
{
    use Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public  $incrementing=false;  // para quitar que le de 0
    protected $table= 'user';
    protected $primaryKey="id";
    
    public $timestamps=true;
    protected $fillable = [
        'id',
        'name', 
        'Apellido1',
        'Apellido2',
        'Telefono',
        'Direccion',
        'Fecha_Ingreso',
        'Genero_Id',
        'estado_id'
        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function Genero() 
    {
        return $this->belongsTo(Genero::class ,'Genero_Id');
    }
    
}
