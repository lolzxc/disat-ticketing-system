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
            <form class="d-flex mx-auto" role="search" action="{{ route('search') }}" method="GET">
                <input class="form-control form-control-lg me-2" type="search" placeholder="Search by ID" aria-label="Search" name="id">
                <input class="btn btn-outline-success" type="submit"></button>
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
            <span class="title mb-1 text-center title-main">Feedbacks Issued</span>
        </div>
    </div>

    <div class="list-group">
        <div class="container mt-1">

            @foreach ($filtered_feedbacks as $filtered_feedback)
            <a href="{{ route('view-feedback', [$filtered_feedback->user_id, $filtered_feedback->id]) }}" class="list-group-item list-group-item-action" aria-current="true">
                <div class="header d-flex flex-column justify-content-center align-items-start text-center">
                    <small>{{ date('F j Y', strtotime($filtered_feedback->updated_at)) }}</small>
                    <small>Ticket Number: {{ $filtered_feedback->id }}</small>
                </div>
                <h2 class="my-1 fw-bold">{{ $filtered_feedback->message }}</h2>
                <small class="border rounded-pill mt-1 p-1 border-primary d-inline-block">{{ $filtered_feedback->system }}</small>
                <small class="border rounded-pill mt-1 p-1 border-primary d-inline-block">{{ $filtered_feedback->module }}</small>
                <br>
                @if($filtered_feedback->status == 'open' || $filtered_feedback->status == 'OPEN')
                <small class="border rounded-pill mt-1 p-1 text-center d-inline-block text-white fw-bold"style="background-color:blue; color:white;">{{ $filtered_feedback->status }}</small>
                @elseif($filtered_feedback->status == 'PENDING')
                <small class="border rounded-pill mt-1 p-1 text-center d-inline-block text-white fw-bold" style="background-color:red; color:white">{{ $filtered_feedback->status }}</small>
                @endif
                
            </a>
            @endforeach
        </div>
    </div>

    <div style="display: flex; margin-top: 20px; justify-content:center">
        {{ $feedbacks->links() }}
    </div>
</div>


@endsection