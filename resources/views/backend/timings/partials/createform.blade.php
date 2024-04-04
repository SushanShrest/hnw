<div class="form-row">
    <div class="form-group col-md-2">
        <label for="day">Select a Day:</label>
        <select name="day" id="day" class="form-control">
            <option value="sun">Sunday</option>
            <option value="mon">Monday</option>
            <option value="tue">Tuesday</option>
            <option value="wed">Wednesday</option>
            <option value="thu">Thursday</option>
            <option value="fri">Friday</option>
            <option value="sat">Saturday</option>
        </select>
        @error('day')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label for="shift">Select Shift:</label>
        <select name="shift" id="shift" class="form-control">
            <option value="1">Shift 1</option>
            <option value="2">Shift 2</option>
        </select>
        @error('shift')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" id="start_time" class="form-control">
        @error('start_time')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label for="end_time">End Time:</label>
        <input type="time" name="end_time" id="end_time" class="form-control">
        @error('end_time')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" class="form-control">
        @error('location')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-2">
        <label for="visit_fee">Visit Fee:</label>
        <input type="number" name="visit_fee" id="visit_fee" class="form-control" min="1">
        @error('visit_fee')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
