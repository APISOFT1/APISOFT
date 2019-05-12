<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;


class Role extends Model
{

    use HasPermissions;
    protected $table= 'roles';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'name'

    ];

    public function users()
{
    return $this
        ->belongsToMany('App\User')
        ->withTimestamps();
}
}
