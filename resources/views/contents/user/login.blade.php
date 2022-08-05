@extends('layouts.app')

@section('stylesheet')
<style>
    html,
    body {
        height: 100%;
        color: white;
    }

    a {
        color: white;
    }
    .login {
        width: 767px;
    }
    @media only screen and (min-width:601px) and (max-width:767px) {
        .login {
            width: 600px;
        }
    }

    @media only screen and (max-width:600px) {
        .login {
            max-width: 450px;
        }
    }
    @media only screen and (max-width:450px) {
        .login {
            max-width: 400px;
        }
    }
    @media only screen and (max-width:400px) {
        .login {
            max-width: 350px;
        }
    }
    @media only screen and (max-width:350px) {
        .login {
            max-width: 300px;
        }
    }
</style>
@endsection
@section('content')

<div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100" id="screen">
    <div class="row g-0 flex-grow-1">
        <div class="col">
            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                @if($success)
                <div class="alert alert-success">
                    Successfully Registered!
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="d-flex flex-column justify-content-center align-items-center py-3 px-2 login">
                    <img src="{{ asset('images/'.'placeholder.png') }}" alt="Placeholder" style="width:50%; height:50%; margin-bottom: 5px">
                    <h1 class="text-center">Login to your Account</h2>
                    <form action="{{ route('login') }}" method="POST" class="d-flex flex-column justify-content-center w-100 align-items-center">
                        @csrf
                        <div class="input-group mb-3 mx-auto">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                            <input type="email" name="email" class="form-control " placeholder="Email"><br>
                        </div>
                        <div class="input-group mb-3 mx-auto">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password"><br>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success w-50 fw-bold fs-4"></input>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection