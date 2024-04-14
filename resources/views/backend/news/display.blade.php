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
                @endforeach
            @endif
        </section>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item {{ ($news->currentPage() == 1) ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $news->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $news->lastPage(); $i++)
                    <li class="page-item {{ ($news->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ ($news->currentPage() == $news->lastPage()) ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $news->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
