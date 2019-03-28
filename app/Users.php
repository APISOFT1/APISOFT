<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable 
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table= 'users';
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
        'Rol_Id',
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

    public function Rol() 
    {
        return $this->BelongsTo(Rol::class,'Rol_Id');
    }
   
}
