<?php
$user_id = 1;
$organization_id = 1;
$supervisor_id = 1;

$credit_hours = [
    '0' => 0,
    '1' => 1,
    '2' => 2,
    '3' => 3,
];

$countries = [
    'country 1',
    'country 2',
    'country 3',
    'country 4',
];
?>


{!! Form::hidden('country_warning', 0) !!}

<div class="tab-pane" id="basics">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text"> Let's start with the <b>basic details</b></h4>
        </div>
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
</div>
<div class="tab-pane" id="location">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text"><b>Where</b> is the internship</h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">

                {{--Here dynamically check if current country is in warning list --}}
                {{--if so display the warning; the warning in the same line of "Where is the internship" label --}}
                {!! Form::label('country', 'Country') !!}
                {!! Form::select('country',
                                  $countries,
                                  null,
                                  [
                                  'placeholder' => 'please select internship country',
                                  'id' => 'country-select',
                                  'class' => 'form-control'
                                  ]) !!}


            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('state', 'State/Province/Region') !!}
                {!! Form::text('state',
                                null,
                                [
                                'id' => 'state-input',
                                'class' => 'form-control'
                                ]) !!}

            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">

                {!! Form::label('city', 'City') !!}
                {!! Form::text('city', null, ['id' => 'city-input', 'class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('street', 'Street') !!}
                {!! Form::text('street', null, ['class' => 'form-control', 'id' => 'street-input']) !!}
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="dates">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text">Great! <b>When?</b> </h4>
        </div>
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
</div>

<div class="tab-pane" id="budgets">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text"><b>How much</b> would you expect to spend?</h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('budget_airfare', 'Airfare') !!}
                <div class="input-group">
                    {!! Form::number('budget_airfare', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('budget_housing', 'Housing in total') !!}
                <div class="input-group">
                    {!! Form::number('budget_housing', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('budget_meals', 'Meals in total') !!}
                <div class="input-group">
                    {!! Form::number('budget_meals', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('budget_transportation', 'Transportation in total') !!}
                <div class="input-group">
                    {!! Form::number('budget_transportation', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('budget_others', 'Other costs(i.e. visa fee)') !!}
                <div class="input-group">
                    {!! Form::number('budget_others', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="tab-pane" id="work">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text">Would you tell us more about your <b>work schedule</b></h4>
        </div>
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
</div>

<div class="tab-pane" id="value">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text">
                What's the <b>value</b> of this internship?
            </h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('reasons', 'Reasons') !!}
                {!! Form::textarea('reasons', '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('cultural_interaction', 'Cultural interaction') !!}
                {!! Form::textarea('cultural_interaction', '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('challenges', 'Challenges') !!}
                {!! Form::textarea('challenges', '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
    </div>

</div>
        <!-- end of cards definitions -->


