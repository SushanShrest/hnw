<div class="box-body">
    <div class="form-group row">
        <div class="col-md-6 @error('medical_license') has-error @enderror">
            <label class="control-label">Medical License<small class="required-field">*</small></label>
            <input type="text" name="medical_license" value="{{ old('medical_license') ?: ($becomedoctor ? $becomedoctor->medical_license : '') }}"
                class="form-control" placeholder="Medical License">
            @error('medical_license')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>        
    </div>
    <div class="form-group row">
        <div class="col-md-6 @error('file') has-error @enderror">
            <label class="control-label">File</label>
            <input type="file" name="file" class="form-control" accept="image/*">
            @error('file')
                <span class="help-block">{{ $message }}</span>
            @enderror
            @if($becomedoctor && $becomedoctor->file)
                <div style="width: 200px; height: 200px; border: 1px solid #000; overflow: hidden;">
                    <img src="{{ asset('uploads/becomedoctors/' . $becomedoctor->file) }}" alt="Doctor File" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-6">
            <label class="control-label">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $becomedoctor->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $becomedoctor->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $becomedoctor->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
    </div>
    
</div>
