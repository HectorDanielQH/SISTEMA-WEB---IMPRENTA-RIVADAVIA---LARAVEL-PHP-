<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $fillable=[
        'numero_consulta',
        'id_cliente',
        'descripcion',
        'tamano',
        'cantidad',
        'precio',
        'atendido',
        'ruta_imagen',
        'created_at'
    ];
    public function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
