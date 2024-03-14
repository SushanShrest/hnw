@extends('backend.layouts.master')
@section('backend-title', 'Create Doctors')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Doctors
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('doctors.index') }}">Doctorss</a></li>
                <li class="active">Create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->

                    <!-- Default box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Create Doctors <small class="required-field">* represents required
                                    field</small>
                            </h3>
                        </div>
                        <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('backend.doctors.partials.form')
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('page-specific-js')

@endsection
