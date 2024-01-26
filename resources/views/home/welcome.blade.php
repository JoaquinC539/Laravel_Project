@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            <h1>Laravel Project</h1>
        </div>
        <div class="card-body mb-2 text-body-secondary text-center">
            <p>This a project focused of using laravel where:</p>
            <p>Laravel is a web application framework with expressive, elegant syntax for creating full-stack applications.
                Laravel have promoted the following features:</p>
            <ul>
                <li class="list-group-item">Simple, fast routing engine.</li>
                <li class="list-group-item">Powerful dependency injection container.</li>
                <li class="list-group-item">Multiple back-ends for session and cache storage.</li>
                <li class="list-group-item">Expressive, intuitive database ORM.</li>
                <li class="list-group-item">Database agnostic schema migrations.</li>
            </ul>
            <p>
            <h2>Routes to the other dummy models: </h2>
            </p>
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand navbar-link" href="{{ route('vendedor.index') }}">Vendedores</a>
                    <a class="navbar-brand navbar-link" href="{{ route('proveedor.index') }}">Proveedores</a>
                    <a class="navbar-brand navbar-link" href="{{ route('producto.index') }}">Productos</a>
                    <a class="navbar-brand navbar-link" href="{{ route('register') }}">Register</a>
                </div>
            </nav>
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand navbar-link" href="{{ route('login') }}">Login</a>
                </div>
            </nav>
        </div>
        <br>
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

    </div>

@endsection
