<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('backend-title')</title>
    <!-- Additional CSS specific to this page -->
    @yield('page-specific-css')
</head>
<body>
    @extends('backend.layouts.master')
    @section('backend-title', 'Appointment List')
    @section('page-specific-css')
        <!-- Additional CSS specific to this page -->
    @endsection

    @section('backend-content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Appointment <small>List</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <form method="GET" action="{{ route('appointments.index') }}" class="form-inline justify-content-end">
                    <div class="form-group">
                        <label for="status" class="mr-2">Filter by Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">All</option>
                            <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ $status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ $status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="completed" {{ $status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="form-group mx-2">
                        <label for="search_user" class="mr-2">Search User:</label>
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
                    @if($appointments->isEmpty())
                    <p>No appointments at the moment.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Doctor</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ (($appointments->currentPage() - 1) * $appointments->perPage()) + $loop->iteration }}</td>
                                        <td>{{ $appointment->date }} ({{ $appointment->timing->day }})</td>
                                        <td>Shift {{ $appointment->timing->shift }} ({{ date('h:i A', strtotime($appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($appointment->timing->end_time)) }})</td>
                                        <td>{{ $appointment->timing->doctor->user->name }}</td>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <td>
                                            {{-- show --}}
                                            <a href="{{ route('appointments.show', ['appointment' => $appointment->id]) }}" class="btn btn-primary btn-xs" title="View Appointment">
                                            <i class="fa fa-eye"></i>
                                            </a>

                                            {{-- cancel --}}
                                            @if ($appointment->status != 'cancelled' && $appointment->status != 'rejected' && $appointment->status != 'completed')

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
                                                                <p>The appointment for the doctor <b>{{ $appointment->timing->doctor->user->name }}</b>'s and user <b>{{ $appointment->user->name }}</b>'s  appointment on {{ $appointment->date }} will be cancelled.</p>
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
                                <li class="page-item {{ ($appointments->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $appointments->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $appointments->lastPage(); $i++)
                                    <li class="page-item {{ ($appointments->currentPage() == $i) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $appointments->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ ($appointments->currentPage() == $appointments->lastPage()) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $appointments->nextPageUrl() }}" aria-label="Next">
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
</body>
</html>
