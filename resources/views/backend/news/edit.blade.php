@extends('backend.layouts.master')
@section('backend-title', 'Edit News')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit News
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">               
                <h3 class="box-title">
                    <a class="btn bg-purple btn-flat" href="{{ route('news.index') }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;Back
                    </a>
                </h3>               
            </div>    
            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <h3 class="box-title"> Edit News</h3>
                </div>
                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-md-6 @error('title') has-error @enderror">
                                <label class="control-label">Title<small class="required-field">*</small></label>
                                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-control" placeholder="News Title">
                                @error('title')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-6 @error('description') has-error @enderror">
                                <label class="control-label">Description<small class="required-field">*</small></label>
                                <textarea name="description" class="form-control" placeholder="News Description">{{ old('description', $news->description) }}</textarea>
                                @error('description')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 @error('image') has-error @enderror">
                                <label class="control-label">Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*" >
                                @error('image')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> 
                        <!-- Display existing image if available -->
                        @if($news->image)
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label">Current Image</label>
                                <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden;">
                                    <img src="{{ asset('uploads/news/' . $news->image) }}" alt="News Image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary submit">Update</button>
                    </div>
                </form>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('page-specific-js')

@endsection
