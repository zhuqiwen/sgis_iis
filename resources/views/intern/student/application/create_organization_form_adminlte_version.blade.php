<?php
$organization_types = [
    'type 1' => 'type 1',
    'type 2' => 'type 2',
    'type 3' => 'type 3',
]
?>



{!! Form::open(['action' => 'InternOrganizationController@store']) !!}
<div class="row">
     <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('name', 'Organization name') !!}
            {!! Form::text('name', 'Please do not use any abbreviation, such as IBM', ['id' => 'input-org-name','class' => 'form-control']) !!}

        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {{--here need to check if the url is legal--}}
            {!! Form::label('url', 'Organization Website URL') !!}
            {!! Form::text('url', 'https://', ['id' => 'input-org-url', 'class' => 'form-control']) !!}
            <br>
        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
            {!! Form::label('type', 'What type the organization is?') !!}
            {!! Form::select('type', $organization_types, NULL, ['class' => 'form-control']) !!}
            <br>
        </div>
    </div>

</div>

