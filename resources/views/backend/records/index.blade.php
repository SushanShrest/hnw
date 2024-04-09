<!-- index.blade.php -->

@extends('backend.layouts.master')
@section('backend-title', 'All Records')
@section('page-specific-css')
@endsection
@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Records <small>List</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="GET" action="{{ route('records.index') }}" class="form-inline justify-content-end">
            <div class="form-group mx-2">
                <label for="search_user" class="mr-2">Search Patient:</label>
                <input type="text" class="form-control" id="search_user" name="search_user" value="{{ $searchUser }}" placeholder="Enter user name">
            </div>
            <div class="form-group mx-2">
                <label for="search_doctor" class="mr-2">Search Doctor:</label>
                <input type="text" class="form-control" id="search_doctor" name="search_doctor" value="{{ $searchDoctor }}" placeholder="Enter doctor name">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
        <!-- Default box -->
        <div class="box no-padding">
            <div class="box-body">
                @if($records->isEmpty())
                    <p>No records at the moment.</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Patient Name</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Shift</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->appointment->user->name }}</td>
                                <td>{{ $record->appointment->timing->doctor->user->name }}</td>
                                <td>{{ $record->appointment->date }}({{ $record->appointment->timing->day }})</td>
                                <td>Shift {{ $record->appointment->timing->shift }} ({{ date('h:i A', strtotime($record->appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($record->appointment->timing->end_time)) }})</td>
                                <td>{{ $record->appointment->location }}</td>
                                <td>{{ $record->appointment->status }}</td>
                                <td>
                                    <!-- Show button -->
                                    <a href="{{ route('records.show', ['record' => $record->id]) }}" class="btn btn-primary btn-xs" title="View Appointment">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item {{ ($records->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $records->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $records->lastPage(); $i++)
                            <li class="page-item {{ ($records->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $records->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($records->currentPage() == $records->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $records->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>                
            </div>
            @endif
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
