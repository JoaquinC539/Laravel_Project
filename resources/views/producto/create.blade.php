@extends('layouts.app')

@section('title', 'Proveedor create')

@section('content')

    <title>Vendedores</title>

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            Vendedores
        </div>
        <div class="card-subtitle mb-2 text-body-secondary text-center">
            Post
        </div>
        <div class="card-subtitle">
            <div class="d-flex justify-content-center">
                <a href="/producto" class="btn btn-primary" type="button">Ir a pagina principal</a>
            </div>
        </div>
        <br>
        <div class="row message-container" hidden>
            <div class="d-flex justify-content-center">
                <div class="col-12 bg-info message"></div>
            </div>

        </div>
        @if (!empty($successMessage))
            <div class="row message-container">
                <div class="col-12 bg-success message">
                    <p class="text-center alert-custom">{{ $successMessage }}</p>
                </div>
            </div>
        @endif
        @if (!empty($errorMessage))
            <div class="row message-container">
                <div class="col-12 bg-danger message">
                    <p class="text-center alert-custom">{{ $errorMessage }}</p>
                </div>
            </div>
        @endif
        <br>
        <div class="card-subtitle">
            <form class="form" id="producto_post" action="{{ route('producto.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre"
                            required>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Categoria" name="category"
                            aria-label="category" required>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="number" placeholder="Precio" name="precio" aria-label="precio"
                            required>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <select name="proveedor" class="form-control" id="proveedor" required>
                            <option value="">Selecciona un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->_id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <textarea name="descripcion" id="descripcion" cols="50" rows="5" placeholder="Descripción" required></textarea>
                    </div>
                </div>
                <br>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Agregar producto">
            </form>
        </div>
    </div>

@endsection
