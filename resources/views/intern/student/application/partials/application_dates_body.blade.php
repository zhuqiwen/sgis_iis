<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            {!! Form::label('depart_date', 'Departure date') !!}
            {!! Form::date('depart_date',
                            \Carbon\Carbon::now(),
                            ['class' => 'form-control']) !!}


        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!! Form::label('return_date', 'Return date') !!}
            {!! Form::date('return_date',
                            \Carbon\Carbon::now(),
                            ['class' => 'form-control']) !!}

        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">

            {!! Form::label('start_date', 'Start date') !!}
            {!! Form::date('start_date',
                            \Carbon\Carbon::now(),
                            ['class' => 'form-control']) !!}
            <br>

        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!! Form::label('end_date', 'End date') !!}
            {!! Form::date('end_date',
                            \Carbon\Carbon::now(),
                            ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
