@extends('layouts.app')

@section('title', 'User register')

@section('content')

    <title>Register</title>

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            <b class="sub-title">Registrar Usuario</b>
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
            <form class="form" id="register" action="{{ route('register') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="text" placeholder="Nombre" name="nombre" aria-label="nombre"
                            required>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="text" placeholder="Username" name="username"
                            aria-label="username" required>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="password" placeholder="Password" name="password"
                            aria-label="password" required>
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <select name="vendedor" class="form-control select2" id="vendedor" required>
                            <option value="">Selecciona un vendedor</option>
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor->_id }}" style="color: black">{{ $vendedor->nombre }} {{ $vendedor->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <br>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Registrar">
            </form>
        </div>
    </div>

@endsection
