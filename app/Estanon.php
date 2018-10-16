<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estanon extends Model
{
    protected $table= 'estanons';
    protected $primaryKey="id";
    
    public $timestamps=true;
    protected $casts = [
        'Fecha' => 'Y-m-d H:i:s'
    ];
    protected $fillable =[
        'Peso',
        'Fecha'

    ];
}
