<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductoService;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }
    public function index(Request $request)
    {
        $response = $this->productoService->index($request);
        $productos = $response[0];
        if ($request->header('Content-Type') === 'application/json') {
            return $productos;
        } else {
            $proveedores = Proveedor::all();
            $successMessage = $request->session()->get('success');
            $errorMessage = $request->session()->get('error');
            return view('producto.index', [
                'productos' => $productos,
                "request" => $request,
                'proveedores' => $proveedores,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage
            ]);
        }
    }

    public function create(Request $request)
    {
        $proveedores = Proveedor::all();
        $successMessage = $request->session()->get('success');
        $errorMessage = $request->session()->get('error');
        return view('producto.create', [
            'proveedores' => $proveedores,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage
        ]);
    }
    public function show($id, Request $request)
    {
        if ($request->header('Content-Type') === 'application/json') {
            return $this->productoService->get($id, $request);
        }
        return redirect()->route('producto.edit', $id);
    }
    public function edit($id, Request $request)
    {
        $producto = Producto::find($id);
        $proveedores = Proveedor::all();
        $successMessage = $request->session()->get('success');
        $errorMessage = $request->session()->get('error');
        return view('producto.edit', [
            "producto" => $producto,
            'proveedores' => $proveedores,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage
        ]);
    }
    public function store(Request $request)
    {
        try {
            $producto = $this->productoService->store($request);
            return redirect()->route('producto.edit', $producto->_id)->with('success', 'Producto guardado con exito');
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect()->route('producto.index')->with('error', 'Hubo un error: ' . $error);
        }

    }
    public function update($id, Request $request)
    {
        try {
            $producto = $this->productoService->update($id, $request);
            return redirect()->route('producto.edit', $producto->_id)->with('success', 'Producto editado con exito');
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return redirect()->route('producto.edit')->with('error', 'Hubo un error: ' . $error);
        }

    }
    public function destroy($id, Request $request)
    {
        $producto = Producto::find($id);
        $producto->activo = false;
        $producto->save();
        return $producto;
    }
}
