<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable implements MustVerifyEmail
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
        'name', 'email', 'password', 'active', 'confirmation_code', 'confirmed'
     
        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   
    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }
}