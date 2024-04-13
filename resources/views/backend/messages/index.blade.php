@extends('backend.layouts.master')
@section('backend-title', 'Message List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Message <small>List</small>

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('messages.index') }}" method="GET" class="form-inline justify-content-end">
                <div class="form-group">
                    <label for="user">User:</label>
                    <input type="text" name="user" id="user" class="form-control mx-sm-2" placeholder="Search by user name" value="{{ request('user') }}">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control mx-sm-2">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>            
            <br>
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    @include('backend.messages.partials.list')
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
