<?php
namespace App\Services;

use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoService{

    public function __construct(){

    }

    public function index(Request $request){
        $query=Producto::query(); 
            if(($request->filled('nombre'))){
                $query->where('productos.nombre','ilike','%'.$request->get('nombre').'%');
            }
            if(($request->filled('category'))){
                $query->where('productos.category','ilike','%'.$request->get('category').'%');
            }
            if(($request->filled('precio'))){
                $query->where('productos.precio','ilike','%'.$request->get('precio').'%');
            }
            if(($request->filled('proveedor'))){
                $query->where('productos.proveedor',$request->get('proveedor'));
            }
            if(($request->filled('descripción'))){
                $query->where('productos.descripcion','ilike','%'.$request->get('direccion').'%');
            }
        $query->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores._id');
        $query->select('productos.*', 'proveedores.nombre as nombre_proveedor');
         $query->orderBy('productos._id',"desc");
        //  $productos=$query->get();
        $productos=$query->paginate(10);
         return [$productos];
        //  $productos = Producto::query()
        //  ->when($request->filled('nombre'), function ($query) use ($request) {
        //      $query->where('nombre', 'ilike', '%' . $request->get('nombre') . '%');
        //  })
        //  ->when($request->filled('contacto'), function ($query) use ($request) {
        //      $query->where('category', 'ilike', '%' . $request->get('contacto') . '%');
        //  })
        //  ->when($request->filled('email'), function ($query) use ($request) {
        //      $query->where('precio', 'ilike', '%' . $request->get('email') . '%');
        //  })
        //  ->when($request->filled('direccion'), function ($query) use ($request) {
        //      $query->where('descripcion', 'ilike', '%' . $request->get('direccion') . '%');
        //  })
        //  ->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores._id')
        // ->select('productos.*', 'proveedores.nombre as nombre_proveedor')
        //  ->orderBy('_id', 'desc')
        //  ->get();
        //  foreach($productos as $producto){
        //     $producto->proveedor=$producto->proveedorNombre($producto->proveedor);
        //  }
        //  return [$productos];
        }
     
    public function get($id,Request $requets){
        $producto=Producto::find($id);
        return $producto;
    }
    public function store(Request $request){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->category = $request->category;
        $producto->precio = $request->precio;
        $producto->proveedor = $request->proveedor;
        $producto->descripcion = $request->descripcion;
    
        $producto->save();
        return $producto;
    }
    
    public function update($id, Request $request){
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->category = $request->category;
        $producto->precio = $request->precio;
        $producto->proveedor = $request->proveedor;
        $producto->descripcion = $request->descripcion;
    
        $producto->save();
        return $producto;
    }
    
}

