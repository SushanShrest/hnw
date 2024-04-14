@extends('backend.layouts.master')
@section('backend-title', 'Timings List')
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
                <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{ route('timings.index') }}">Timings</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <form action="{{ route('timings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @include('backend.timings.partials.createform')
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
