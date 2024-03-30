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
                    <td>{{ $loop->index + 1 }}</td>
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
