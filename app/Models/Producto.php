<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

class Producto extends Model
{
    use HasFactory;
    protected $table='productos';

    protected $primaryKey='_id';
    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'category',
        'precio',
        'descripcion',
        'proveedor'
    ];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor','_id')->select(['nombre']);
    }
    public function proveedorNombre(Producto $producto){
       return proveedor::find($producto->proveedor)->nombre;
    }
}
