<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>Doctor</th>
            <th>Contact</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($doctors->isNotEmpty())
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ (($doctors->currentPage() - 1) * $doctors->perPage()) + $loop->iteration }}</td>
                    <td>{{ $doctor->user->name }}</td>
                    <td>{{ $doctor->user->contact ?? 'N/A' }}</td>
                    <td>{{ $doctor->department ? $doctor->department->department_name : 'Not in a Department' }}</td>
                    <td>
                         {{-- Show Button --}}
                        <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-success btn-xs">
                            <i class="fa fa-eye"></i>
                        </a>
                        {{-- Edit Button --}}
                        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-info btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No Data !</td>
            </tr>
        @endif
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ ($doctors->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $doctors->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $doctors->lastPage(); $i++)
            <li class="page-item {{ ($doctors->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $doctors->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($doctors->currentPage() == $doctors->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $doctors->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

