<div class="row">
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
