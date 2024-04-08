<input type="hidden" name="user_id" value="{{ auth()->id() }}">
<div class="box-body">
    <div class="row">
        <!-- First Column -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="doctor_name">Doctor Name</label>
                <input type="text" class="form-control" id="doctor_name" value="{{ old('doctor_name', $doctor->user->name) }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="doctor_department">Doctor Department</label>
                <input type="text" class="form-control" id="doctor_department" value="{{ old('doctor_department', $doctor->department->department_name) }}" readonly>
            </div>
            
            <div class="form-group row">
                <div class="col-md-6 @error('problem') has-error @enderror">
                    <label class="control-label">Problem</label>
                    <input type="text" class="form-control" id="problem" name="problem" value="{{ old('problem') }}">
                    @error('problem')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                     
            <div class="form-group row">
                <div class="col-md-6 @error('problem_description') has-error @enderror">
                    <label class="control-label">Problem Description</label>
                    <textarea class="form-control" id="problem_description" name="problem_description" rows="3">{{ old('problem_description') }}</textarea>
                    @error('problem_description')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-6 @error('location') has-error @enderror">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                    @error('location')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row" style="display: none;">
                <div class="col-md-6">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" value="{{ old('status', 'pending') }}">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-6 @error('patient_description') has-error @enderror">
                    <label for="patient_description">Patient Description</label>
                    <textarea class="form-control" id="patient_description" name="patient_description" rows="3">{{ old('patient_description') }}</textarea>
                    @error('patient_description')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Second Column -->
        <div class="col-md-6">
            <div class="form-group @error('date') has-error @enderror">
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" class="form-control " value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                {{-- <p class="text-muted">Note: Please select a date that corresponds to the available timings for the selected day.</p> --}}
                <label for="timings">Available Timings:</label>
                <select id="timings" name="timing_id" class="form-control @error('timing_id') is-invalid @enderror">
                    @foreach($doctor->timings as $timing)
                        <option value="{{ $timing->id }}" {{ old('timing_id') == $timing->id ? 'selected' : '' }}>
                            {{ $timing->day }} - Shift {{ $timing->shift }}
                        </option>
                    @endforeach
                </select>
                @error('timing_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Timings -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Timings</h3>
                    @if ($doctor->timings->isNotEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Shift</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Location</th>
                                    <th>Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctor->timings as $timing)
                                    <tr>
                                        <td>{{ $timing->day }}</td>
                                        <td>{{ $timing->shift }}</td>
                                        <td>{{ date('h:i A', strtotime($timing->start_time)) }}</td>
                                        <td>{{ date('h:i A', strtotime($timing->end_time)) }}</td>
                                        <td>{{ $timing->location ?: 'N/A' }}</td>
                                        <td>{{ $timing->visit_fee ?: 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No timing available.</p>
                    @endif
                </div>
            </div>
            <p class="text-muted">Note: Fees are charged for visit only and can change depending upon the treatment.</p>
        </div>
    </div>
</div>
