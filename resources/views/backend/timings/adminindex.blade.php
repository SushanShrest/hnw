@extends('backend.layouts.master')
@section('backend-title', 'Timings List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Timings <small>List</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{ route('timings.adminindex') }}">Timings</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Search form -->
            <div class="form-group row">
                <div class="box-body col-md-3">
                    <form action="{{ route('timings.adminindex') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="timingSearch" class="form-control" placeholder="Search timings...">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Day</th>
                                <th>Shift</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Location</th>
                                <th>Visit Fee</th>
                                <th>Doctor ID</th>
                                <th>Doctor Name</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($timings as $timing)
                            <tr>
                                <td>{{ (($timings->currentPage() - 1) * $timings->perPage()) + $loop->iteration }}</td>
                                <td>{{ $timing->day }}</td>
                                <td>{{ $timing->shift }}</td>
                                <td>{{ date('h:i A', strtotime($timing->start_time)) }}</td>
                                <td>{{ date('h:i A', strtotime($timing->end_time)) }}</td>
                                <td>{{ $timing->location }}</td>
                                <td>{{ $timing->visit_fee }}</td>
                                <td>{{ $timing->doctor->id }}</td>
                                <td>{{ $timing->doctor->user->name }}</td>
                                <td>                       
                                    {{-- <a href="{{ route('timings.edit', $timing) }}" class="btn btn-info btn-xs"> <i
                                            class="fa fa-pencil"></i></a> --}}
                        
                                    {{-- @include('backend.partials.delete_modal', [
                                        'id' => $timing->id,
                                        'title' => $timing->day,
                                        'route' => route('timings.destroy', $timing),
                                    ]) --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ ($timings->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $timings->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $timings->lastPage(); $i++)
                                <li class="page-item {{ ($timings->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $timings->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ ($timings->currentPage() == $timings->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $timings->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>            
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
