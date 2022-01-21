<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable=[
        'numero_pedido',
        'id_cliente',
        'descripcion',
        'tamano',
        'cantidad',
        'precio',
        "atendido",
        'ruta_imagen'
    ];
    public function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
