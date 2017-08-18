{!! Form::submit(
    'Give us some other details',
    [
        'class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm pull-right',
        'id' => 'submit_button_supervisor_info',
        'form' => 'create_application_supervisor_form',
        'name' => 'finish'
    ]) !!}
{!! Form::close() !!}