@extends('backend.layouts.master')
@section('backend-title', 'MY Message List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                MY Message <small>List</small>

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('messages.userindex') }}" method="GET" class="form-inline justify-content-end">
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
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('messages.create') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add Message</a></h3>
                </div>
                <div class="box-body">
                    {{-- here --}}
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">S.N</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $message)
                                <tr>
                                    <td>{{ (($messages->currentPage() - 1) * $messages->perPage()) + $loop->iteration }}</td>
                                    <td>{{ $message->created_at->format('Y-M-d') }}</td>
                                    <td>{{ $message->title }}</td>
                                    <td>{{ $message->status }}</td>
                                    <td>
                                        <a href="{{ route('messages.usershow', $message) }}" class="btn btn-info btn-xs">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No messages found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <nav aria-label="Message navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ ($messages->currentPage() == 1) ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $messages->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $messages->lastPage(); $i++)
                                <li class="page-item {{ ($messages->currentPage() == $i) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $messages->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ ($messages->currentPage() == $messages->lastPage()) ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $messages->nextPageUrl() }}" aria-label="Next">
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
