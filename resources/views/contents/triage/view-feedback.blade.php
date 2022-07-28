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
            <div class="fs-5 ms-auto">
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
       
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
                <p class="text-end mt-1 mb-0">Screen Shot</p>
            </div>
            <div class="col-8">
                <img src="{{ asset('images/'.$feedback->screen_shot) }}" width="300px" height="200px">

            </div>
        </div>
        @if(!empty($triage))
        <div class="row">
            <div class="col">
                <p class="border-bottom border-white border-1 text-center p-5 fs-1 ">Previous Triage Details</p>
            </div>
        </div>

        <div class="row d-flex align-items-baseline">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">Assessment</p>
            </div>

            <div class="col-8">
            <textarea class="form-control-plaintext text-light" name="concern" id="exampleFormControlTextarea1" rows="5" readonly>{{ $triage->assessment }}</textarea>
            </div>
        </div>

        <div class="row d-flex align-items-baseline">
            <div class="col-4 text-center">
                <p class="text-end mt-1 mb-0">Solution</p>
            </div>

            <div class="col-8">
            <textarea class="form-control-plaintext text-light" name="concern" id="exampleFormControlTextarea1" rows="5" readonly>{{ $triage->solution }}</textarea>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-4">
                <p class="text-end mt-1 mb-0">Screen Shot</p>
            </div>
            <div class="col-8">
                <img src="{{ asset('images/'.$triage->screen_shot) }}" width="300px" height="200px">

            </div>
        </div>

        <div class="row d-flex align-items-baseline">
            <div class="col-4">
                <p class="text-end">Assigned To</p>
            </div>
            <div class="col-8 text-center text-primary">
                <div class="form-group text-primary">
                <input type="text" class="form-control-plaintext text-light" value="{{ $triage->assigned_to }}" readonly>
                </div>
            </div>
        </div>
        @endif
        
        @if(empty($triage))
        <div class="row">
            <div class="col">
                <p class="border-bottom border-white border-1 text-center p-5 fs-1 ">Create Triage Form</p>
            </div>
        </div>

        <form action="{{ route('create-triage') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
            <input type="hidden" name="triage_engr_id" value="{{ $user->id }}">
            <div class="row mb-3">
                <div class="col-4">
                    <p class="text-end">Assessment</p>
                </div>
                <div class="col-8 text-center">
                    <div class="form-group">
                        <textarea class="form-control" name="assessment" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <p class="text-end">Solution</p>
                </div>
                <div class="col-8 text-center">
                    <div class="form-group">
                        <textarea class="form-control" name="solution" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <p class="text-end mt-1 mb-0">Screen Shot</p>
                </div>
                <div class="col-8 text-center">
                    <div class="">
                        <input class="form-control" type="file" name="screen_shot">
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row mb-3">
                <div class="col-4 text-center">
                    <p class="text-end mt-1 mb-0">Assign To</p>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <select class="form-control" name="assigned_to" id="exampleFormControlSelect1">
                            @foreach($tses as $tse)
                            <option value="{{ $tse->name }}">{{ $tse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center flex-grow-1 align-item-end">
                    <input class="btn btn-light w-25 btn-lg text-center text-primary fw-bold" type="submit" value="Submit" id="submit_button"></button>
                </div>
            </div>


        </form>
        @endif
        

    </div>


    @endsection