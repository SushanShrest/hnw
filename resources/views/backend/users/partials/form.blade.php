<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6">
            <label class="control-label">User ID</label>
            <input type="text" value="{{ $user->id }}" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('name') has-error @enderror">
            <label class="control-label">Name<small class="required-field">*</small></label>
            <input type="text" name="name" value="{{ old('name') ? old('name') : $user->name }}"
                class="form-control" placeholder="Enter Name">
            @error('name')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('email') has-error @enderror">
            <label class="control-label">Email<small class="required-field">*</small></label>
            <input type="email" name="email"
                value="{{ old('email') ? old('email') : $user->email }}"
                class="form-control" placeholder="Enter Email">
            @error('email')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('type') has-error @enderror">
            <label class="control-label">Role<small class="required-field">*</small></label>
            <select name="type" class="form-control">
                <option value="user" {{ old('type', $user->type) == 'user' ? 'selected' : '' }}>User</option>
                <option value="doctor" {{ old('type', $user->type) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('type')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('gender') has-error @enderror">
            <label class="control-label">Gender<small class="required-field">*</small></label>
            <select name="gender" class="form-control">
                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('contact') has-error @enderror">
            <label class="control-label">Contact</label>
            <input type="text" name="contact" value="{{ old('contact') ? old('contact') : $user->contact }}"
                class="form-control" placeholder="Enter Contact">
            @error('contact')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('location') has-error @enderror">
            <label class="control-label">Location</label>
            <input type="text" name="location" value="{{ old('location') ? old('location') : $user->location }}"
                class="form-control" placeholder="Enter Location">
            @error('location')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('dob') has-error @enderror">
            <label class="control-label">Date of Birth</label>
            <input type="date" name="dob" value="{{ old('dob') ? old('dob') : $user->dob }}"
                class="form-control">
            @error('dob')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('image') has-error @enderror">
            <label class="control-label">Image</label>
            @error('image')
                <span class="help-block">{{ $message }}</span>
            @enderror
            @if($user->image)
                <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden;">
                    <img src="{{ asset('uploads/profile/' . $user->image) }}" alt="User Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @endif
        </div>
        
    </div>
</div>
