<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>Name</th>
            <th>District</th>
            <th>Contact</th>
            <th>Longitude</th>
            <th>Latitude</th>            
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($pharmacies->isNotEmpty())
            @foreach ($pharmacies as $pharmacy)
                <tr>
                    <td>{{ (($pharmacies->currentPage() - 1) * $pharmacies->perPage()) + $loop->iteration }}</td>
                    <td>{{ $pharmacy->name }}</td>
                    <td>{{ $pharmacy->district }}</td>
                    <td>{{ $pharmacy->contact }}</td>
                    <td>{{ $pharmacy->longitude }}</td>
                    <td>{{ $pharmacy->latitude }}</td>
                    <td>                       
                        <a href="{{ route('pharmacies.edit', $pharmacy) }}" class="btn btn-info btn-xs"> <i
                                class="fa fa-pencil"></i></a>
            
                        @include('backend.partials.delete_modal', [
                            'id' => $pharmacy->id,
                            'title' => $pharmacy->name,
                            'route' => route('pharmacies.destroy', $pharmacy),
                        ])
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">No Pharmacies!</td>
            </tr>
        @endif
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ ($pharmacies->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $pharmacies->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $pharmacies->lastPage(); $i++)
            <li class="page-item {{ ($pharmacies->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $pharmacies->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($pharmacies->currentPage() == $pharmacies->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $pharmacies->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
