<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ventas;

class Vendedor extends Model
{
    use HasFactory;
    protected $table='vendedores';

    protected $primaryKey= '_id';
    // public $timestamps=false;
    protected $fillable=[
        'nombre',
        'apellido',
        'edad',
        'correo_electronico',
        'activo',
    ];
    

    
    

}
