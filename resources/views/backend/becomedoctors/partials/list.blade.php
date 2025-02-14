<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>User</th>
            <th>Medical License</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($becomedoctors->isNotEmpty())
            @foreach ($becomedoctors as $becomedoctor)
                <tr>
                    <td>{{ (($becomedoctors->currentPage() - 1) * $becomedoctors->perPage()) + $loop->iteration }}</td>
                    <td>{{ $becomedoctor->user->name }}</td>
                    <td>{{ $becomedoctor->medical_license }}</td>
                    <td>{{ $becomedoctor->status }}</td>
                    <td>
                        <a href="{{ route('becomedoctors.edit', $becomedoctor) }}" class="btn btn-info btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>

                        {{-- Show button --}}
                        <a href="{{ route('becomedoctors.show', $becomedoctor) }}" class="btn btn-success btn-xs" title="Show Details">
                        <i class="fa fa-eye"></i>
                        </a>
                        {{-- Include delete modal --}}
                        @include('backend.partials.delete_modal', [
                            'id' => $becomedoctor->id,
                            'title' => 'Becomedoctor',
                            'route' => route('becomedoctors.destroy', $becomedoctor),
                        ])
                        
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
        <li class="page-item {{ ($becomedoctors->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $becomedoctors->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $becomedoctors->lastPage(); $i++)
            <li class="page-item {{ ($becomedoctors->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $becomedoctors->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($becomedoctors->currentPage() == $becomedoctors->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $becomedoctors->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
