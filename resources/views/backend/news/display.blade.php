@extends('backend.layouts.master')
@section('backend-title', 'News List')
@section('page-specific-css')

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
        <section
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); margin: 10px; border-radius: 10px; place-items: center; gap: 20px;">
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
                    <div
                        style="display: flex; background-color: #598; border-radius: 1rem; height: 15vw; width: 27vw; border-style: solid; border-width: 1px; overflow: hidden;">
                        <div style="width: 40%">
                            <img src="{{ asset('uploads/news/' . $new->image) }}"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;"
                                alt="{{ $new->title }}">
                        </div>
                        <div style="position: relative;width: 60%; padding: 20px; display: grid;">
                            <div style="">
                                <p style="font-size: 3rem">{{ $new->title }}</p>
                                <p style="font-size: 1rem">{{ $new->created_at->format('M d, Y') }}</p>
                                <p style="font-size: 1.5rem">{{ $new->description }}</p>
                            </div>
                            <div style="position: absolute; right: 10px; bottom: 10px">
                                <a href="{{ route('news.show', $new) }}">
                                    <button class="btn btn-primary">Continue reading</button>
                                </a>
                            </div>                            
                        </div>
                    </div>
                    {{-- <div style="width: 100%; max-width: 350px; margin: 10px;">
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
            </div> --}}
                @endforeach
            @endif
        </section>
    </div>
@endsection
