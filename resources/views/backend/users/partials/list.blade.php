<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->isNotEmpty())
            @foreach ($users as $user)
                <tr>
                    <td>{{ (($users->currentPage() - 1) * $users->perPage()) + $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->type }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-info btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @include('backend.partials.delete_modal', [
                            'id' => $user->id,
                            'title' => $user->name,
                            'route' => route('users.destroy', $user),
                        ])
                    </td>
                    
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No Users Found!</td>
            </tr>
        @endif
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $users->lastPage(); $i++)
            <li class="page-item {{ ($users->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
