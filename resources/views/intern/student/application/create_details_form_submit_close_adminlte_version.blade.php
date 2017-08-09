{!! Form::submit(
    'Go to release liability',
    [
        'class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm pull-left',
        'name' => 'save',
        'id' => 'save_button_application_details'
    ]) !!}        {{--<input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name='finish' value='Finish' />--}}
{!! Form::submit(
    'Go to release liability',
    [
        'class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm pull-right',
        'name' => 'submit',
        'id' => 'submit_button_application_details'
    ]) !!}
{{--</form>--}}
{!! Form::close() !!}