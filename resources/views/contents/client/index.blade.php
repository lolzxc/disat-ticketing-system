@extends('layouts.app')

@section('stylesheet')
<style>
    html,
    body {
        background-color: #00A1FC;
    }
</style>
@endsection
@section('content')

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand fw-bold fs-1 text-primary" iud>DISAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav">
                <a href="{{ route('feedback-list', $user->id) }}" class="nav-link">Feedback List</a>
            </div>
            <div class="fs-5 ms-auto text-center">
                Hello, <span class="text-primary">{{ $user -> name }}!</span> <br>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>


<div class="container text-white">
    @if($success)
    <div class="alert alert-success">
        Feedback Successfully Added!
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
    <div class="row">
        <div class="col">
            <p class="border-bottom border-white border-1 text-center p-5 fs-1 ">Fill Out The Details</p>
        </div>
    </div>

    <form class="d-grid gap-3" action="{{ route('add-feedback') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="row">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">System</p>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <select class="form-control" name="system" id="exampleFormControlSelect1">
                        <option value="ACADEMICS">ACADEMICS</option>
                        <option value="REGISTRAR">REGISTRAR</option>
                        <option value="FINANCE">FINANCE</option>
                        <option value="NETWORK">NETWORK</option>
                        <option value="HARDWARE">HARDWARE</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Module</p>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <select class="form-control" name="module" id="exampleFormControlSelect1">
                        <option value="ECRS">ECRS</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <p class="text-end">Message</p>
            </div>
            <div class="col-8 text-center">
                <div class="form-group">
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Screen Shot</p>
            </div>
            <div class="col-8 text-center">
                <div class="mb-3">
                    <input class="form-control" type="file" name="screen_shot">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center flex-grow-1 align-item-end">
                <input class="btn btn-light w-25 btn-lg text-center text-primary fw-bold" type="submit" value="Submit" id="submit_button"></button>
            </div>

        </div>
    </form>

</div>



@endsection