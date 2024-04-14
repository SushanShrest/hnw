@extends('backend.layouts.master')
@section('backend-title', 'BecomeDoctor List')
@section('page-specific-css')
@endsection
@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            BecomeDoctor <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('becomedoctors.index') }}">BecomeDoctors</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box no-padding">
            {{-- Search form --}}
            <div class="form-group row">
                <div class="box-body col-md-3">
                    <form action="{{ route('becomedoctors.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search becomedoctors...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="box-body col-md-3">
                    <form action="{{ route('becomedoctors.index') }}" method="GET">
                        <div class="input-group">
                            <select name="status" class="form-control">
                                <option value="pending">Pending</option>
                                <option value="accepted">Accepted</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            {{-- End search form --}}
            <div class="box-body">
                @include('backend.becomedoctors.partials.list')
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
