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
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="border-bottom border-white border-1 text-center p-5 d-flex flex-column align-items-center title-main ">Feedback Details</p>
            </div>
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

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Ticket Number</p>
                </div>

                <div class="col-8">
                    <input type="text" class="form-control details" value="{{ $feedback->id }}" readonly>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">System</p>
                </div>

                <div class="col-8">
                    <input type="text" class="form-control details" value="{{ $feedback->system }}" readonly>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Module</p>
                </div>

                <div class="col-8">
                    <input type="text" class="form-control details" value="{{ $feedback->module }}" readonly>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center ">
                <div class="col-4">
                    <p class=" mb-0 d-flex flex-column align-items-center text-center fw-bold">Screen Shot</p>
                </div>

                <div class="col-8">
                    <img src="{{ asset('images/'.$feedback->screen_shot) }}">
                </div>
            </div>
        </div>

        @if(!empty($triage))

        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="border-bottom border-white border-1 text-center p-5 d-flex flex-column align-items-center title-main ">Triage Details</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Chief Complain</p>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control details" readonly rows="5">{{ $feedback->message }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Assessment</p>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control details" readonly rows="5">{{ $triage->assessment }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Solution</p>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control details" readonly rows="5">{{ $triage->solution }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="border-bottom border-white border-1 text-center p-5 d-flex flex-column align-items-center title-main ">Tech Support Form</p>
                </div>
            </div>
        </div>
        <form action="{{ route('create_tseform') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
            <input type="hidden" name="triage_id" value="{{ $triage->id }}">
            <input type="hidden" name="tse_id" value="{{ $user->id }}">
            <div class="container d-grid gap-3">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-4">
                            <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Actions Done</p>
                        </div>

                        <div class="col-8 text-center">
                            <div class="form-group">
                                <textarea class="form-control details" name="actions_done" id="exampleFormControlTextarea1" rows="5" placeholder="Please fill up..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-4">
                            <p class="mt-1 mb-0 d-flex flex-column align-items-center text-center fw-bold">Remarks</p>
                        </div>

                        <div class="col-8 text-center">
                            <div class="form-group">
                                <textarea class="form-control details" name="remarks" id="exampleFormControlTextarea1" rows="5" placeholder="Please fill up..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center text-center">
                        <div class="col-4">
                            <p class="mt-1 mb-0 fw-bold">Status</p>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select class="form-control details" name="status" id="exampleFormControlSelect1">
                                    <option value="DONE">DONE</option>
                                    <option value="CONFIRMED OK">CONFIRMED OK</option>
                                    <option value="ON HOLD">ON HOLD</option>
                                    <option value="URGENT">URGENT</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                    <option value="ON QUE">ON QUE</option>
                                    <option value="IN PROGRESS">IN PROGRESS</option>
                                    <option value="FOR CONFIRMATION">FOR CONFIRMATION</option>
                                    <option value="FOR UPDATE">FOR UPDATE</option>
                                    <option value="FOR DEV">FOR DEV</option>
                                    <option value="RESCHED ON">RESCHED ON</option>
                                    <option value="ATS">ATS</option>
                                    <option value="FOR DEPLOYMENT">FOR DEPLOYMENT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mb-2">
                    <div class="row">
                        <div class="col text-center flex-grow-1 align-item-end">
                            <input class="btn btn-light w-100 btn-lg text-center text-primary fw-bold" type="submit" value="Submit" id="submit_button"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @endsection