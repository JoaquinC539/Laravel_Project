<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductoService;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function __construct(ProductoService $productoService) {
        $this->productoService=$productoService;
    }
    public function index(Request $request){
        $response=$this->productoService->index($request);
        $productos=$response[0];
         if($request->header('Content-Type')==='application/json'){
            return $productos;
         }else{
            $proveedores=Proveedor::all();
            
            return view('producto.index',['productos'=>$productos,"request"=>$request,'proveedores'=>$proveedores]);
         }
    }
    
    public function create(Request $request){
        $proveedores=Proveedor::all();
        return view('producto.create',['proveedores'=>$proveedores]);
    }
    public function show($id,Request $request){
        if($request->header('Content-Type')==='application/json'){
            return $this->productoService->get($id,$request);
        }
        return redirect()->route('producto.edit',$id);
    }
    public function edit($id,Request $request){
        $producto=Producto::find($id);
        $proveedores=Proveedor::all();
        return view('producto.edit',["producto"=>$producto,'proveedores'=>$proveedores]);
    }
    public function store(Request $request){
        $producto=$this->productoService->store($request);
        return redirect()->route('producto.edit',$producto->_id);
    }
    public function update($id,Request $request){
        $producto=$this->productoService->update($id,$request);
        return redirect()->route('producto.edit',$producto->_id);
    }
    public function destroy($id,Request $request){
       $producto=Producto::find($id);
       $producto->activo=false;
       $producto->save();
       return $producto;
    }
}
