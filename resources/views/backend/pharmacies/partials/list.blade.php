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
                    <td>{{ $loop->index + 1 }}</td>
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
