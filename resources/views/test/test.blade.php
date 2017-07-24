@extends('layouts.app')
@section('content')


<link href="/css/app.css" rel="stylesheet">
<link href="/css/test/magicsuggest-min.css" rel="stylesheet">


<?PHP
        $data = \App\Models\Country::all();
        $countries = [];
        $index = 0;
        foreach ($data as $country)
            {
                $index ++;
                $countries[$index] = $country->country;
            }



        $states = [];
        $cities = [];
?>
{!! Form::select('country',
                $countries,
                0,
                ['id' => 'select_country']) !!}

{!! Form::select('state',
                $states,
                0,
                ['id' => 'select_state']) !!}

{!! Form::select('city',
                $cities,
                0,
                ['id' => 'select_city']) !!}


{!! Form::text('test_input',
                NULL,
                ['id' => 'test_input']) !!}




<script src="/js/app.js"></script>
<script src="/js/test/magicsuggest-min.js"></script>

<script>

    $(document).ready(function () {



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#select_country').change(function () {
            //empty sub-level dropdowns
            $('#select_state').html('');
            $('#select_city').html('');
            var id = $('#select_country').val();
            $.ajax({
                type: 'GET',
                url: '/test_ajax_state',
                data: {'country_id': id},
                dataType: 'json',
                success: function (returned_data) {
                    console.log(returned_data);

                    options = '';

                    length = returned_data.length;
                    for (var i = 0; i < length; i++)
                    {
                        obj = returned_data[i];
                        options += '<option value=' + obj.id + '>' + obj.region + '</option>';
                    }


                    $('#select_state').html(options);
                }
            });

        });


        $('#select_state').change(function () {
            $('#select_city').html('');
            var id = $('#select_state').val();
            $.ajax({
                type: 'GET',
                url: '/test_ajax_city',
                data: {'state_id': id},
                dataType: 'json',
                success: function (returned_data) {
                    console.log(returned_data);

                    options = '';

                    length = returned_data.length;
                    for (var i = 0; i < length; i++)
                    {
                        obj = returned_data[i];
                        options += '<option value=' + obj.id + '>' + obj.city + '</option>';
                    }


                    $('#select_city').html(options);
                }
            });

        });

        $('#test_input').on('input', function () {
           console.log($(this).val());
        });



    });
</script>
@endsection