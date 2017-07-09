<?php
echo '<pre>';
print_r(session('data'));
exit();

$user_id = Auth::user()->id;
$organization_id = 55;
$supervisor_id = 55;
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

{!! Form::open(['action' => 'InternApplicationController@releaseLiability']) !!}
{{--{!! Form::hidden('user_id', $user_id) !!}--}}
{!! Form::hidden('user_id', $user_id) !!}
{!! Form::hidden('organization_id', $organization_id) !!}
{!! Form::hidden('supervisor_id', $supervisor_id) !!}

{!! Form::label('intern_year', 'Academic Year') !!}
{!! Form::select('intern_year', ['2017' => '2017', '2018'=> '2018'], '2017') !!}
<br>
{!! Form::label('intern_term', 'Internship Term') !!}
{!! Form::select('intern_term',
                ['Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'],
                null,
                ['placeholder' => 'please select the term']) !!}
<br>
{!! Form::label('is_paid', 'Is this internship with any payment?') !!}<br>
{!! Form::radio('is_paid', 'true') !!}yes
{!! Form::radio('is_paid', 'false') !!}no <br>

{!! Form::label('intern_country', 'Internship Country') !!}
{!! Form::select('intern_country',
                  $countries,
                  null,
                  ['placehoulder' => 'please select internship country']) !!}
<br>
{!! Form::label('intern_state', 'Internship State/Province') !!}
{!! Form::select('intern_state',
                  $states,
                  null,
                  ['placehoulder' => 'please select internship state/province']) !!}
<br>
{!! Form::label('intern_city', 'Internship City') !!}
{!! Form::select('intern_city',
                  $cities,
                  null,
                  ['placehoulder' => 'please select internship city']) !!}
<br>
{!! Form::label('intern_street', 'Internship street') !!}
{!! Form::text('intern_street') !!}
<br>

{!! Form::label('credit_hours', 'Credit Hours Desired') !!}
{!! Form::select('credit_hours',
                  $credit_hours,
                  '0') !!}
<br>

{!! Form::label('budget_airfare', 'Budget: Airfare') !!}
{!! Form::number('budget_airfare', '0') !!}
<br>
{!! Form::label('budget_living', 'Budget: Living cost per day') !!}
{!! Form::number('budget_living', '0') !!}
<br>
{!! Form::label('budget_accommodation', 'Budget: Accommodation') !!}
{!! Form::number('budget_accommodation', '0') !!}
<br>

{!! Form::label('work_hours', 'Work hours per week') !!}
{!! Form::number('work_hours', '0') !!}
<br>

{!! Form::label('work_schedule', 'please briefly describe your anticipated work schedule') !!}
{!! Form::textarea('work_schedule') !!}
<br>
{!! Form::label('work_description', 'Provide a detailed description of the internship experience and your specific duties') !!}
{!! Form::textarea('work_description') !!}
<br>
{!! Form::label('intern_reasons', 'Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals):') !!}
{!! Form::textarea('intern_reasons') !!}
<br>
{!! Form::label('intern_cultural_interaction', 'Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals):') !!}
{!! Form::textarea('intern_cultural_interaction') !!}
<br>

{!! Form::label('intern_challenges', 'Detail any challenges you expect to face durin  the internship and explain how you intend to face these challenges:') !!}
{!! Form::textarea('intern_challenges') !!}
<br>



{!! Form::submit('review') !!}
{!! Form::close() !!}





