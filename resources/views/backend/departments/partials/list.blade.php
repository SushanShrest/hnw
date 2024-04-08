<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>Department</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($departments->isNotEmpty())
            @foreach ($departments as $department)
                <tr>
                    <td>{{ (($departments->currentPage() - 1) * $departments->perPage()) + $loop->iteration }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>                       
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-info btn-xs"> <i
                                class="fa fa-pencil"></i></a>
            
                        @include('backend.partials.delete_modal', [
                            'id' => $department->id,
                            'title' => $department->department_name,
                            'route' => route('departments.destroy', $department),
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
        <li class="page-item {{ ($departments->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $departments->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $departments->lastPage(); $i++)
            <li class="page-item {{ ($departments->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $departments->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($departments->currentPage() == $departments->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $departments->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
