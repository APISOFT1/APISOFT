<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
         'password',
        'Apellido1',
        'Apellido2',
        'Telefono',
        'Direccion',
        'Fecha_Ingreso',
        'genero_id',
        'rol_id'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Genero() 
    {
        return $this->belongsTo(Genero::class ,'genero_id');
    }

    public function Rol() 
    {
        return $this->BelongsTo(Rol::class,'rol_id');
    }
}
