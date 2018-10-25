<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecepcionMateriaPrima extends Model
{
    protected $table= 'recepcion_materia_primas';
    protected $primaryKey="id";
    public $timestamps=true;
    protected $fillable = 
    [      
        'fecha',
        'pesoBruto',
        'user_id',
        'afiliado_id',
        'tipoEntrega_id'
    ];
    public function user() 
    {
        return $this->belongsTo(User::class ,'user_id');
    }
    public function afiliado() 
    {
        return $this->BelongsTo(Afiliado::class,'afiliado_id');
    }
    public function tipoEntrega() 
    {
        return $this->BelongsTo(TipoEntrega::class,'tipoEntrega_id');
    }
}
