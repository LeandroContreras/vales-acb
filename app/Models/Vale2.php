<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vale2 extends Model
{
    protected $table = 'vales2';
    protected $fillable=[
        'vale_id',
        'empresa_id',
        'imp',
        'obs',
        'fct'
    ];
    use HasFactory;
    //Obtiene el Lote(ID) del Vale via FK
    public function vale(){
        return $this->belongsTo(Vale::class, 'id', 'vale_id');
    } 
    //Obtiene la Empresa del Vale via FK
    public function empresa(){
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }
    //
}
