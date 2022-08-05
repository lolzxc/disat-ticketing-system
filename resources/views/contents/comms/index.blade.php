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
        <div class="header d-flex justify-content-center align-items-center pt-5">
            <span class="title mb-1 text-center title-main">Feedbacks Issued</span>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-center text-center">
        <table class="data w-100">
            <tr class="">
                <th>Ticket Number</th>
                <th>School Name</th>
                <th>Nature of TS</th>
                <th>Date of Creation</th>
                <th>Status </th>
            </tr>
            @foreach($sample as $feedback)
            <tr class="border">
                <td><a href="{{ route('view-feedback', [$feedback->user_id, $feedback->id]) }}"></a>{{$feedback->id}}</td>
                <td>{{$feedback->school}}</td>
                <td>{{$feedback->system}}</td>
                <td>{{date('F j Y', strtotime($feedback->created_at))}}</td>
                @if($feedback->status == 'open' || $feedback->status == 'OPEN')
                    <td id='status' style="background-color:blue; color:white;">{{$feedback->status}}</td>
                @elseif($feedback->status == 'CONFIRMED OK' || $feedback->status == 'DONE')
                    <td id='status' style="background-color:green; color:white">{{$feedback->status}}</td>
                @elseif($feedback->status == 'IN PROGRESS')
                    <td id='status' style="background-color:yellow;">{{$feedback->status}}</td>
                @elseif($feedback->status == 'PENDING')
                    <td id='status' style="background-color:red; color:white">{{$feedback->status}}</td>
                @endif

            </tr>
            @endforeach
        </table>
    </div>
</div>



@endsection