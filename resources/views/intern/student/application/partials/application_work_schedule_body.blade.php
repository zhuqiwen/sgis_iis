<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('work_hours_per_week', 'Work hours per week') !!}
                <div class="input-group">
                    {!! Form::number('work_hours_per_week', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">hours</span>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('work_schedule', 'Work schedule details ') !!}
                {!! Form::textarea('work_schedule','', ['class' => 'form-control', 'rows' => 5]) !!}
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('description', 'Expected experience and duties') !!}
                {!! Form::textarea('description', '', ['class' => 'form-control', 'rows' => 9]) !!}
            </div>
        </div>
    </div>

</div>