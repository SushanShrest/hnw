@extends('backend.layouts.master')
@section('backend-title', 'Edit User')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit User
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">                 
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('users.index') }}"><i
                                class="fa fa-arrow-left"></i>
                            &nbsp;Back</a></h3>           
                </div>
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.users.partials.form')
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
