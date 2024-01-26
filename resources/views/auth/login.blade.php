@extends('layouts.app')

@section('title', 'User register')

@section('content')

    <title>Login</title>

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            <b class="sub-title">Login</b>
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
            <form class="form" id="register" action="{{ route('login') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-12 col-md-4 form-box">
                            <input class="form-control " type="text" placeholder="Username" name="username"
                                aria-label="username" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="col-12 col-md-4 form-box">
                            <input class="form-control " type="password" placeholder="Password" name="password"
                                aria-label="password" required>
                        </div>
                    </div>
                        
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Login" style="width: 5em">
                    </div>
                    
                    </div>
                    
            </form>
        </div>
    </div>

@endsection
