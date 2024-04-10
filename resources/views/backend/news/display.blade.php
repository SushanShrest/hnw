@extends('backend.layouts.master')
@section('backend-title', 'News List')
@section('page-specific-css')
<style>
    .box {
        display: grid;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-image img {
        max-width: 100px;
        height: 200px;
        border-radius: 5px;
    }

    .card-description {
        margin-top: 10px;
    }

    .card-btn {
        margin-top: 15px;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
@endsection

@section('backend-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            News
        </h1>
    </section>

    <!-- Main content -->
    <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); background-color: rgb(233, 231, 231); margin: 10px; border-radius: 10px; place-items: center; gap: 20px;">
        @if ($news->isEmpty())
            <div class="box no-padding">
                <div class="box-body">
                    <div class="alert alert-danger" style="padding: 20px; border-radius: 5px; text-align: center;">
                        <strong>No news available at the moment.</strong>
                    </div>
                </div>
            </div>
        @else
            @foreach ($news as $new)
            <div style="width: 100%; max-width: 350px; margin: 10px;">
                <div style="height: 420px; background-color: #598; padding: 15px; border: 1px solid #ccc; border-radius: 5px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div style="font-size: 2rem; color: #ffffff; font-weight: bold; margin-bottom: 10px;">
                        {{ $new->title }}
                    </div>
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('uploads/news/' . $new->image) }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 5px;" alt="{{ $new->title }}">
                    </div>
                    <div style="font-size: 1.3rem; color: #ffffff; margin-bottom: auto;font-weight: normal;">
                        {{ $new->description }}
                    </div>
                    <div style="text-align: center;">
                        <a href="{{ route('news.show', $new) }}" class="btn btn-primary">View News</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </section>
</div>
@endsection
