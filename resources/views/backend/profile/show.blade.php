@extends('backend.layouts.master')
@section('backend-title', 'Profile')
@section('page-specific-css')
    <!-- Add any specific CSS styles here -->
@endsection

@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{ route('profile.edit') }}">Profiles</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a class="btn bg-purple btn-flat" href="{{ route('profile.edit') }}">
                            <i class="fa fa-edit"></i> Edit Profile
                        </a>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($user->image)
                                <img src="{{ asset('uploads/profile/' . $user->image) }}" alt="Profile Image" class="img-thumbnail profile-image" style="width: 400px; height: 400px;">
                            @else
                                <img src="{{ asset('backend/images/dummy_user.png') }}" alt="Dummy Image" class="img-thumbnail profile-image" style="width: 400px; height: 400px;">
                            @endif
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <p class="profile-text"><strong>Name:</strong> {{ $user->name }}</p>
                                    <p class="profile-text"><strong>Role:</strong> {{ $user->type }}</p>
                                    <p class="profile-text"><strong>Email:</strong> {{ $user->email }}</p>
                                    <p class="profile-text"><strong>Contact:</strong> {{ $user->contact ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Location:</strong> {{ $user->location ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Gender:</strong> {{ $user->gender ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Date of Birth:</strong> {{ $user->dob ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Age:</strong> {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->age : 'N/A' }}</p>

                                    @if($user->type === 'doctor')
                                    <p class="profile-text"><strong>Department:</strong> {{ $user->doctor->department->department_name ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Qualification:</strong> {{ $user->doctor->qualification ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Experience:</strong> {{ $user->doctor->experience ?? 'N/A' }} years</p>
                                    <p class="profile-text"><strong>Specialization:</strong> {{ $user->doctor->specialization ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Education:</strong> {{ $user->doctor->education ?? 'N/A' }}</p>
                                    <p class="profile-text"><strong>Work Places:</strong> {{ $user->doctor->work_places ?? 'N/A' }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
        <style>
            .profile-text {
                margin-top: 15px;
                font-size: 20px;
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </div>
@endsection
