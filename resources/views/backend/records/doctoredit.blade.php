@extends('backend.layouts.master')
@section('backend-title', 'Edit Record')
@section('page-specific-css')
    <!-- Add your page-specific CSS here -->
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit Record</h1>
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
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <form action="{{ route('records.update', ['record' => $record->id]) }}" method="POST">
                        @csrf
                        @method('PUT')                    

                        @include('backend.records.partials.form')

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('page-specific-js')
    <!-- Add your page-specific JS here -->
@endsection
