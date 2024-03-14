 <!-- Table showing existing timings -->
 <table class="table">
    <thead>
        <tr>
            <th>Day</th>
            <th>Shift</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Avg Consultation Time (min)</th>
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
            <td>{{ $timing->avg_consultation_time }}</td>
            <td>
                <a href="{{ route('timings.edit', $timing->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('timings.destroy', $timing->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this timing?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>