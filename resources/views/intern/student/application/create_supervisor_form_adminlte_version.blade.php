<?php
    $org_id = 1;
?>

{!! Form::open(['action' => 'InternSupervisorController@store']) !!}
{!! Form::hidden('organization_id', $org_id) !!}

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('first_name', 'First name') !!}
            {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'input_first_name']) !!}

        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('last_name', 'Last name') !!}
            {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'input_last_name']) !!}
        </div>
    </div>

    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('prefix', 'prefix') !!}
            {!! Form::text('prefix', null, ['class' => 'form-control', 'id' => 'input_prefix']) !!}

        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('email', 'email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('phone_country_code', 'country code (country name)') !!}
            {!! Form::text('phone_country_code', null, ['class' => 'form-control', 'id' => 'input_country_code']) !!}

        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('phone', 'phone #') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>
    </div>

</div>


