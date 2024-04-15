
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="day">Select a Day:</label>
            <select name="day" id="day" class="form-control">
                <option value="sunday" {{ old('day', $timing->day) == 'sunday' ? 'selected' : '' }}>Sunday</option>
                <option value="monday" {{ old('day', $timing->day) == 'monday' ? 'selected' : '' }}>Monday</option>
                <option value="tuesday" {{ old('day', $timing->day) == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="wednesday" {{ old('day', $timing->day) == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="thursday" {{ old('day', $timing->day) == 'thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="friday" {{ old('day', $timing->day) == 'friday' ? 'selected' : '' }}>Friday</option>
                <option value="saturday" {{ old('day', $timing->day) == 'saturday' ? 'selected' : '' }}>Saturday</option>
            </select>
            @error('day')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label for="shift">Select Shift:</label>
            <input type="text" class="form-control" readonly value="{{ $timing->shift == '1' ? 'Shift 1' : 'Shift 2' }}">
            <input type="hidden" name="shift" value="{{ $timing->shift }}">
            @error('shift')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>        

        <div class="form-group col-md-2">
            <label for="start_time">Start Time:</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', $timing->start_time) }}">
            @error('start_time')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label for="end_time">End Time:</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $timing->end_time) }}">
            @error('end_time')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $timing->location) }}">
            @error('location')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-2">
            <label for="visit_fee">Visit Fee:</label>
            <input type="number" name="visit_fee" id="visit_fee" class="form-control" min="1" value="{{ old('visit_fee', $timing->visit_fee) }}">
            @error('visit_fee')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>


   

        {{-- <div>
            <label for="day">Day:</label>
            <input type="text" name="day" id="day" value="{{ old('day', $timing->day) }}">
        </div> --}}


