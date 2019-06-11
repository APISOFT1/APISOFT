<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
     protected $table = 'presentacions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion'
    ];

     public function stocks() 
    {
        return $this->hasMany('App/Stock');
    }
}
