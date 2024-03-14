<form method="POST" action="{{ route('timings.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="day">Select a Day:</label>
            <select name="day" id="day" class="form-control">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <!-- Add options for other days -->
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="shift">Select Shift:</label>
            <select name="shift" id="shift" class="form-control">
                <option value="1">Shift 1</option>
                <option value="2">Shift 2</option>
                <option value="3">Shift 3</option>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="start_time">Start Time:</label>
            <input type="time" name="start_time" id="start_time" class="form-control">
        </div>

        <div class="form-group col-md-2">
            <label for="end_time">End Time:</label>
            <input type="time" name="end_time" id="end_time" class="form-control">
        </div>

        <div class="form-group col-md-2">
            <label for="avg_consultation_time">Avg Consultation Time (min):</label>
            <input type="number" name="avg_consultation_time" id="avg_consultation_time" class="form-control" min="1">
        </div>

        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>