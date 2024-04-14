@extends('backend.layouts.master')

@section('backend-title', 'Pharmacies List')

@section('page-specific-css')
    <!-- Additional CSS specific to this page -->
@endsection

@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pharmacies <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{ route('pharmacies.index') }}">Pharmacies</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Search form -->
            <div class="form-group row">
                <div class="box-body col-md-3">
                    <form action="{{ route('pharmacies.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="PharmacySearch" class="form-control" placeholder="Search pharmacies...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('pharmacies.create') }}"><i class="fa fa-plus"></i>&nbsp;Add Pharmacies</a></h3>
                </div>
                <div class="box-body">
                    @include('backend.pharmacies.partials.list')
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
