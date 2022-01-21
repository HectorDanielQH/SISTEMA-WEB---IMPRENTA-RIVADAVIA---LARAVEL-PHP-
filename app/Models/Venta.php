<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable=[
        "numero_venta",
        "id_vendedor",
        "id_cliente",
        "descripcion",
        "cantidad",
        "precio",
        "created_at",
    ]; 
    use HasFactory;
    public function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
    public function vendedor(){
        return $this->belongsTo(Encargado::class, 'id_vendedor');
    }
}
