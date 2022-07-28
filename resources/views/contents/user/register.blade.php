@extends('layouts.app')

@section('stylesheet')
<style>
    html,
    body {
        height: 100%;
        color: white;
    }

    #screen {
        background-color: #00A1FC;
    }

    a {
        color: white;
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
                <h2 class="text-center fs-1">Create an Account!</h2>
                <form action="{{ route('register') }}" method="POST" class="d-flex flex-column justify-content-center align-items-center">
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
                    <a href="#">Forgot your password?</a><br>
                    <input type="submit" value="Submit" class="btn btn-light"></input>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection