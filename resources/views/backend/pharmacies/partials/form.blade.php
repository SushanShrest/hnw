<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('name') has-error @enderror">
            <label class="control-label">Pharmacy Name<small class="required-field">*</small></label>
            <input type="text" name="name" value="{{ old('name') ? old('name') : $pharmacy->name }}"
                class="form-control" placeholder="Pharmacy Name">
            @error('name')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('district') has-error @enderror">
            <label class="control-label">District<small class="required-field">*</small></label>
            <input type="text" name="district"
                value="{{ old('district') ? old('district') : $pharmacy->district }}"
                class="form-control" placeholder="District">
            @error('district')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('latitude') has-error @enderror">
            <label class="control-label">Latitude<small class="required-field">*</small></label>
            <input type="text" name="latitude" value="{{ old('latitude') ? old('latitude') : $pharmacy->latitude }}"
                class="form-control" placeholder="Latitude">
            @error('latitude')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6 @error('longitude') has-error @enderror">
            <label class="control-label">Longitude<small class="required-field">*</small></label>
            <input type="text" name="longitude" value="{{ old('longitude') ? old('longitude') : $pharmacy->longitude }}"
                class="form-control" placeholder="Longitude">
            @error('longitude')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 @error('contact') has-error @enderror">
            <label class="control-label">Contact<small class="required-field">*</small></label>
            <input type="text" name="contact" value="{{ old('contact') ? old('contact') : (isset($pharmacy) ? $pharmacy->contact : '') }}"
                class="form-control" placeholder="Contact">
            @error('contact')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
    </div>   
</div>
