@extends('backend.layouts.master')
@section('backend-title', 'Edit Message')

@section('backend-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Message</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <h3 class="box-title">
            <a class="btn bg-purple btn-flat" href="{{ route('messages.index') }}">
                <i class="fa fa-arrow-left"></i> &nbsp;Back
            </a>
        </h3>
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Message Details</h3>
                    </div>
                    <form action="{{ route('messages.update', $message->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User ID</label>
                                        <input type="text" class="form-control" value="{{ $message->user_id }}" readonly>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" value="{{ $message->user->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" value="{{ $message->title }}" readonly>
                            </div>
                    
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" readonly>{{ $message->message }}</textarea>
                            </div>
                    
                            <div class="form-group">
                                <label>Image</label>
                                <div style="width: 200px; height: 200px; border: 1px solid #ccc; overflow: hidden;">
                                    @if($message->image)
                                        <img src="{{ asset('uploads/messages/' . $message->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                            <span>No image added</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row @error('status') has-error @enderror">
                                <div class="col-md-6">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="pending" {{ $message->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ $message->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $message->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    @error('status')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="form-group @error('reply') has-error @enderror">
                                <label>Reply</label>
                                <textarea class="form-control" name="reply" rows="5" placeholder="Enter your reply">{{ old('reply') ? old('reply') : $message->reply }}</textarea>
                                @error('reply')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
         
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
