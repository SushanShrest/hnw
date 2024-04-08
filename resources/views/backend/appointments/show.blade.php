@extends('backend.layouts.master')
@section('backend-title', 'Appointment Detail')
@section('page-specific-css')
    <!-- Additional CSS specific to this page -->
@endsection

@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Appointment <small>Detail</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">               
                <h3 class="box-title">
                    <a class="btn bg-purple btn-flat" href="{{ route('appointments.index') }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;Back
                    </a>
                </h3>               
            </div>      
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <!-- Appointment and Timing Details -->
                        <div class="col-md-12">
                            <h3><b><u>Appointment Details</u></b></h3>
                            <br>
                            <h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Date:</b> {{ $appointment->date }}</p>  
                                </div>
                                <div class="col-md-6">
                                    <p><b>Timing:</b> {{ $appointment->timing->day}}: shift-{{ $appointment->timing->shift }} ({{ date('h:i A', strtotime($appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($appointment->timing->end_time)) }})</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Status:</b> {{ $appointment->status }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Location:</b> {{ $appointment->location }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Visit Fee:</b> {{ $appointment->timing->visit_fee }}</p>
                                </div>
                            </div>
                            </h4>
                            <h4><b>Problem:</b></h4>
                            <h5>{{ $appointment->problem }}</h5>
                            <h4><b>Problem Description:</b></h4>
                            <h5>{{ $appointment->problem_description }}</h5>
                            <h4><b>Patient Description:</b></h4>
                            <h5>{{ $appointment->patient_description }}</h5>
                            <br>
                                @if ($appointment->status != 'cancelled')
                                    <form action="{{ route('appointments.accept', $appointment->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>
                                    
                                    <form action="{{ route('appointments.reject', $appointment->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                @else
                                    {{-- No action --}}
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <!-- User Details -->
                        <div class="col-md-6">
                            <h3><b><u>User Details</u></b></h3>
                            <h4><b>Name: </b>{{ $appointment->user->name }}</h4>
                            <h4><b>Gender: </b>{{ $appointment->user->gender ?: 'N/A' }}</h4>
                            <h4><b>Location: </b>{{ $appointment->user->location ?: 'N/A' }}</h4>
                            <h4><b>Contact: </b>{{ $appointment->user->contact ?: 'N/A' }}</h4>
                        </div>
                        <!-- Doctor Details -->
                        <div class="col-md-6">
                            <h3><b><u>Doctor Details</u></b></h3>
                            <div class="col-md-6">
                                <h4><b>Name: </b>{{ $appointment->timing->doctor->user->name }}</h4>
                                <h4><b>Gender: </b>{{ $appointment->timing->doctor->user->gender ?: 'N/A' }}</h4>
                                <h4><b>Location: </b>{{ $appointment->timing->doctor->user->location ?: 'N/A' }}</h4>
                                <h4><b>Contact: </b>{{ $appointment->timing->doctor->user->contact ?: 'N/A' }}</h4>
                            </div>
                            <div class="col-md-6">
                                <h4><b>Department: </b>{{ $appointment->timing->doctor->department->department_name }}</h4>
                                <h4><b>Specialization: </b>{{ $appointment->timing->doctor->specialization ?: 'N/A' }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
