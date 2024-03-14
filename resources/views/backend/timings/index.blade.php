@extends('backend.layouts.master')
@section('backend-title', 'Timingss List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Timings <small>List</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('timings.index') }}">Timingss</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    {{-- @can('create-category') --}}
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('timings.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add Timingss</a></h3>
                    {{-- @endcan --}}
                </div>
                <div class="box-body">
                    @include('backend.timings.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
