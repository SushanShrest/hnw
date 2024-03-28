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
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
                                <img src="{{ asset('uploads/profile/' . $user->image) }}" alt="Profile Image" class="img-thumbnail profile-image" style="width: 300px; height: 300px;">
                            @else
                                <img src="{{ asset('backend/images/dummy_user.png') }}" alt="Dummy Image" class="img-thumbnail profile-image" style="width: 300px; height: 300px;">
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
                                    <!-- Add more profile fields here as needed -->
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
