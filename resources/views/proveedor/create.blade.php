@extends('layouts.app')

@section('title', 'Proveedor create')

@section('content')

<title>Proveedores</title>

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            Proveedores
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
        <br>
        <div class="card-subtitle">
            <form class="form" id="proveedor_post" action="{{route('proveedor.store')}}" method="POST" >
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre" >
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Contacto" name="contacto" aria-label="contacto" >
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Email" name="email" aria-label="email" >
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Dirección" name="direccion" aria-label="direccion" >
                    </div>
                </div>
            <br>
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Agregar Proveedor">
        </form>
        </div>
    </div>

@endsection