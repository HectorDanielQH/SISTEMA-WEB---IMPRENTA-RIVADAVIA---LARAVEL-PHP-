<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jefe extends Model
{
    use HasFactory;
    public $table = "jefes";
    protected $fillable=[
        'ci',
        'nombres',
        'apellidos',
        'correo_electronico',
        'created_at',
    ];
    
}
