<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('title') has-error @enderror">
            <label class="control-label">Title<small class="required-field">*</small></label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="News Title">
            @error('title')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('description') has-error @enderror">
            <label class="control-label">Description<small class="required-field">*</small></label>
            <textarea name="description" class="form-control" placeholder="News Description">{{ old('description') }}</textarea>
            @error('description')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-6 @error('image') has-error @enderror">
            <label class="control-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" >
            @error('image')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div> 
</div>
