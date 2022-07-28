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
            <div class="fs-5 ms-auto">
                Hello, <span class="text-primary">{{ $user -> name }}!</span> <br>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>

    </div>
</nav>

<div class="container text-white">
    <div class="row">
        <div class="col">
            <p class="border-bottom border-white border-1 text-center p-5 fs-1 ">Feedback Details</p>
        </div>
    </div>

    <div class="d-grid gap-3">
       
        <div class="row d-flex align-items-baseline">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">Feedback ID</p>
            </div>

            <div class="col-8">
                <input type="text" class="form-control-plaintext text-light" value="{{ $feedback->id }}" readonly>
            </div>
        </div>

        <div class="row d-flex align-items-baseline">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">System</p>
            </div>

            <div class="col-8">
                <input type="text" class="form-control-plaintext text-light" value="{{ $feedback->system }}" readonly>
            </div>
        </div>

        <div class="row d-flex align-items-baseline">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Module</p>
            </div>
            <div class="col-8">
                <input type="text" class="form-control-plaintext text-light" value="{{ $feedback->module }}" readonly>
            </div>
        </div>

        <div class="row d-flex align-items-baseline">
            <div class="col-4">
                <p class="text-end">Message</p>
            </div>
            <div class="col-8 text-center text-primary">
                <div class="form-group text-primary">
                    <textarea class="form-control-plaintext text-light" name="concern" id="exampleFormControlTextarea1" rows="5" readonly>{{ $feedback->message }}</textarea>
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Actions Taken</p>
            </div>
            <div class="col-8">
                <input type="text" class="form-control-plaintext text-light" value="{{ $feedback->module }}" readonly>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Status</p>
            </div>
            <div class="col-8">
                <input type="text" class="form-control-plaintext text-light" value="{{ $feedback->status }}" readonly>
            </div>
        </div>

    </div>


    @endsection