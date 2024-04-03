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
                    <td>{{ $loop->index + 1 }}</td>
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
