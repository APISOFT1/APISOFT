<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable 
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
        'email',
        'email_verified_at',
        'password',
        'Apellido1',
        'Apellido2',
        'Telefono',
        'Direccion',
        'Fecha_Ingreso',
        'Genero_Id',
        'Rol_Id',
<<<<<<< HEAD
        'Estado_Id'
=======
        'estado_id'
>>>>>>> develop
        

    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
<<<<<<< HEAD

  
=======
    protected $casts = [
        'Fecha_Ingreso' => 'Y-m-d H:i:s'
    ];
>>>>>>> develop
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
    public function Genero() 
    {
        return $this->belongsTo(Genero::class ,'Genero_Id');
    }

    public function Rol() 
    {
        return $this->BelongsTo(Rol::class,'Rol_Id');
    }
<<<<<<< HEAD
    public function Estado() 
    {
        return $this->Belongsto(Estado::class,'Estado_id');
    }
=======
   
>>>>>>> develop
}
