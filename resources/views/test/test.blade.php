@extends('layouts.app')
@section('content')


<link href="/css/app.css" rel="stylesheet">
<link href="/css/test/awesomplete.css" rel="stylesheet">


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
                null,
                ['placeholder' => 'please select internship country', 'id' => 'select_country']) !!}

{{--{!! Form::select('state',--}}
                {{--$states,--}}
                {{--0,--}}
                {{--['id' => 'select_state']) !!}--}}

{!! Form::text('state',
                null,
                ['id' => 'input_state']) !!}

{{--{!! Form::select('city',--}}
                {{--$cities,--}}
                {{--0,--}}
                {{--['id' => 'select_city']) !!}--}}



{!! Form::text('city',
                null,
                ['id' => 'input_city']) !!}



<script src="/js/app.js"></script>
<script src="/js/test/awesomplete.js"></script>


<script>

    $(document).ready(function () {

        var state_suggestions = new Awesomplete(document.getElementById('input_state'));
        var city_suggestions = new Awesomplete(document.getElementById('input_city'));
        var state_list = {};
        var city_list = [];



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#select_country').change(function () {
            //empty sub-level dropdowns
            $('#input_state').val('');
            $('#input_city').val('');
            state_list = {};
            var id = $('#select_country').val();
            console.log('country id changed to: ' + id);
            $.ajax({
                type: 'GET',
                url: '/test_ajax_organization',
                data: {'name': '*', 'url': '*'},
                dataType: 'json',
                success: function (returned_data) {
                    console.log(returned_data);
//                    length = returned_data.length;
//
//                    for (var i = 0; i < length; i++)
//                    {
//                        obj = returned_data[i];
//                        state_list[obj.region]=obj.id;
//                    }
//                    state_suggestions.list = Object.keys(state_list);
                }
            });

        });


        $('#input_state').focusout(function () {
            city_list = [];
            $('#input_city').val('');
            var state =  $(this).val();
            if(state.length > 0)
            {
                state = state[0].toUpperCase() + state.slice(1);
            }

            var id = state_list[state];
            console.log(id);

            $.ajax({
                type: 'GET',
                url: '/test_ajax_city',
                data: {'region_id': id},
                dataType: 'json',
                success: function (returned_data) {
                    length = returned_data.length;
                    for (var i = 0; i < length; i++)
                    {
                        obj = returned_data[i];
                        city_list.push(obj.city);
                    }


                    console.log(city_list);
                    city_suggestions.list = city_list;
                }
            });



        });



    });
</script>
@endsection