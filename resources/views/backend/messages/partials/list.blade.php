<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>User Name</th>
            <th>User Type</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($messages->isNotEmpty())
            @foreach ($messages as $message)
                <tr>
                    <td>{{ (($messages->currentPage() - 1) * $messages->perPage()) + $loop->iteration }}</td>
                    <td>{{ $message->user->name ?? 'Unknown User' }}</td>
                    <td>{{ $message->user->type ?? 'No Type' }}</td>
                    <td>{{ $message->status }}</td>
                    <td>{{ $message->created_at->format('Y-M-d') }}</td>
                    <td>{{ $message->updated_at->format('Y-M-d') }}</td>
                   
                    <td>
                        <!-- Show Button -->
                        <a href="{{ route('messages.show', $message) }}" class="btn btn-success btn-xs">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('messages.edit', $message) }}" class="btn btn-info btn-xs" title="View Message">
                            <i class="fa fa-pencil"></i>
                        </a>
                    
                        <!-- Delete Modal Include -->
                        @include('backend.partials.delete_modal', [
                            'id' => $message->id,
                            'title' => $message->title,
                            'route' => route('messages.destroy', $message),
                        ])
                    </td>
                    
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No Data!</td>
            </tr>
        @endif
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

