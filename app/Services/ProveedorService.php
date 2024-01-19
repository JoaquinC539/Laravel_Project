<?php

namespace App\Services;

use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedor;

class ProveedorService{

    protected $table='proveedores';

    public function index(Request $request){
        $activo;
        $query=Proveedor::query();
            if(($request->filled('nombre'))){
                $query->where('nombre','ilike','%'.$request->get('nombre').'%');
            }
            if(($request->filled('contacto'))){
                $query->where('contacto','ilike','%'.$request->get('contacto').'%');
            }
            if(($request->filled('email'))){
                $query->where('email','ilike','%'.$request->get('email').'%');
            }
            if(($request->filled('direccion'))){
                $query->where('direccion','ilike','%'.$request->get('direccion').'%');
            }
            if($request->filled('activo') && ($request->get('activo')=='1' || $request->get('activo')=='0')){
                $activo=$request->get('activo');
                $query->where('activo',$activo);
            }else if(!$request->filled('activo')){
                $activo='1';
                $query->where('activo',$activo);
            }else{
                $activo='2';
            }
         $query->orderBy('_id',"desc");
         $proveedores=$query->get();
         return [$proveedores,$activo];
    }
     
    public function get($id,Request $requets){
        $proveedor=Proveedor::find($id);
        return $proveedor;
    }
    public function store(Request $request){
        $proveedor = new Proveedor();
        $proveedor->nombre=$request->nombre;
        $proveedor->contacto=$request->contacto;
        $proveedor->email=$request->email;
        $proveedor->direccion=$request->direccion;
        $proveedor->activo=true;

        $proveedor->save();
        return $proveedor;
    }

    public function update($id,Request $request){
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->nombre=$request->nombre;
        $proveedor->contacto=$request->contacto;
        $proveedor->email=$request->email;
        $proveedor->direccion=$request->direccion;
        $proveedor->activo=$request->activo;

        $proveedor->save();
        return $proveedor;
    }
}

