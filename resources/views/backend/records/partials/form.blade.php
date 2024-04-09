<div class="form-group row">
    <div class="form-group col-md-6 @error('user_name') has-error @enderror">
        <label for="user_name">Patient Name:</label>
        <input type="text" class="form-control" value="{{ old('user_name') ? old('user_name') : $record->appointment->user->name }}" readonly>
        @error('user_name')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-6 @error('doctor_name') has-error @enderror">
        <label for="doctor_name">Doctor Name:</label>
        <input type="text" class="form-control" value="{{ old('doctor_name') ? old('doctor_name') : $record->appointment->timing->doctor->user->name }}" readonly>
        @error('doctor_name')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="form-group col-md-6 @error('appointment_date') has-error @enderror">
        <label for="appointment_date">Appointment Date:</label>
        <input type="text" class="form-control" value="{{ old('appointment_date') ? old('appointment_date') : $record->appointment->date }}" readonly>
        @error('appointment_date')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-6 @error('appointment_shift') has-error @enderror">
        <label for="appointment_shift">Appointment Shift:</label>
        <input type="text" class="form-control" value="Shift {{ $record->appointment->timing->shift }} ({{ date('h:i A', strtotime($record->appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($record->appointment->timing->end_time)) }})" readonly>
        @error('appointment_shift')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="form-group col-md-6 @error('followup_plan') has-error @enderror">
        <label for="followup_plan">Follow-up Date:</label>
        <input type="date" name="followup_plan" class="form-control" value="{{ old('followup_plan') ? old('followup_plan') : $record->followup_plan }}">
        @error('followup_plan')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
</div>

<!-- Issue -->
<div class="form-group @error('issue') has-error @enderror">
    <label for="issue">Issue:</label>
    <textarea name="issue" class="form-control">{{ old('issue') ? old('issue') : $record->issue }}</textarea>
    @error('issue')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>

<!-- Treatment -->
<div class="form-group @error('treatment') has-error @enderror">
    <label for="treatment">Treatment:</label>
    <textarea name="treatment" class="form-control">{{ old('treatment') ? old('treatment') : $record->treatment }}</textarea>
    @error('treatment')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>

<!-- Medication -->
<div class="form-group @error('medication') has-error @enderror">
    <label for="medication">Medication:</label>
    <textarea name="medication" class="form-control">{{ old('medication') ? old('medication') : $record->medication }}</textarea>
    @error('medication')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>
