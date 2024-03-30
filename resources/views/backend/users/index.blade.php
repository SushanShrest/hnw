@extends('backend.layouts.master')
@section('backend-title', 'User List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User <small>List</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box no-padding">
                {{-- <div class="box-header with-border">                 
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('users.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add User</a></h3>           
                </div> --}}
                <div class="box-body">
                    @include('backend.users.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
