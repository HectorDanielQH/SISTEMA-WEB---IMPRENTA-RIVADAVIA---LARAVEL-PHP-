<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable=[
        'ci',
        'nombres',
        'apellidos',
        'institucion',
        'correo_electronico'
    ];
    public function pedidos(){
        return $this->hasMany(Pedido::class, 'id');
    }
    public function consultas(){
        return $this->hasMany(Consultas::class, 'id');
    }
    public function usuarios(){
        return $this->hasOne(Usuario::class);
    } 

    public function compras(){
        return $this->hasOne(Venta::class, 'id');
    }
}
