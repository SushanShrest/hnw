@extends('backend.layouts.master')
@section('backend-title', 'Department List')
@section('page-specific-css')
@endsection
@section('backend-content')

    <style>
        .box {
            display: grid;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-image img {
            max-width: 100px;
            height: 200px;
            border-radius: 5px;
        }

        .card-description {
            margin-top: 10px;
        }

        .card-btn {
            margin-top: 15px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Department <small>Display</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><a href="{{ route('departments.display') }}">Departments</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); background-color: rgb(233, 231, 231); margin: 10px; border-radius: 10px; place-items: center; gap: 20px;">
            @if ($departments->isNotEmpty())
                @foreach ($departments as $department)
                    <div style="width: 100%; max-width: 350px; margin: 10px;">
                        <div style="height: 420px; background-color: #598; padding: 15px; border: 1px solid #ccc; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="font-size: 2rem; color: #ffffff; font-weight: bold; margin-bottom: 10px;">
                                {{ $department->code }} : {{ $department->department_name }}
                            </div>
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('uploads/departments/' . $department->file) }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 5px;" alt="{{ $department->department_name }}">
                            </div>
                            <div style="font-size: 1.3rem; color: #ffffff; margin-bottom: auto;font-weight: normal;">
                                {{ $department->description }}
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="btn btn-primary">View Doctors</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div style="width: 100%; max-width: 350px; margin: 10px;">
                <div class="alert alert-danger" style="padding: 20px; border-radius: 5px; text-align: center;">
                    <strong>No departments available.</strong>
                </div>
            </div>
            @endif
        </section>
        
        
        



        <!-- /.content -->
    </div>
@endsection
