@extends('backend.layouts.master')

@section('backend-title', 'Message Details')

@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Message Details <small>View</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a class="btn bg-purple btn-flat" href="{{ route('messages.index') }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;Back
                    </a>
                </h3>
            </div>
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">User ID</label>
                                <input type="text" value="{{ $message->user_id }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date Created</label>
                                <input type="text" value="{{ $message->created_at->format('Y-m-d H:i:s') }}" class="form-control" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <input type="text" value="{{ $message->title }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Message Content</label>
                                <textarea class="form-control" readonly>{{ $message->message }}</textarea>
                            </div>
                            <div class="form-group">
                                <label the="control-label">Reply</label>
                                <textarea class="form-control" readonly>{{ $message->reply }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">User Name</label>
                                <input type="text" value="{{ $message->user->name ?? 'N/A' }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <input type="text" value="{{ $message->status }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden;">
                                    @if($message->image)
                                        <img src="{{ asset('uploads/messages/' . $message->image) }}" alt="Message Image" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                    <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                        <span>No image added</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if($message->image)
                                <a href="{{ asset('uploads/messages/' . $message->image) }}" class="btn btn-primary" download>
                                    <i class="fa fa-download"></i> Download Image
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
