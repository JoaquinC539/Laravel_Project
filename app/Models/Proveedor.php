<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Proveedor extends Model
{
    use HasFactory;

    protected $table='proveedores';

    protected $primaryKey='_id';
    // public $timestamps=false;

    protected $fillable=[
        'nombre',
        'contacto',
        'direccion',
        'email',
        'activo'
    ];

    

}
