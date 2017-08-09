@extends('adminlte::page')
@section('content')
    This is intern admin home
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


        $(document).ready(function () {
            //set up global csrf for ajax call
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            window.ApplicationFolio = {};
            ApplicationFolio.Ids = new Set();
            ApplicationFolio.ajaxApproveURL = '/intern/application/to_approve/ajax';
            ApplicationFolio.ajaxGroupURL = '/intern/application/to_group/ajax';







            window.ApplicationMenus = {};
            window.ApplicationGroupByAjaxConfigrations = {};
            window.ApplicationGroupByAjaxCurrentConfigration = '';
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
        });

        //
        $(document).on('click', '.sidebar-menu a', function(e){
            e.preventDefault();
            var key = $(this).attr('href');
            if(typeof ApplicationGroupByAjaxConfigrations[key] != 'undefined')
            {
                $.ajax(ApplicationGroupByAjaxConfigrations[key]);

                ApplicationGroupByAjaxCurrentConfigration = ApplicationGroupByAjaxConfigrations[key];

                console.log($(this).parent().siblings('.active').removeClass('active'));
                $(this).parent().addClass('active');

            }
        });

        $(document).on('click', '#float-card', function (e) {
            console.log(ApplicationGroupByAjaxCurrentConfigration);


            var currentCardId = $(this).find('div:first').attr('id');
//            console.log($(this).parent());
            if (ApplicationFolio.Ids.has(currentCardId))
            {
                $('.removeFromFolio').show();
                $('.addToFolio').hide();
            }
            else
            {
                $('.removeFromFolio').hide();
                $('.addToFolio').show();
            }

            var doc_id = $(this).parent().attr('data-target').split('#').pop();
            console.log(doc_id);

            $('.embedded-map').attr('id', 'map_' + doc_id)
            $('#map_'+currentCardId).attr('id', 'map_' + doc_id)
            var application_id = doc_id.split('_')[1];

            var address = $('#address_' + application_id).text();


            loadScript(doc_id, address);
        });

        $(document).on('click', '.addToFolio', function (e) {
            console.log(ApplicationFolio.Ids);
            ApplicationFolio.Ids.add(this.id);
            //set the card as selected by showing font-awsome check icon

            $('#iconCheck_' + this.id).removeClass('hide');
            if (ApplicationFolio.Ids.size == 0)
            {
                $('#submit_approval_folio').text('No application selected');
            }
            else
            {
                $('#submit_approval_folio').text('Approve ' + ApplicationFolio.Ids.size + ' applications');
            }
        });

        $(document).on('click', '.removeFromFolio', function (e) {
            console.log(ApplicationFolio.Ids);
            ApplicationFolio.Ids.delete(this.id);
            //set the card as selected by showing font-awsome check icon

            $("#iconCheck_" + this.id).addClass('hide');
            if (ApplicationFolio.Ids.size == 0)
            {
                $('#submit_approval_folio').text('No application selected');
            }
            else
            {
                $('#submit_approval_folio').text('Approve ' + ApplicationFolio.Ids.size + ' applications');
            }
        });

        $(document).on('click', '#submit_approval_folio', function (e) {
//                    e.preventDefault();
            if (window.ApplicationFolio.Ids.size == 0)
            {
                alert('no application selected');
            }
            else
            {
                var confirm_content = ApplicationFolio.Ids.size + ' applications will be approved?\n';
                ApplicationFolio.Ids.forEach(function (value) {
                    confirm_content += 'Application ID: ' + value + '\n';
                });
                if (confirm(confirm_content))
                {

                    $.ajax({
                        type: 'POST',
                        url: ApplicationFolio.ajaxApproveURL,
                        data: {'application_ids': Array.from(ApplicationFolio.Ids)},
                        success: function (returned_data) {
                            console.log(returned_data);
//                                    alert(ApplicationFolio.Ids.size + ' applications successfully approved');
                            alert(returned_data.size + ' applications successfully approved');
//                            ajaxLoadGroupBy(
//                                ApplicationFolio.ajaxGroupURL,
//                                {'field': ApplicationFolio.currentGroupByField, 'is_approved': 0, 'is_submitted': 1}
//                            );
                            $.ajax(ApplicationGroupByAjaxCurrentConfigration);

                            ApplicationFolio.Ids.clear();
                            $('#submit_approval_folio').text('No application selected');

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(xhr.responseText);
                            console.log(thrownError);
                        }
                    });
                }
            }
        });
    </script>
@stop





