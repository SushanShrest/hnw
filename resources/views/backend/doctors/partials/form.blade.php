<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('name') has-error @enderror">
            <label class="control-label">Name<small class="required-field">*</small></label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Doctor's Name">
            @error('name')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('email') has-error @enderror">
            <label class="control-label">Email<small class="required-field">*</small></label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Doctor's Email">
            @error('email')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-6 @error('password') has-error @enderror">
        <label class="control-label">Password<small class="required-field">*</small></label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        @error('password')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('department_id') has-error @enderror">
            <label class="control-label">Department<small class="required-field">*</small></label>
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
            @error('department_id')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('status') has-error @enderror">
            <label class="control-label">Status<small class="required-field">*</small></label>
            <select name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            @error('status')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('gender') has-error @enderror">
            <label class="control-label">Gender<small class="required-field">*</small></label>
            <select name="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            @error('gender')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('experience') has-error @enderror">
            <label class="control-label">Experience<small class="required-field">*</small></label>
            <input type="number" name="experience" value="{{ old('experience') }}" class="form-control" placeholder="Experience">
            @error('experience')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('qualification') has-error @enderror">
            <label class="control-label">Qualification<small class="required-field">*</small></label>
            <input type="text" name="qualification" value="{{ old('qualification') }}" class="form-control" placeholder="Qualification">
            @error('qualification')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
