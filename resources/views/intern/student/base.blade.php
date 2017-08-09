@extends('adminlte::page')
@section('content')
    This is student home
@stop

@section('js')
    <script>
        var map_id = '';
        var map_address = '';
        function initMap()
        {

            console.log("current map id: " + map_id);
            console.log("current address: " + map_address);
            console.log('++++++++++++++++');
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': map_address}, function(results, status){
                if(status == google.maps.GeocoderStatus.OK)
                {
                    var center = results[0].geometry.location;
//                    console.log(center.lat());
//                    console.log(center.lng());

                    center = {lat: center.lat(), lng: center.lng()};
                    var map = new google.maps.Map(document.getElementById(map_id), {
                        zoom: 4,
                        center: center,
                        scrollwheel: false

                    });
                    var marker = new google.maps.Marker({
                        position: center,
                        map: map
                    });

                    console.log(map_id);


                    $('.modal').on('shown.bs.modal', function(){
                        console.log('modal is fully shown');
                        google.maps.event.trigger(map, "resize");
                        map.setCenter(center);
                    });
                }
            });

        }
        // on each click on float card, call this function to load google's url map api
        function loadScript(doc_id, address)
        {
            var script_id = 'google_map_api_js';
            //first remove previously added script tag
            $('#' + script_id).remove();
            //then re-add it and update map div's map id.
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.id = script_id;
            map_id = 'map_' + doc_id;
            map_address = address;
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA5m_w_hNJuMtBTsSz06VteC1msQIzDRGs&callback=initMap';
            document.body.appendChild(script);

        }


        function ajaxLoadGroupBy(url, data) {
            $.ajax({
                type: 'GET',
                url: url,
                data: data,
                dataType: 'json',
                success: function (data) {
                    console.log(data.tabs);
                    $("#tabs").html(data.tabs);
                    $("#tab-contents").html(data.contents);
                    showHomeLinkIfNoApplication();

                }
            });
        }
        function showHomeLinkIfNoApplication() {
            if ($('.container .float-card').length == 0)
            {
                $("#tab-contents").html('' +
                    '<div style="text-align: center">' +
                    '<p>No Application Needs To Be Approved. ' +
                    '<a href="/home" style="text-decoration: underline;">Click Here</a> to go to Home screen</p>' +
                    '</div>');
            }
        }


        // prepare configurations for ajas calls on this page
        $(document).ready(function () {
            //set up global csrf for ajax call
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            window.ApplicationMenus = {};
            window.AjaxConfigrations = {};
            window.AjaxCurrentConfigration = '';
            var menus = $('.sidebar-menu a');
            for(var i = 0; i < menus.length; i++)
            {
                var url = menus[i].href;

                var configuration = {
                    type:'GET',
                    url: url,
                    data: {},
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

                AjaxConfigrations[url] = configuration;
            }
        });

        //
        $(document).on('click', '.sidebar-menu a', function(e){
            e.preventDefault();
            var key = $(this).attr('href');
            if(typeof AjaxConfigrations[key] != 'undefined')
            {
                $.ajax(AjaxConfigrations[key]);

                AjaxCurrentConfigration = AjaxConfigrations[key];

                console.log($(this).parent().siblings('.active').removeClass('active'));
                $(this).parent().addClass('active');

            }
        });

        $(document).on('click', '#understand_button_internship_application_process', function(){
            $(this).parent()
                .siblings('.box-header')
                .find('i')
                .removeClass('fa-minus')
                .addClass('fa-plus');
            $('#box_organization').find('.btn-box-tool').prop('disabled', false);
            $('#box_organization').find('.btn-box-tool').trigger('click');
        });

        $(document).on('click', '#submit_button_organization_info', function(e){
            e.preventDefault();
            console.log('org info submit button clicked');
            //ajax submit

            //collapse current, and enable and expand next
            $('#box_organization').find('.btn-box-tool').trigger('click');
            $('#box_supervisor').find('.btn-box-tool').prop('disabled', false);
            $('#box_supervisor').find('.btn-box-tool').trigger('click');

        });

        $(document).on('click', '#submit_button_supervisor_info', function(e){
            e.preventDefault();
            console.log('supervisor button clicked');

            //ajax submit

            //collapse current, and enable and expand next
            $('#box_supervisor').find('.btn-box-tool').trigger('click');
            $('#box_application').find('.btn-box-tool').prop('disabled', false);
            $('#box_application').find('.btn-box-tool').trigger('click');
        });


    </script>
@stop




