<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;

    protected $fillable=[
        'ci',
        'nombres',
        'apellidos',
        'correo_electronico'
    ];
    public function ventas(){
        return $this->hasOne(Venta::class, 'id');
    }
}
