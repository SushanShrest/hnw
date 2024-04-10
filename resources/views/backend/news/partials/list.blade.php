<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($news->isNotEmpty())
            @foreach ($news as $new)
                <tr>
                    <td>{{ (($news->currentPage() - 1) * $news->perPage()) + $loop->iteration }}</td>
                    <td>{{ $new->title }}</td>
                    <td>                       
                        <a href="{{ route('news.edit', $new) }}" class="btn btn-info btn-xs"> <i
                                class="fa fa-pencil"></i></a>
            
                        @include('backend.partials.delete_modal', [
                            'id' => $new->id,
                            'title' => $new->title,
                            'route' => route('news.destroy', $new),
                        ])
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No Data !</td>
            </tr>
        @endif

    </tbody>
</table>

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
