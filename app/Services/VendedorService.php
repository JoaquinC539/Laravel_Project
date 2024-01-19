<?php

namespace App\Services;

use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\DB;


class VendedorService{

    protected $table='vendedores';

    function index(Request $request){
        $results=DB::table($this->table)
        ->select('_id as ID', 'nombre as Nombre', 'apellido', 'edad', 'correo_electronico',
            DB::raw("
                CASE
                    WHEN activo THEN 'Activo'
                    ELSE ' Inactivo'
                END AS Estado
            ")
        )
        ->orderBy("_id","desc")
        ->get();
        return $results;
    }

    function get($id,Request $request){
        $query="SELECT * FROM ";
        $query.=$this-> table;
        $query.=" WHERE _id=?";
        $result=DB::select($query,[$id]);
        return $result;
    }
}