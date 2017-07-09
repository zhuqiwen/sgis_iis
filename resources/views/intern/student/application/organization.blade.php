

here using js in the frontend to check if the organization exists in DB

if it does, just pass the id to next view, the supervisor page

if not, call insert method of InternOrganizationController to insert a new record
and pass  id, to supervisor page.

We can use insertGetId method in the model to get the id of the newly-inserted record

{!! Form::open(['action' => 'InternOrganizationController@store']) !!}





{!! Form::label('organization_name', 'Organization') !!}
{!! Form::text('organization_name') !!}

{{--here need to check if the url is legal--}}
{!! Form::label('organization_url', 'Organization Website') !!}
{!! Form::text('organization_url') !!}

{!! Form::submit('next') !!}
{!! Form::close() !!}







