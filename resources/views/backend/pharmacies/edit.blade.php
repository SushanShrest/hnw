@extends('backend.layouts.master')
@section('backend-title', 'Edit Pharmacies')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Pharmacies

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('pharmacies.index') }}">Pharmacies</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <h3 class="box-title"> Edit Pharmacies</h3>

                </div>
                <form action="{{ route('pharmacies.update', $pharmacy) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.pharmacies.partials.form')

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary submit">Update</button>
                    </div>
                </form>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('page-specific-js')

@endsection
