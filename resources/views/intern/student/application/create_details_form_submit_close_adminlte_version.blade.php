
{{--click save button to save current info and refresh whole page which will load the home content--}}
{!! Form::submit(
    'Save',
    [
        'class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm pull-left',
        'name' => 'save',
        'id' => 'save_button_application_details'
    ]) !!}

{!! Form::submit(
    'Go to release liability',
    [
        'class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm pull-right',
        'name' => 'submit',
        'id' => 'submit_button_application_details'
    ]) !!}


{{--</form>--}}
{!! Form::close() !!}