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
        font-size: 1.5rem;
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
                

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h1 class="text-center">Create an Account!</h2>
                <form action="{{ route('register') }}" method="POST" class="d-flex flex-column justify-content-center align-items-center login">
                    @csrf
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="name" class="form-control " placeholder="Name"><br>
                    </div>
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                        <input type="email" name="email" class="form-control " placeholder="Email"><br>
                    </div>
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="diocese" class="form-control " placeholder="Diocese"><br>
                    </div>
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="school" class="form-control " placeholder="School"><br>
                    </div>
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                        <select name="role" class="form-select">
                            <option value="selected">Please pick your account type</option>
                            <option value="client">Client</option>
                            <option value="comms">Communication Officer</option>
                            <option value="triage">Triage Officer</option>
                            <option value="tse">Technical Support Engineer</option>
                        </select>
                    </div>
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password"><br>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-success" style="font-size: 1.5rem;"></input>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection