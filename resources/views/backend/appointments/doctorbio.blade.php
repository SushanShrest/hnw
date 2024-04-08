@extends('backend.layouts.master')
@section('backend-title', 'Doctor Bio')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Doctor Bio
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">               
                <h3 class="box-title">
                    <a class="btn bg-purple btn-flat" href="{{ route('appointments.viewdoctor', $doctor->department) }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;Back
                    </a>
                </h3>               
            </div>            
            <div class="row">
                <div class="col-md-4">
                    @if($doctor->user->image)
                        <img src="{{ asset('uploads/profile/' . $doctor->user->image) }}" alt="{{ $doctor->user->name }}" class="img-thumbnail profile-image" style="width: 300px; height: 300px;">
                    @else
                        <img src="{{ asset('backend/images/dummy_user.png') }}" alt="Dummy Image" class="img-thumbnail profile-image" style="width: 300px; height: 300px;">
                    @endif
                </div>
                <!-- Doctor details -->
                <div class="col-md-8">
                    <h3><b>{{ $doctor->user->name }}</b></h3>
                    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                    <p><strong>Department:</strong> {{ $doctor->department->department_name }}</p>
                    <p><strong>Gender:</strong> {{ $doctor->user->gender }}</p>
                    <p><strong>Qualification:</strong> {{ $doctor->qualification ?: 'N/A' }}</p>
                    <p><strong>Location:</strong> {{ $doctor->user->location ?: 'N/A' }}</p>
                    <p><strong>Workplace:</strong> {{ $doctor->work_places ?: 'N/A' }}</p>
                    <p><strong>Experience:</strong> {{ $doctor->experience ?: 'N/A' }} years</p>
                </div>
            </div>

            <!-- Timings -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Timings</h3>
                    @if ($doctor->timings->isNotEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Shift</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Location</th>
                                    <th>Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctor->timings as $timing)
                                    <tr>
                                        <td>{{ $timing->day }}</td>
                                        <td>{{ $timing->shift }}</td>
                                        <td>{{ date('h:i A', strtotime($timing->start_time)) }}</td>
                                        <td>{{ date('h:i A', strtotime($timing->end_time)) }}</td>
                                        <td>{{ $timing->location ?: 'N/A' }}</td>
                                        <td>{{ $timing->visit_fee ?: 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No timing available.</p>
                    @endif
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
