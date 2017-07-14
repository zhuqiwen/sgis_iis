<?php


$user_id = Auth::user()->id;

$organization_id = (int)session('data')['org_id'];


$supervisor_id = (int)session('data')['supervisor_id'];
//$supervisor_id = 55;
$countries = [
        'country 1' => 'country 1',
        'country 2' => 'country 2',
];
$states = [
        'state 1' => 'state 1',
        'state 2' => 'state 2',
];
$cities = [
        'city 1' => 'city 1',
        'city 2' => 'city 2',
];

$credit_hours = [
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
];
?>

{!! Form::open(['action' => 'InternApplicationController@prepareLiability']) !!}
{{--{!! Form::hidden('user_id', $user_id) !!}--}}
{!! Form::hidden('user_id', $user_id) !!}
{!! Form::hidden('organization_id', $organization_id) !!}
{!! Form::hidden('supervisor_id', $supervisor_id) !!}
{!! Form::hidden('is_approved', 0) !!}
{!! Form::hidden('is_submitted', 0) !!}

{{--//temporarily set to false--}}
{!! Form::hidden('country_warning', 0) !!}

{!! Form::label('year', 'Academic Year') !!}
{!! Form::select('year', ['2017' => '2017', '2018'=> '2018'], '2017') !!}
<br>
{!! Form::label('term', 'Internship Term') !!}
{!! Form::select('term',
                ['Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'],
                null,
                ['placeholder' => 'please select the term']) !!}
<br>
{!! Form::label('paid_internship', 'Is this internship with any payment?') !!}<br>
{!! Form::radio('paid_internship', 1) !!}yes
{!! Form::radio('paid_internship', 0) !!}no <br>

{!! Form::label('country', 'Internship Country') !!}
{!! Form::select('country',
                  $countries,
                  null,
                  ['placehoulder' => 'please select internship country']) !!}
<br>
{!! Form::label('state', 'Internship State/Province') !!}
{!! Form::select('state',
                  $states,
                  null,
                  ['placehoulder' => 'please select internship state/province']) !!}
<br>
{!! Form::label('city', 'Internship City') !!}
{!! Form::select('city',
                  $cities,
                  null,
                  ['placehoulder' => 'please select internship city']) !!}
<br>
{!! Form::label('street', 'Internship street') !!}
{!! Form::text('street') !!}
<br>

{!! Form::label('credit_hours', 'Credit Hours Desired') !!}
{!! Form::select('credit_hours',
                  $credit_hours,
                  '0') !!}
<br>

{!! Form::label('depart_date', 'Departure date') !!}
{!! Form::date('depart_date', \Carbon\Carbon::now()) !!}

<br>

{!! Form::label('return_date', 'Return date') !!}
{!! Form::date('return_date', \Carbon\Carbon::now()) !!}

<br>

{!! Form::label('start_date', 'Start date') !!}
{!! Form::date('start_date', \Carbon\Carbon::now()) !!}

<br>

{!! Form::label('end_date', 'End date') !!}
{!! Form::date('end_date', \Carbon\Carbon::now()) !!}

<br>

{!! Form::label('budget_airfare', 'Budget: Airfare') !!}
{!! Form::number('budget_airfare', '0') !!}
<br>
{!! Form::label('budget_living_per_day', 'Budget: Living cost per day') !!}
{!! Form::number('budget_living_per_day', '0') !!}
<br>
{!! Form::label('budget_accommodation', 'Budget: Accommodation') !!}
{!! Form::number('budget_accommodation', '0') !!}
<br>

{!! Form::label('work_hours_per_week', 'Work hours per week') !!}
{!! Form::number('work_hours_per_week', '0') !!}
<br>

{!! Form::label('work_schedule', 'please briefly describe your anticipated work schedule') !!}
{!! Form::textarea('work_schedule') !!}
<br>
{!! Form::label('description', 'Provide a detailed description of the internship experience and your specific duties') !!}
{!! Form::textarea('description') !!}
<br>
{!! Form::label('reasons', 'Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals):') !!}
{!! Form::textarea('reasons') !!}
<br>
{!! Form::label('cultural_interaction', 'Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals):') !!}
{!! Form::textarea('cultural_interaction') !!}
<br>

{!! Form::label('challenges', 'Detail any challenges you expect to face durin  the internship and explain how you intend to face these challenges:') !!}
{!! Form::textarea('challenges') !!}
<br>



{!! Form::submit('review') !!}
{!! Form::close() !!}





