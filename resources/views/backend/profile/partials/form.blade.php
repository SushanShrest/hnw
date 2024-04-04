<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('name') has-error @enderror">
            <label class="control-label">Name<small class="required-field">*</small></label>
            <input type="text" name="name" value="{{ old('name') ? old('name') : $user->name }}" class="form-control" placeholder="Name">
            @error('name')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('email') has-error @enderror">
            <label class="control-label">Email<small class="required-field">*</small></label>
            <input type="email" name="email" value="{{ old('email') ? old('email') : $user->email }}" class="form-control" placeholder="Email">
            @error('email')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('location') has-error @enderror">
            <label class="control-label">Location</label>
            <input type="text" name="location" value="{{ old('location') ? old('location') : $user->location }}" class="form-control" placeholder="Location">
            @error('location')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('contact') has-error @enderror">
            <label class="control-label">Contact</label>
            <input type="text" name="contact" value="{{ old('contact') ? old('contact') : $user->contact }}" class="form-control" placeholder="Contact">
            @error('contact')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('gender') has-error @enderror">
            <label class="control-label">Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>        

        <div class="col-md-6 @error('dob') has-error @enderror">
            <label class="control-label">Date of Birth</label>
            <input type="date" name="dob" value="{{ old('dob') ? old('dob') : ($user->dob ? \Carbon\Carbon::parse($user->dob)->format('Y-m-d') : '') }}" class="form-control" placeholder="Date of Birth">
            @error('dob')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('image') has-error @enderror">
            <label class="control-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')
            <span class="help-block">{{ $message }}</span>
            @enderror

            @if($user->image)
            <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden; margin-top: 10px;">
                <img src="{{ asset('uploads/profile/' . $user->image) }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            @endif
        </div>
    </div>

    <!-- Doctor-related fields (if user type is doctor) -->
    @if($user->type === 'doctor')
    <div class="form-group row">
        <div class="col-md-6 @error('department_id') has-error @enderror">
            <label class="control-label">Department</label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
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
            <input type="text" name="qualification" value="{{ old('qualification') ? old('qualification') : ($user->doctor ? $user->doctor->qualification : '') }}" class="form-control" placeholder="Qualification">
            @error('qualification')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('experience') has-error @enderror">
            <label class="control-label">Experience</label>
            <input type="number" name="experience" value="{{ old('experience') ? old('experience') : ($user->doctor ? $user->doctor->experience : '') }}" class="form-control" placeholder="Experience">
            @error('experience')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('specialization') has-error @enderror">
            <label class="control-label">Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization') ? old('specialization') : ($user->doctor ? $user->doctor->specialization : '') }}" class="form-control" placeholder="Specialization">
            @error('specialization')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('education') has-error @enderror">
            <label class="control-label">Education</label>
            <input type="text" name="education" value="{{ old('education') ? old('education') : ($user->doctor ? $user->doctor->education : '') }}" class="form-control" placeholder="Education">
            @error('education')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('work_places') has-error @enderror">
            <label class="control-label">Work Places</label>
            <input type="text" name="work_places" value="{{ old('work_places') ? old('work_places') : ($user->doctor ? $user->doctor->work_places : '') }}" class="form-control" placeholder="Work Places">
            @error('work_places')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
    @endif
</div>