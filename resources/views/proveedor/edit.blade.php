@extends('layouts.app')

@section('title', 'Proveedor edit')

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
                <a href="/proveedor" class="btn btn-primary" type="button">Ir a pagina principal</a>
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
            <form class="form" id="proveedor_put" action="{{ route('proveedor.update', $proveedor->_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="ID" name="_id" aria-label="_id"
                            value="{{ $proveedor->_id }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre"
                            value="{{ $proveedor->nombre }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre"
                            value="{{ $proveedor->nombre }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Contacto" name="contacto"
                            aria-label="contacto" value="{{ $proveedor->contacto }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Email" name="email" aria-label="email"
                            value="{{ $proveedor->email }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Dirección" name="direccion"
                            aria-label="direccion" value="{{ $proveedor->direccion }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <select class="form-select" placeholder="Activo" name="activo" aria-label="activo">
                            <option value="true" {{ $proveedor->activo ? 'selected' : '' }}>Activo</option>
                            <option value="false" {{ !$proveedor->activo ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>
                <br>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Actualizar proveedor">
            </form>
        </div>
    </div>

@endsection
