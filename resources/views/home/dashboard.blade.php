@extends('layouts.app')

@section('title', 'Proveedores')


@section('content')

    <div class="card w-100">
        <h1>Bienvenido, {{ $user->nombre }}</h1>
        <br>
        <div>
            <form class="form" id="register" action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <div class="d-flex justify-content-center">
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Logout" style="width: 5em">
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            
        </script>
    @endpush


@endsection
