@extends('adminlte::page')
@section('content')
    This is intern admin home
@stop


@section('js')
    <script>
        $(document).ready(function () {
            window.ApplicationMenus = {};
            window.ApplicationGroupByAjaxConfigrations = {};
            var menus = $('.sidebar-menu a');
            for(var i = 0; i < menus.length; i++)
            {
                var currentURL = menus[i].href;
                var split = currentURL.split('/');
                var url, field;
                if(split[split.length - 1].endsWith('#'))
                {
                    url = '#';
                    field = '';
                }
                else
                {
                    url = split.slice(0, -1).join('/');
                    field = split[split.length - 1];
                }
                var configuration = {
                    type:'GET',
                    url: url,
                    data: {'field': field},
                    dataType: 'html',
                    success: function(returned_data){
                        $('.content').html(returned_data);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }

                };

                ApplicationGroupByAjaxConfigrations[currentURL] = configuration;
            }
            console.log(ApplicationGroupByAjaxConfigrations);
        });
        $(document).on('click', '.sidebar-menu a', function(e){
            e.preventDefault();
            var key = $(this).attr('href');
            if(typeof ApplicationGroupByAjaxConfigrations[key] != 'undefined')
            {
                $.ajax(ApplicationGroupByAjaxConfigrations[key]);

            }
//            $.ajax({
//                type: 'GET',
//                url: '/admin/internship/application/ajax_to_approve',
//                data: {},
//                dataType: 'html',
//                success: function(returned_data){
////                    console.log(returned_data);
//                    $('.content').html(returned_data);
//                },
//                error: function (xhr, ajaxOptions, thrownError) {
//                    console.log(xhr.status);
//                    console.log(xhr.responseText);
//                    console.log(thrownError);
//                }
//            });
        });
    </script>
@stop





