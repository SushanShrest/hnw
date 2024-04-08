@extends('backend.layouts.master')
@section('backend-title', 'ViewDoctor List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ViewDoctor <small>{{ $department->department_name }}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">               
                <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('departments.display') }}"><i
                            class="fa fa-arrow-left"></i>
                        &nbsp;Back</a></h3>               
            </div>
            <!-- Doctor cards -->
            <div class="row">
                @foreach ($doctors as $doctor)
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row">
                                <!-- Doctor image -->
                                <div class="col-md-4 text-center">
                                    @if($doctor->user->image)
                                        <img src="{{ asset('uploads/profile/' . $doctor->user->image) }}" alt="{{ $doctor->user->name }}" class="img-thumbnail profile-image" style="width: 200px; height: 200px;">
                                    @else
                                        <img src="{{ asset('backend/images/dummy_user.png') }}" alt="Dummy Image" class="img-thumbnail profile-image" style="width: 200px; height: 200px;">
                                    @endif
                                </div>
                                <!-- Doctor details -->
                                <div class="col-md-8">
                                    <h3><b>{{ $doctor->user->name }}</b></h3>
                                    <p><strong>Specialization:</strong> {{ $doctor->specialization ?: 'N/A' }}</p>
                                    <p><strong>Qualification:</strong> {{ $doctor->qualification ?: 'N/A' }}</p>
                                    <p><strong>Workplace:</strong> {{ $doctor->work_places ?: 'N/A' }}</p>
                                    <p><strong>Experience:</strong> {{ $doctor->experience ?: 'N/A' }} years</p>
                                    <!-- Buttons -->
                                    <div class="text-right">
                                        <a href="{{ route('appointments.doctorbio', $doctor) }}" class="btn btn-primary">Read More</a>
                                        <a href="{{ route('appointments.create', $doctor) }}" class="btn btn-success">Book Appointment</a>
                                        {{-- <a href="{{ route('appointments.create', $doctor->id) }}" class="btn btn-success">Book Appointment</a> --}}
                                    </div>                                    
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
