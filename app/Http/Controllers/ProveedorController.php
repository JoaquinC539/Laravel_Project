<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProveedorService;
use App\Models\Proveedor;

class ProveedorController extends Controller
{

    protected $proveedorService;

    public function __construct(ProveedorService $proveedorService)
    {
        $this->proveedorService = $proveedorService;
    }
    public function index(Request $request)
    {
        $response = $this->proveedorService->index($request);
        $proveedores = $response[0];
        if ($request->header('Content-Type') === 'application/json') {
            return $proveedores;
        } else {
            $successMessage = $request->session()->get('success');
            $errorMessage = $request->session()->get('error');
            return view('proveedor.index', [
                'proveedores' => $proveedores,
                'activo' => $response[1],
                "request" => $request,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage
            ]);
        }
    }

    public function create(Request $request)
    {
        $successMessage = $request->session()->get('success');
        $errorMessage = $request->session()->get('error');
        return view('proveedor.create',[
        'successMessage' => $successMessage,
        'errorMessage' => $errorMessage]);
    }
    public function show($id, Request $request)
    {
        if ($request->header('Content-Type') === 'application/json') {
            return $this->proveedorService->get($id, $request);
        }
        return redirect()->route('proveedor.edit', $id);
    }
    public function edit($id, Request $request)
    {
        $proveedor = Proveedor::find($id);
        $successMessage = $request->session()->get('success');
        $errorMessage = $request->session()->get('error');
        return view('proveedor.edit', ["proveedor" => $proveedor,
        'successMessage' => $successMessage,
        'errorMessage' => $errorMessage]);
    }
    public function store(Request $request)
    {
        try {
            $proveedor = $this->proveedorService->store($request);
            return redirect()->route('proveedor.create', $proveedor->_id)->with('success', 'Proveedor guardado con exito');
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect()->route('proveedor.index')->with('error', 'Hubo un error: ' . $error);
        }

    }
    public function update($id, Request $request)
    {
        try {
            $proveedor = $this->proveedorService->update($id, $request);
            return redirect()->route('proveedor.edit', $proveedor->_id)->with('success', 'Proveedor editado con exito');
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect()->route('proveedor.edit')->with('error', 'Hubo un error: ' . $error);
        }

    }
    public function destroy($id, Request $request)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->activo = false;
        $proveedor->save();
        return $proveedor;
    }

}
