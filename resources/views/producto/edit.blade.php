@extends('layouts.app')

@section('title', 'Producto edit')

@section('content')

    <title>Prodcuto</title>

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            Producto
        </div>
        <div class="card-subtitle mb-2 text-body-secondary text-center">
            Edit
        </div>
        <div class="card-subtitle">
            <div class="d-flex justify-content-center">
                <a href="/producto" class="btn btn-primary" type="button">Ir a pagina principal</a>
            </div>
        </div>
        <br>
        
        @if (!empty($successMessage))
            <div class="row message-container">
                <div class="col-12 bg-success message">
                    <p class="text-center" style="color: azure; font-size:1.3em">{{ $successMessage }}</p>
                </div>
            </div>
        @endif
        @if (!empty($errorMessage))
            <div class="row message-container">
                <div class="col-12 bg-danger message">
                    <p class="text-center" style="color: azure; font-size:1.3em">{{ $errorMessage }}</p>
                </div>
            </div>
        @endif
        <br>
        <div class="card-subtitle">
            <form class="form" id="producto_put" action="{{ route('producto.update', $producto->_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="ID" name="_id" aria-label="_id"
                            disabled value="{{ $producto->_id }}">
                    </div>

                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre"
                            required value="{{ $producto->nombre }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Categoria" name="category"
                            aria-label="category" required value="{{ $producto->category }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="number" placeholder="Precio" name="precio" aria-label="precio"
                            required value="{{ $producto->precio }}">
                    </div>

                    <div class="col-12 col-md-4 form-box">
                        <select name="proveedor" class="form-control" id="proveedor" required>
                            <option value="">Selecciona un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->_id }}"
                                    {{ $producto->proveedor == $proveedor->_id ? 'selected' : '' }}>{{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12  form-box">
                        <textarea name="descripcion" id="descripcion" cols="50" rows="5" placeholder="Descripción" required>{{ $producto->descripcion }}</textarea>
                    </div>


                </div>
                <br>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Actualizar producto">
            </form>
        </div>
    </div>

@endsection
