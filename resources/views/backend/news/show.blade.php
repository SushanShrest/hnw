@extends('backend.layouts.master')
@section('backend-title', 'News Show')

@section('backend-content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                News <small>Show</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">               
                <h3 class="box-title">
                    <a class="btn bg-purple btn-flat" href="{{ route('news.display') }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;Back
                    </a>
                </h3>               
            </div>    
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <!-- Left side -->
                        <div class="col-md-6">
                            <h3>{{ $news->title }}</h3>
                            <p><small class="text-muted">Published: {{ $news->created_at->format('M d, Y') }}</small></p>
                            <h4>Description:</h4>
                            <p>{{ $news->description }}</p>
                        </div>
                        <!-- Right side -->
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/news/' . $news->image) }}" alt="{{ $news->title }}" class="img-thumbnail" style="width: 100%; height: 80%; object-fit">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
