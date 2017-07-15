this template is used to review application before submission



{!! Form::open(['action' => 'InternApplicationController@submit']) !!}
{!! Form::hidden('application_id', $application->id) !!}
{!! Form::submit('submit') !!}
{!! Form::close() !!}