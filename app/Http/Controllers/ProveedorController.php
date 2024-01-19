<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProveedorService;
use App\Models\Proveedor;

class ProveedorController extends Controller{

    protected $proveedorService;

    public function __construct(ProveedorService $proveedorService) {
        $this->proveedorService=$proveedorService;
    }
    public function index(Request $request){
        $response=$this->proveedorService->index($request);
        $proveedores=$response[0];
         if($request->header('Content-Type')==='application/json'){
            return $proveedores;
         }else{
            return view('proveedor.index',['proveedores'=>$proveedores,'activo'=>$response[1],"request"=>$request]);
         }
    }
    
    public function create(Request $request){
        return view('proveedor.create');
    }
    public function show($id,Request $request){
        if($request->header('Content-Type')==='application/json'){
            return $this->proveedorService->get($id,$request);
        }
        return redirect()->route('proveedor.edit',$id);
    }
    public function edit($id,Request $request){
        $proveedor=Proveedor::find($id);
        return view('proveedor.edit',["proveedor"=>$proveedor]);
    }
    public function store(Request $request){
        $proveedor=$this->proveedorService->store($request);
        return redirect()->route('proveedor.edit',$proveedor->_id);
    }
    public function update($id,Request $request){
        $proveedor=$this->proveedorService->update($id,$request);
        return redirect()->route('proveedor.edit',$proveedor->_id);
    }
    public function destroy($id,Request $request){
       $proveedor=Proveedor::find($id);
       $proveedor->activo=false;
       $proveedor->save();
       return $proveedor;
    }

}
