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
                    <td>{{ $loop->index + 1 }}</td>
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
