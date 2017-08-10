
{!! Form::submit(
    'Tell us about your supervisor in this organization',
    [
        'class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm pull-right',
        'id' => 'submit_button_organization_info',
        'form' => 'create_application_organization_form',
        'name' => 'finish',
    ]) !!}

{!! Form::close() !!}
