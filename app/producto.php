<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre'
    ];

     public function stocks() 
    {
        return $this->hasMany('App/Stock');
    }
}
