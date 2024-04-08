@extends('backend.layouts.master')
@section('backend-title', 'My appoinment')
@section('page-specific-css')
@endsection
@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            MY Appointment <small>List</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('appointments.userindex') }}" method="GET" class="form-inline justify-content-end">
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" name="doctor" id="doctor" class="form-control" value="{{ $searchDoctor ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        <br>
        <!-- Default box -->
        <div class="box no-padding">
            <div class="box-body">
                @if($userAppointments->isEmpty())
                <p>No appointments at the moment.</p>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Date</th>
                            <th>Shift</th>
                            <th>Doctor</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userAppointments as $appointment)
                        <tr>
                            <td>{{ (($userAppointments->currentPage() - 1) * $userAppointments->perPage()) + $loop->iteration }}</td>
                            <td>{{ $appointment->date }} ({{ $appointment->timing->day }})</td>
                            <td>Shift {{ $appointment->timing->shift }} ({{ date('h:i A', strtotime($appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($appointment->timing->end_time)) }})</td>
                            <td>{{ $appointment->timing->doctor->user->name }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                {{-- show --}}
                                <a href="{{ route('appointments.usershow', ['user' => $user->id, 'appointment' => $appointment->id]) }}" class="btn btn-primary btn-xs" title="View Appointment">
                                    <i class="fa fa-eye"></i>
                                </a>

                                {{-- cancel --}}
                                @if ($appointment->status != 'cancelled' && $appointment->status != 'rejected' && $appointment->status != 'completed')
                                <!-- Button to trigger modal -->
                                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirmCancel{{ $appointment->id }}">
                                    <span data-toggle="tooltip" data-placement="left" title="Cancel Appointment" class="fa fa-times" aria-hidden="true"></span>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="confirmCancel{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="Modal-{{ $appointment->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <h3 class="modal-title"><span class="fa fa-question-circle" aria-hidden="true"></span> Are you sure you want to cancel?</h3>
                                            </div>
                                            <div class="modal-body">
                                                <p>The appointment for the doctor <b>{{ $appointment->timing->doctor->user->name }}</b>'s appointment on {{ $appointment->date }} will be cancelled.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ route('appointments.cancel', $appointment->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <input value="Yes" type="submit" class="btn btn-danger" onclick="this.disabled=true;this.value='Cancelling...';this.form.submit();">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                {{-- Nothing --}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item {{ ($userAppointments->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $userAppointments->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $userAppointments->lastPage(); $i++)
                            <li class="page-item {{ ($userAppointments->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $userAppointments->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($userAppointments->currentPage() == $userAppointments->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $userAppointments->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endif
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
