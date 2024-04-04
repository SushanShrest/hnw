@extends('backend.layouts.master')
@section('backend-title', 'Doctor Details')
@section('page-specific-css')
@endsection
@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Doctor <small>Show</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('doctors.index') }}">Doctors</a></li>
            <li class="active">Show</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border">               
            <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('doctors.index') }}"><i
                        class="fa fa-arrow-left"></i>
                    &nbsp;Back</a></h3>               
        </div>
        <!-- Doctor Details Box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Doctor Information</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>User_Id:</strong> {{ $doctor->user->id }}</li>
                            <li class="list-group-item"><strong>Name:</strong> {{ $doctor->user->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $doctor->user->email }}</li>
                            <li class="list-group-item"><strong>Gender:</strong> {{ ucfirst($doctor->user->gender) }}</li>
                            <li class="list-group-item"><strong>Date of Birth:</strong> {{ $doctor->user->dob }}</li>
                            <li class="list-group-item"><strong>Contact:</strong> {{ $doctor->user->contact }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $doctor->user->location }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Doctor Details</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Department:</strong> {{ $doctor->department ? $doctor->department->department_name : 'N/A' }}</li>
                            <li class="list-group-item"><strong>Qualification:</strong> {{ $doctor->qualification }}</li>
                            <li class="list-group-item"><strong>Experience:</strong> {{ $doctor->experience }}</li>
                            <li class="list-group-item"><strong>Specialization:</strong> {{ $doctor->specialization }}</li>
                            <li class="list-group-item"><strong>Education:</strong> {{ $doctor->education }}</li>
                            <li class="list-group-item"><strong>Work Places:</strong> {{ $doctor->work_places }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
