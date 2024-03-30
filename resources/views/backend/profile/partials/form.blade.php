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
    
</div>
