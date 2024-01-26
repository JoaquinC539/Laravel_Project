@extends('layouts.app')

@section('title', 'Vendedor create')

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
                <a href="/vendedor" class="btn btn-primary" type="button">Ir a pagina principal</a>
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
            <form class="form" id="vendedores_post" action="{{ route('vendedor.store') }}" method="POST">
                @method('POST')
                <div class="row">
                    <div class="col-6 col-md-4 form-box">
                        @csrf
                        <input class="form-control " type="text" placeholder="Nombre" name="nombre" aria-label="nombre"
                            required>
                    </div>
                    <div class="col-6 col-md-4 form-box">
                        @csrf
                        <input class="form-control " type="text" placeholder="Apellido" name="apellido"
                            aria-label="apellido" required>
                    </div>
                    <div class="col-6 col-md-4 form-box">
                        @csrf
                        <input class="form-control " type="number" placeholder="Edad" name="edad" aria-label="edad"
                            required>
                    </div>
                    <div class="col-6 col-md-4 form-box">
                        @csrf
                        <input class="form-control " type="email" placeholder="Email" name="correo_electronico"
                            aria-label="email" required>
                    </div>
                </div>

                <br>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Agregar vendedor">
            </form>
        </div>


    </div>







@endsection
