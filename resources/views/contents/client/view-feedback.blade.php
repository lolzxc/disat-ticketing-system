@extends('layouts.app')

@section('stylesheet')
<style>
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
                <a href="{{ route('feedback-list', $user->id) }}" class="nav-link fs-5">Feedback List</a>
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
            <p class="border-bottom border-white border-1 text-center p-5 title-fill-details ">Feedback Details</p>
        </div>
    </div>

    <div class="d-grid gap-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 fw-bold">Ticket Number</p>
                </div>

                <div class="col-8">
                    <div>

                        <input type="text" class="form-control details flex-nowrap" value="{{ $feedback->id }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 fw-bold">System</p>
                </div>

                <div class="col-8">
                    <div>

                        <input type="text" class="form-control details flex-nowrap" value="{{ $feedback->system }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 fw-bold">Module</p>
                </div>

                <div class="col-8">
                    <div>

                        <input type="text" class="form-control details flex-nowrap" value="{{ $feedback->module }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 fw-bold">Message</p>
                </div>

                <div class="col-8">
                    <div class="form-group text-primary">
                        <textarea class="form-control details" name="concern" id="exampleFormControlTextarea1" rows="5" readonly>{{ $feedback->message }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 fw-bold">Actions Taken</p>
                </div>

                <div class="col-8">
                    <div>
                        <input type="text" class="form-control details flex-nowrap" value="" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center mb-2">
                <div class="col-4">
                    <p class="mt-1 mb-0 fw-bold">Status</p>
                </div>

                <div class="col-8">
                    <div>
                        <input type="text" class="form-control details flex-nowrap" value="{{ $feedback->status }}" readonly>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection