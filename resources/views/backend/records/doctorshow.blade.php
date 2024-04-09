<!-- usershow.blade.php -->

@extends('backend.layouts.master')
@section('backend-title', 'View Record')
@section('page-specific-css')
@endsection
@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Record
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border">               
            <h3 class="box-title">
                <a class="btn bg-purple btn-flat" href="{{ route('records.doctorindex') }}">
                    <i class="fa fa-arrow-left"></i> &nbsp;Back
                </a>
            </h3>               
        </div>      
        @include('backend.records.partials.showform')
    </section>
    <!-- /.content -->
</div>
@endsection
