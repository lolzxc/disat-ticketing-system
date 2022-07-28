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

<div class="content text-white d-flex flex-grow-1 flex-column h-100">
    <div class="container">
        <div class="header d-flex justify-content-center align-items-center pt-5 border-bottom border-white">
            <span class="fw-bold fs-1 mb-1">Feedbacks Issued</span>
        </div>

    </div>

    <div class="list-group">
        <div class="container mt-1">
            @foreach ($filtered_feedbacks as $filtered_feedback)
            <a href="{{ route('view-feedback', [$filtered_feedback->user_id, $filtered_feedback->id]) }}" class="list-group-item list-group-item-action" aria-current="true">
                <small class="text-end">{{ $filtered_feedback->updated_at->format('F j Y, g:i a') }}</small>
                <h5 class="mb-1">{{ $filtered_feedback->message }}</h5>
                <small class="border rounded-pill p-1 border-primary d-inline-block">{{ $filtered_feedback->system }}</small>
                <small class="border rounded-pill p-1 border-primary d-inline-block">{{ $filtered_feedback->module }}</small>
                <br>
                <small class="border rounded-pill mt-1 p-1 text-center d-inline-block text-white fs-5 fw-bold" style="background-color: brown">{{ $filtered_feedback->status }}</small>
            </a>
            @endforeach

        </div>
    </div>
</div>

@endsection