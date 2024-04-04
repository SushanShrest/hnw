@extends('backend.layouts.master')
@section('backend-title', 'Doctors List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Doctor <small>List</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('doctors.index') }}">Doctors</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @extends('backend.layouts.master')
@section('backend-title', 'Doctors List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Doctor <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('doctors.index') }}">Doctors</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                <!-- Search form -->
                <div class="form-group row">
                    <div class="box-body col-md-3">
                        <form action="{{ route('doctors.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="doctorsearch" class="form-control" placeholder="Search doctors...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                <div class="box-header with-border">
                    {{-- @can('create-category') --}}
                    {{-- <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('doctors.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add Doctors</a></h3> --}}
                    {{-- @endcan --}}
                </div>
                <div class="box-body">
                    @include('backend.doctors.partials.list')
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection


            <div class="box no-padding">
                <div class="box-header with-border">
                    {{-- @can('create-category') --}}
                    {{-- <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('doctors.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add Doctors</a></h3> --}}
                    {{-- @endcan --}}
                </div>
                <div class="box-body">
                    @include('backend.doctors.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
