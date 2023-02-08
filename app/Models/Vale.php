<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    protected $fillable = [
        'empresa_id',
        'item_id',
        'novales',
        'desde',
        'hasta',
        'importeuni',
        'importetot',
        'prelitro',
        'contador',
        'litros',
        'fecha',
        'fechacc',
        'estado',
        'estates',
        'obs',
        'user_id',
        'referencia',
        'date',
    ];

    use HasFactory;
    // Obtiene el Item del Vale via FK
    public function item(){
        return $this->hasOne(Item::class, 'id', 'item_id');
    }

    //Obtiene la Empresa del Vale via FK
    public function empresa(){
        return $this->hasOne(Empresa::class, 'id', 'empresa_id');
    }
    // Obtiene los Vales2 dek Vale via FK
    public function vales2(){
        return $this->hasMany(Vale2::class, 'vale_id', 'id');
    } 
    
}
