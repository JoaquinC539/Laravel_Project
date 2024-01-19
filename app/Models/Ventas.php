<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table='ventas';

    protected $primaryKey= '_id';

    protected $fillable = ['cliente', 'producto', 'quantity', 'fecha_orden', 'vendedor'];

    
}
