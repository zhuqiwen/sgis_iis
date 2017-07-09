
here using js in the frontend to check if the supervisor exists in DB

if it does, just pass the id and organization id to the application creation page

if not, call insert method of InternSupervisorController to insert a new record
and pass  id and organization id, to next page.

We can use insertGetId method in the model to get the id of the newly-inserted record

<?php
$org_id = session('org_id');
?>

{!! Form::open(['action' => 'InternSupervisorController@store']) !!}

{!! Form::label('supervisor_first_name', 'First name') !!}
{!! Form::text('supervisor_first_name') !!}

{!! Form::label('supervisor_last_name', 'Last name') !!}
{!! Form::text('supervisor_last_name') !!}

{!! Form::label('supervisor_prefix', 'prefix') !!}
{!! Form::text('supervisor_prefix') !!}

{!! Form::label('supervisor_email', 'email') !!}
{!! Form::text('supervisor_email') !!}

{!! Form::label('supervisor_phone_country_code', 'phone: country code') !!}
{!! Form::text('supervisor_phone_country_code') !!}

{!! Form::label('supervisor_phone', 'phone #') !!}
{!! Form::text('supervisor_phone') !!}

{!! Form::hidden('org_id', $org_id) !!}

{!! Form::submit('next') !!}
{!! Form::close() !!}







