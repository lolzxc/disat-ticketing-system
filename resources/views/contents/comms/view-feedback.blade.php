@extends('layouts.app')

@section('stylesheet')

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
    <div class="container-sm">


        <div class="row">
            <div class="col title-main">
                <p class="border-bottom border-white fw-bold border-1 text-center p-5 fw-bold d-flex flex-column align-items-center">Feedback Details</p>
            </div>
        </div>

        <div class="d-grid gap-3 input">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 fw-bold d-flex flex-column align-items-center">Ticket Number</p>
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
                        <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Feedback Created</p>
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control details" value="{{ $feedback->created_at->format('F j Y, g:i a') }}" readonly>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Feedback Resolved</p>
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control details" value="{{ $feedback->updated_at->format('F j Y, g:i a') }}" readonly>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">School Contact Person</p>
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control details" value="{{ $owner->name }}" readonly>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 fw-bold d-flex flex-column align-items-center">School</p>
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control details" value="{{ $owner->school }}" readonly>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 fw-bold d-flex flex-column align-items-center">Level/Year</p>
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control details" value="" readonly>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mb-2 d-flex justify-content-center align-items-center text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 fw-bold d-flex flex-column align-items-center">Section</p>
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control details" value="" readonly>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row mb-2 d-flex justify-content-center  text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Feedback</p>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <textarea type="text" class="form-control details" readonly rows="5">{{ $feedback->message }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if($triage != null)
    <div class="container">
        <div class="container justify-content-center align-items-center text-center">
            <div class="row ">
                <div class="col title-faq">
                    <p class="border-bottom border-white border-1 text-center p-5 d-flex flex-column align-items-center fw-bold">Triage Details</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-2 d-flex justify-content-center  text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Assessment</p>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control details" readonly rows="5">{{ $triage->assessment }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-2 d-flex justify-content-center  text-center">
                <div class="col-4">
                    <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Solution</p>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <textarea type="text" class="form-control details" readonly rows="5">{{ $triage->solution }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($tse != null)
        <div class="container">
            <div class="container justify-content-center align-items-center text-center">
                <div class="row ">
                    <div class="col title-faq">
                        <p class="border-bottom border-white border-1 text-center p-5 d-flex flex-column align-items-center fw-bold">FAQ's Basic / Troubleshooting Guide</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mb-2 d-flex justify-content-center  text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Actions Done</p>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <textarea type="text" class="form-control details" readonly rows="5">{{ $tse->actions_done }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mb-2 d-flex justify-content-center  text-center">
                    <div class="col-4">
                        <p class="mt-1 mb-0 d-flex flex-column align-items-center fw-bold">Remarks</p>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <textarea type="text" class="form-control details" readonly rows="5">{{ $tse->remarks }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="{{ route('update-feedback') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $feedback->id }}">
                    <div class="row d-flex justify-content-center align-items-center text-center">
                        <div class="col-4">
                            <p class="mb-0 fw-bold">Status</p>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select class="form-control details" name="status" id="exampleFormControlSelect1">
                                    <option value="#">{{ $feedback->status }}</option>
                                    <option value="#">PENDING</option>
                                    <option value="#">IN PROGRESS</option>

                                    <option value="CONFIRMED OK">CONFIRMED OK</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 pb-2 mb-1">
                        <div class="col text-center flex-grow-1 align-item-end">
                            <input class="btn btn-light w-100 btn-lg text-center text-primary fw-bold details" type="submit" value="Submit" id="submit_button"></button>
                        </div>

                    </div>
                </form>
            </div>

            <div class="container mb-2">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary w-100 details text-light" href=" {{ route('generate-pdf', [$feedback->id]) }}" role="button">Download PDF</a>

                    </div>
                </div>
            </div>

        </div>


        @endif


        @endsection