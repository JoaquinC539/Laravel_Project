<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App;
use Illuminate\Support\Facades\Redirect;
use PDO;
use Illuminate\Support\Facades\DB;
use App\Services\VendedorService;

class VendedorController extends Controller
{

   protected $vendedorService;

   public function __construct(VendedorService $vendedorService)
   {
      $this->vendedorService = $vendedorService;
   }

   public function index(Request $request)
   {
      $query = Vendedor::query();
      if (($request->filled('nombre'))) {
         $query->where('nombre', 'ilike', '%' . $request->get('nombre') . '%');
      }
      if ($request->filled('activo') && ($request->get('activo') == '1' || $request->get('activo') == '0')) {
         $activo = $request->get('activo');
         $query->where('activo', $activo);
      } else {
         $activo = '2';
      }
      $query->select(["_id", "nombre", 'apellido', 'edad', 'correo_electronico', 'activo']);
      $query->orderBy('_id', 'desc');
      $vendedores = $query->get();
      if ($request->header('Content-Type') === 'application/json') {
         return $vendedores;
      } else {
         $successMessage = $request->session()->get('success');
         $errorMessage = $request->session()->get('error');
         return view('vendedor.index', [
            'vendedores' => $vendedores,
            'activo' => $activo,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
         ]);
      }

   }
   public function show($id, Request $request)
   {
      return redirect()->route('vendedor.edit', $id);
   }

   public function create(Request $request)
   {
      $successMessage = $request->session()->get('success');
      $errorMessage = $request->session()->get('error');
      return view('vendedor.create', [
         'successMessage' => $successMessage,
         'errorMessage' => $errorMessage
      ]);
   }
   public function store(Request $request)
   {
      try {
         $vendedor = new Vendedor;
         $vendedor->nombre = $request->nombre;
         $vendedor->apellido = $request->apellido;
         $vendedor->edad = $request->edad;
         $vendedor->correo_electronico = $request->correo_electronico;

         $vendedor->save();
         return redirect()->route('vendedor.index')->with('success', 'Vendedor guardado exitosamente');
      } catch (\Throwable $th) {
         $error = $th->getMessage();
         redirect()->route('vendedor.index')->with('error', 'Hubo un error al guardar el vendedor: ' . $error);
      }

   }
   public function edit($id, Request $request)
   {
      $vendedor = Vendedor::find($id);
      if ($request->header('Content-Type') === 'application/json') {
         return $vendedor;
      }
      $successMessage = $request->session()->get('success');
      $errorMessage = $request->session()->get('error');
      return view("vendedor.edit", [
         'vendedor' => $vendedor,
         'successMessage' => $successMessage,
         'errorMessage' => $errorMessage
      ]);
   }
   public function update($id, Request $request)
   { 
         try {
         $vendedor = Vendedor::findOrFail($id);

         $vendedor->nombre = $request->nombre;
         $vendedor->apellido = $request->apellido;
         $vendedor->edad = $request->edad;
         $vendedor->correo_electronico = $request->correo_electronico;

         $vendedor->save();

         return redirect()->route('vendedor.index')->with('success', 'Vendedor editado exitosamente');
         } catch (\Throwable $th) {
            $error= $th->getMessage();
            return redirect()->route('vendedor.index')->with('error', 'Hubo un error: ' . $error);
            
         }
         
      
   }
   public function destroy($id, Request $request)
   {
      $vendedor = Vendedor::findOrFail($id);
      $vendedor->activo = false;
      $vendedor->save();
      return $vendedor;
   }

   public function miMetodo(Request $request)
   {
      try {
         $results = $this->vendedorService->index($request);

         return view("vendedor.miMetodo", [
            "vendedores" => $results,

         ]);
      } catch (\PDOException $e) {
         return view("vendedor.miMetodo", [
            "error" => $e->getMessge()
         ]);
      }

      // return Redirect::to('/vendedor');
   }

   public function getQueryLow($id, Request $request)
   {
      $resultsLaravel = $this->vendedorService->get($id, $request);
      return $resultsLaravel;
   }


}
