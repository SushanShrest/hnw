<div class="box-body">
    <!-- Title Input -->
    <div class="form-group row">
        <div class="col-md-6 @error('title') has-error @enderror">
            <label class="control-label">Title<small class="required-field">*</small></label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="form-control" placeholder="Enter title">
            @error('title')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>        
    </div>

    <!-- Message Textarea -->
    <div class="form-group row">
        <div class="col-md-12 @error('message') has-error @enderror">
            <label class="control-label">Message<small class="required-field">*</small></label>
            <textarea name="message" class="form-control" rows="5" placeholder="Enter your message">{{ old('message') }}</textarea>
            @error('message')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Image File Input -->
    <div class="form-group row">
        <div class="col-md-6 @error('image') has-error @enderror">
            <label class="control-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Status Hidden Field -->
    <div class="form-group row">
        <div class="col-md-6">
            <input type="hidden" name="status" value="pending">
        </div>
    </div>
</div>
