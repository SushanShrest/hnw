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

            <!-- Search form -->
            <div class="form-group row">
                <div class="box-body col-md-3">
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="userSearch" class="form-control" placeholder="Search users...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-body">
                    @include('backend.users.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
