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

    public function permissions(){
        return $this->belongsToMany(config('permission.models.permission'), config('permission.table_names.role_has_permissions')
        );
    }
}
