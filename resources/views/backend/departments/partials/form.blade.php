<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('code') has-error @enderror">
            <label class="control-label">Department Code<small class="required-field">*</small></label>
            <input type="text" name="code" value="{{ old('code') ? old('code') : $department->code }}"
                class="form-control" placeholder="Eg: CDLGY-01">
            @error('code')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('department_name') has-error @enderror">
            <label class="control-label">Department Name<small class="required-field">*</small></label>
            <input type="text" name="department_name"
                value="{{ old('department_name') ? old('department_name') : $department->department_name }}"
                class="form-control" placeholder="Department Name">
            @error('department_name')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('description') has-error @enderror">
            <label class="control-label">Description<small class="required-field">*</small></label>
            <textarea name="description" class="form-control" placeholder="Department Description">{{ old('description') ? old('description') : $department->description }}</textarea>
            @error('description')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-6 @error('file') has-error @enderror">
            <label class="control-label">Image</label>
            <input type="file" name="file" class="form-control" accept="image/*" >{{ $department->file }}
            @error('file')
                <span class="help-block">{{ $message }}</span>
            @enderror
            @if($department->file)
            <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden;">
                <img src="{{ asset('uploads/departments/' . $department->file) }}" alt="Department Image" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            
            @endif
        </div>
    </div>

    
    {{-- <div class="form-group row">
        <div class="col-md-6 @error('file') has-error @enderror">
            <label class="control-label">Image</label>
            <input type="file" name="file" class="form-control" accept="image/*" value="{{old('file')}}">
         @error('file')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div> --}}
    
</div>
