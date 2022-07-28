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
            <form class="d-flex mx-auto" role="search">
                <input class="form-control form-control-lg me-2" type="search" placeholder="Search by ID" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="fs-5">
                Hello, <span class="text-primary">{{ $user -> name }}!</span> <br>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>

    </div>
</nav>

<div class="container">
    <div class="go-back mt-4">
        <a href="{{ url('index') }}" class="text-white" style="text-decoration: none;"><span><i class="fa-solid fa-arrow-left"></i></span> Go back to Home</a>
    </div>
</div>
<div class="container text-white">
    <div class="row">
        <div class="col">
            <p class="border-bottom border-white border-1 text-center p-5 fs-1 ">Feedback Details</p>
        </div>
    </div>

    <div class="d-grid gap-3">


        <div class="row">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">Feedback ID</p>
            </div>

            <div class="col-8">
                <input type="text" class="form-control" value="{{ $feedback->id }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">Feedback Created</p>
            </div>

            <div class="col-8">
                <input type="text" class="form-control" value="{{ $feedback->created_at->format('F j Y, g:i a') }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">School Contact Person</p>
            </div>

            <div class="col-8">
                <input type="text" class="form-control" value="{{ $owner->name }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">School</p>
            </div>

            <div class="col-8">
                <input type="text" class="form-control" value="{{ $owner->school }}" readonly>
            </div>
        </div>
        @if($tse != null)
        <div class="row">
            <div class="col">
                <p class="border-bottom border-white border-1 text-center p-5 fs-1 ">Fix Details</p>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Actions Done</p>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <textarea type="text" class="form-control" readonly rows="5">{{ $tse->actions_done }}</textarea>
                </div>
            </div>
        </div>
        <form action="{{ route('update-feedback') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $feedback->id }}">
            <div class="row">
                <div class="col-4">
                    <p class="text-end mt-1 mb-0">Status</p>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option selected>{{ $feedback->status }}</option>
                            <option value="CONFIRMED OK">CONFIRMED OK</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col text-center flex-grow-1 align-item-end">
                    <input class="btn btn-light w-25 btn-lg text-center text-primary fw-bold" type="submit" value="Submit" id="submit_button"></button>
                </div>

            </div>
        </form>

        @endif
    </div>


    @endsection