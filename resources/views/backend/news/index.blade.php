@extends('backend.layouts.master')
@section('backend-title', 'New List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                New <small>List</small>

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box no-padding">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('news.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add New</a></h3>
                </div>
                <div class="box-body">
                    @include('backend.news.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
