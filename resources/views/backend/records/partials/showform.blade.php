<!-- Default box -->
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h3><b><u>Appointment Details</u></b></h3>
                <br>
            <h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>User:</b>{{ $record->appointment->user->name }}</p>  
                    </div>
                    <div class="col-md-6">
                        <p><b>Doctor:</b>{{ $record->appointment->timing->doctor->user->name }} </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Date:</b> {{ $record->appointment->date }}</p>  
                    </div>
                    <div class="col-md-6">
                        <p><b>Timing:</b> {{ $record->appointment->timing->day}}: shift-{{ $record->appointment->timing->shift }} ({{ date('h:i A', strtotime($record->appointment->timing->start_time)) }} - {{ date('h:i A', strtotime($record->appointment->timing->end_time)) }})</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Status:</b> {{ $record->appointment->status }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Location:</b> {{ $record->appointment->location }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Visit Fee:</b> {{ $record->appointment->timing->visit_fee }}</p>
                    </div>
                </div>
            </h4>
                <h4><b>Problem:</b></h4>
                <h5>{{ $record->appointment->problem }}</h5>
                <h4><b>Problem Description:</b></h4>
                <h5>{{ $record->appointment->problem_description }}</h5>
                <h4><b>Patient Description:</b></h4>
                <h5>{{ $record->appointment->patient_description }}</h5>
                
            </div>
        </div>
    </div>
</div>
<!-- /.box -->
<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <h3><b><u>Record Details</u></b></h3>
                <br>
                <h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Follow up:</b> {{ $record->followup_plan ? $record->followup_plan : 'NA' }}</p>
                        </div>
                    </div>
                </h4>
                <h4><b>Issue:</b></h4>
                <h5>{{ $record->issue ? $record->issue : 'NA' }}</h5>
                <h4><b>Treatment:</b></h4>
                <h5>{{ $record->treatment ? $record->treatment : 'NA' }}</h5>
                <h4><b>Medication:</b></h4>
                <h5>{{ $record->medication ? $record->medication : 'NA' }}</h5>
            </div>
            
        </div>
    </div>
</div>
<!-- /.box -->