@extends('layouts.app')
<?php
$user_id = Auth::user()->id;

$organization_id = (int)session('data')['org_id'];


$supervisor_id = (int)session('data')['supervisor_id'];

$credit_hours = [
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
];

$countries = [
        'China' => 'China',
        'United Kingdom' => 'United Kingdom',
];

$states = [
        'state 1' => 'state 1',
        'state 2' => 'state 2',
];
$cities = [
        'city 1' => 'city 1',
        'city 2' => 'city 2',
];
$work_schedule_guide = 'please briefly describe your anticipated work schedule';
$duties_guide = 'Provide a detailed description of the internship experience and your specific duties';
$reasons_guide = 'Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals)';
$culture_guide = 'If it is an internship abroad, explain how you will interact with the host culture';
$challenge_guide = 'Detail any challenges you expect to face during  the internship and explain how you intend to face these challenges';
?>
@section('content')

    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">
    {{--<link rel="stylesheet" href="/css/test/gsdk-base.css">--}}



    <div class="image-container set-full-height" style="background-image: url('/img/wizard-city.jpg')">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="azzure" id="wizard">
                        {{--<form action="" method="">--}}
                        {!! Form::open(['action' => 'InternApplicationController@prepareLiability']) !!}
                        {!! Form::hidden('user_id', $user_id) !!}
                        {!! Form::hidden('organization_id', $organization_id) !!}
                        {!! Form::hidden('supervisor_id', $supervisor_id) !!}
                        {!! Form::hidden('is_approved', 0) !!}
                        {!! Form::hidden('is_submitted', 0) !!}

                        {{--//temporarily set to false--}}
                        {!! Form::hidden('country_warning', 0) !!}

                        <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header">
                                <h3>
                                    <b>SGIS Internship Application</b> <br>
                                    <small>Tell us about your internship.</small>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#basics" data-toggle="tab">Basics</a></li>
                                    <li><a href="#location" data-toggle="tab">Location</a></li>
                                    <li><a href="#dates" data-toggle="tab">Dates</a></li>
                                    <li><a href="#budgets" data-toggle="tab">Budgets</a></li>
                                    <li><a href="#work" data-toggle="tab">Work</a></li>
                                    <li><a href="#thoughts" data-toggle="tab">Thoughts</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <!-- 6 cards/panes -->
                                <!-- basics[year, term, paid?, credit hour]-->
                                <!-- location[country, state, city, street]-->
                                <!-- dates[departure, return, start, end]-->
                                <!-- budgets[airfare, living cost per day, accommodation]-->
                                <!-- work[hours per week, schedule, duties]-->
                                <!-- thoughts[goals, cultural reasons, challenge]-->
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
                                                                [0 => 'No', 1 => 'Yes', 2 => 'Unknown'],
                                                                2,
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

                                                {!! Form::label('country', 'Country') !!}
                                                {!! Form::select('country',
                                                                  $countries,
                                                                  null,
                                                                  ['class' => 'form-control']) !!}


                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('state', 'State/Province') !!}
                                                {!! Form::select('state',
                                                                  $states,
                                                                  null,
                                                                  ['class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">

                                                {!! Form::label('city', 'City') !!}
                                                {!! Form::select('city',
                                                                  $cities,
                                                                  null,
                                                                  ['class' => 'form-control']) !!}
                                                <br>

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('street', 'Street') !!}
                                                {!! Form::text('street', null, ['class' => 'form-control']) !!}
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
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <div class="form-group">
                                                {!! Form::label('budget_airfare', 'Airfare') !!}
                                                <div class="input-group">
                                                    {!! Form::number('budget_airfare', '0', ['class' => 'form-control']) !!}
                                                    <span class="input-group-addon">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <div class="form-group">
                                                {!! Form::label('budget_living_per_day', 'Daily Living') !!}
                                                <div class="input-group">
                                                    {!! Form::number('budget_living_per_day', '0', ['class' => 'form-control']) !!}
                                                    <span class="input-group-addon">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <div class="form-group">
                                                {!! Form::label('budget_accommodation', 'Accommodation') !!}
                                                <div class="input-group">
                                                    {!! Form::number('budget_accommodation', '0', ['class' => 'form-control']) !!}
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
                                                    {!! Form::textarea('work_schedule',$work_schedule_guide, ['class' => 'form-control', 'rows' => 5]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('description', 'Expected experience and duties') !!}
                                                    {!! Form::textarea('description', $duties_guide, ['class' => 'form-control', 'rows' => 9]) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane" id="thoughts">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text">
                                                What's your <b>thoughts</b> on this internship?
                                            </h4>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                {!! Form::label('reasons', 'Reasons') !!}
                                                {!! Form::textarea('reasons', $reasons_guide, ['class' => 'form-control', 'rows' => '3']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('cultural_interaction', 'Cultural interaction') !!}
                                                {!! Form::textarea('cultural_interaction', $culture_guide, ['class' => 'form-control', 'rows' => '3']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                {!! Form::label('challenges', 'Challenges') !!}
                                                {!! Form::textarea('challenges', $challenge_guide, ['class' => 'form-control', 'rows' => '3']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end of cards definitions -->

                            </div>

                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                    {{--<input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name='finish' value='Finish' />--}}
                                    {!! Form::submit('Go to release liability', ['class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm', 'name' => 'finish']) !!}
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {{--</form>--}}
                            {!! Form::close() !!}
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->




    </div>


    <script src="/js/test/jquery-1.10.2.js"></script>
    <script src="/js/test/bootstrap.min.js"></script>
    <script src="/js/test/jquery.validate.min.js"></script>
    <script src="/js/test/jquery.bootstrap.wizard.js"></script>
    <script src="/js/test/wizard.js"></script>
@endsection
