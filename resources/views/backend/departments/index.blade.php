@extends('backend.layouts.master')
@section('backend-title', 'Department List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Department <small>List</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('departments.index') }}">Departments</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('departments.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add Department</a></h3>
                </div>
                <div class="box-body">
                    @include('backend.departments.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
