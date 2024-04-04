<!-- Table showing existing timings -->
<table class="table">
    <thead>
        <tr>
            <th>Day</th>
            <th>Shift</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Location</th>
            <th>Visit Fee</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($timings as $timing)
        <tr>
            <td>{{ $timing->day }}</td>
            <td>{{ $timing->shift }}</td>
            <td>{{ $timing->start_time }}</td>
            <td>{{ $timing->end_time }}</td>
            <td>{{ $timing->location }}</td>
            <td>{{ $timing->visit_fee }}</td>
            <td>                       
                <a href="{{ route('timings.edit', $timing) }}" class="btn btn-info btn-xs"> <i
                        class="fa fa-pencil"></i></a>
    
                @include('backend.partials.delete_modal', [
                    'id' => $timing->id,
                    'title' => $timing->day,
                    'route' => route('timings.destroy', $timing),
                ])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
