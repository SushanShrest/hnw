<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">S.N</th>
            <th>Doctor</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($doctors->isNotEmpty())
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $doctor->user->name }}</td>
                    <td>{{ $doctor->department ? $doctor->department->department_name : 'Not in a Department' }}</td>
                    <td>
                        {{-- Edit Button --}}
                        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-info btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>
                        {{-- Delete Button --}}
                        @include('backend.partials.delete_modal', [
                            'id' => $doctor->id,
                            'title' => $doctor->name,
                            'route' => route('doctors.destroy', $doctor),
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
