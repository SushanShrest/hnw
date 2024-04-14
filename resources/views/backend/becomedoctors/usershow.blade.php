@extends('backend.layouts.master')
@section('backend-title', 'BecomeDoctor Show')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BecomeDoctor <small>Show</small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{ route('becomedoctors.display') }}">BecomeDoctors</a></li>
                <li class="active">Show</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">               
                <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('becomedoctors.display') }}"><i
                            class="fa fa-arrow-left"></i>
                        &nbsp;Back</a></h3>               
            </div>
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">User ID</label>
                                <input type="text" name="user_id" value="{{ $user->id }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Medical License</label>
                                <input type="text" name="medical_license" value="{{ $becomedoctor->medical_license ?? '' }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <input type="text" name="status" value="{{ $becomedoctor->status ?? 'pending' }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden;">
                                    @if($becomedoctor && $becomedoctor->file)
                                        <img src="{{ asset('uploads/becomedoctors/' . $becomedoctor->file) }}" alt="Doctor File" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>
                            @if($becomedoctor && $becomedoctor->file)
                                <a href="{{ asset('uploads/becomedoctors/' . $becomedoctor->file) }}" class="btn btn-primary" download>
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
