@extends('backend.layouts.master')
@section('backend-title', 'My Records')
@section('page-specific-css')
    <!-- Add any page-specific CSS here -->
@endsection
@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Records <small>List</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="GET" action="{{ route('records.userindex') }}" class="form-inline justify-content-end">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sn</th>
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
                                <td>{{ $record->appointment->timing->doctor->user->name }}</td>
                                <td>{{ $record->appointment->date }}({{ $record->appointment->timing->day }})</td>
                                <td>Shift {{ $record->appointment->timing->shift }} ({{ date('h:i A', strtotime($record->appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($record->appointment->timing->end_time)) }})</td>
                                <td>{{ $record->appointment->location }}</td>
                                <td>{{ $record->appointment->status }}</td>
                                <td><!-- Show button -->
                                    <a href="{{ route('records.usershow', ['record' => $record->id]) }}" class="btn btn-primary btn-xs" title="View Appointment">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
