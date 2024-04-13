@extends('backend.layouts.master')
@section('backend-title', 'Create Message')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Message
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <h3 class="box-title">
                <a class="btn bg-purple btn-flat" href="{{ route('messages.userindex') }}">
                    <i class="fa fa-arrow-left"></i> &nbsp;Back
                </a>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <!-- Default box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Create Message <small class="required-field">* represents required
                                    field</small>
                            </h3>
                        </div>
                        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('backend.messages.partials.form')
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('page-specific-js')

@endsection
