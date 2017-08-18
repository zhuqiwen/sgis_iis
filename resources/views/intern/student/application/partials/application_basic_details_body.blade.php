<?php

$credit_hours = [
    '0' => 0,
    '1' => 1,
    '2' => 2,
    '3' => 3,
];
?>


<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            {!! Form::label('year', 'Which academic year?') !!}
            {!! Form::select('year',
            ['2018' => '2018', '2019'=> '2019'],
            '2018',
            ['class' => 'form-control']) !!}

        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!! Form::label('term', 'Which Term?') !!}
            {!! Form::select('term',
            ['Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'],
            'Summer',
            ['class' => 'form-control']) !!}
            <br>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            {!! Form::label('paid_internship', 'Is this internship with any payment?') !!}
            {!! Form::select('paid_internship',
                            [0 => 'No', 1 => 'Yes'],
                            1,
                            ['class' => 'form-control']) !!}

        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            {!! Form::label('credit_hours', 'Credit Hours Desired') !!}

            <div class="input-group">
                {!! Form::select('credit_hours',
                                  $credit_hours,
                                  '0',
                                  ['class' => 'form-control']) !!}
                <span class="input-group-addon">credits</span>
            </div>
        </div>
    </div>
</div>
