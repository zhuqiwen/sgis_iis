<?php
$countries = [
    'country 1',
    'country 2',
    'country 3',
    'country 4',
];
?>
<div class="row">
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
