<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('department_id') has-error @enderror">
            <label class="control-label">Department</label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>        
    </div>
    
    <div class="form-group row">
        <div class="col-md-6 @error('qualification') has-error @enderror">
            <label class="control-label">Qualification</label>
            <input type="text" name="qualification" value="{{ old('qualification') ?? $doctor->qualification }}" class="form-control" placeholder="Qualification">
            @error('qualification')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('experience') has-error @enderror">
            <label class="control-label">Experience</label>
            <input type="number" name="experience" value="{{ old('experience') ?? $doctor->experience }}" class="form-control" placeholder="Experience">
            @error('experience')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('specialization') has-error @enderror">
            <label class="control-label">Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization') ?? $doctor->specialization }}" class="form-control" placeholder="Specialization">
            @error('specialization')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('education') has-error @enderror">
            <label class="control-label">Education</label>
            <input type="text" name="education" value="{{ old('education') ?? $doctor->education }}" class="form-control" placeholder="Education">
            @error('education')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('work_places') has-error @enderror">
            <label class="control-label">Work Places</label>
            <input type="text" name="work_places" value="{{ old('work_places') ?? $doctor->work_places }}" class="form-control" placeholder="Work Places">
            @error('work_places')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
