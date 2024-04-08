@extends('backend.layouts.master')
@section('backend-title', 'Doctor Appointments')
@section('page-specific-css')
    <!-- Additional CSS specific to this page -->
@endsection

@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Doctor Appointments<small>List</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('appointments.doctorindex') }}" method="GET" class="form-inline justify-content-end">
                <div class="form-group">
                    <label for="status" class="mr-2">Status:</label>
                    <select name="status" class="form-control" id="status" class="form-control">
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="user">User:</label>
                    <input type="text" name="user" id="user" class="form-control" value="{{ $searchUser ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <br>
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    @if($doctorAppointments->isEmpty())
                        <p>No appointments found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Date</th>
                                        <th>Shift</th>
                                        <th>Patient Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($doctorAppointments as $appointment)
                                        <tr>
                                            <td>{{ (($doctorAppointments->currentPage() - 1) * $doctorAppointments->perPage()) + $loop->iteration }}</td>
                                            <td>{{ $appointment->date }} ({{ $appointment->timing->day }})</td>
                                            <td>Shift {{ $appointment->timing->shift }} ({{ date('h:i A', strtotime($appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($appointment->timing->end_time)) }})</td>
                                            <td>{{ $appointment->user->name }}</td>
                                            <td>{{ $appointment->status }}</td>
                                            <td>
                                                <a href="{{ route('appointments.doctorshow', ['doctor' => $doctor->id, 'appointment' => $appointment->id]) }}" class="btn btn-primary btn-xs" title="View Appointment">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                @if ($appointment->status != 'cancelled' && $appointment->status != 'rejected' && $appointment->status != 'completed')
                                                    <!-- Button to trigger cancel modal -->
                                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirmCancel{{ $appointment->id }}">
                                                        <span data-toggle="tooltip" data-placement="left" title="Cancel Appointment" class="fa fa-times" aria-hidden="true"></span>
                                                    </a>
                                                    <!-- Cancel Modal -->
                                                    <div class="modal fade" id="confirmCancel{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="Modal-{{ $appointment->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal-danger">
                                                                    <h3 class="modal-title"><span class="fa fa-question-circle" aria-hidden="true"></span> Are you sure you want to cancel?</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>The appointment for the user <b>{{ $appointment->user->name }}</b>'s appointment on {{ $appointment->date }} will be cancelled.</p>
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
                                                {{-- completed --}}
                                                @if ($appointment->status == 'accepted')
                                                    <!-- Button to trigger complete modal -->
                                                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#confirmComplete{{ $appointment->id }}" title="Complete Appointment">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <!-- Complete Modal -->
                                                    <div class="modal fade" id="confirmComplete{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="Modal-{{ $appointment->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal-success">
                                                                    <h3 class="modal-title"><span class="fa fa-check-circle" aria-hidden="true"></span> Complete Appointment?</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to mark the appointment for the user <b>{{ $appointment->user->name }}</b>'s appointment on {{ $appointment->date }} as completed? You cannot change it back!!</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('appointments.complete', $appointment->id) }}" method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-success">Yes</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item {{ ($doctorAppointments->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $doctorAppointments->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $doctorAppointments->lastPage(); $i++)
                                        <li class="page-item {{ ($doctorAppointments->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $doctorAppointments->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ ($doctorAppointments->currentPage() == $doctorAppointments->lastPage()) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $doctorAppointments->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
