@extends('layouts.app')
@section('content')

    <?php
            $success = 'success';
    ?>

    <link href="/css/test/bootstrap.min.css" rel="stylesheet">
    <link href="/css/test/tab_list.css" rel="stylesheet">
    <link href="/css/test/card.css" rel="stylesheet">

    <style>
        #group-title {
            text-align: center;
        }
        .equal-height {
            display: flex;
            flex-wrap: wrap;
        }

        .modal-dialog  {width:75%;}

    </style>


    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-12" style="padding-bottom: 30px;">
                <div class="panel with-nav-tabs panel-default">
                    <div id="group-title">
                        <div class="row equal-height">
                            <div class="col-md-6 col-md-offset-3">
                                <h3 id="current-grouper">Finished Internships by Today</h3>
                            </div>
                        </div>
                    </div>


                    <div class="panel-heading">
                        <ul id="tabs" class="nav nav-tabs">

                            <?php
                                echo \app\Helpers\HTMLSnippet::generateApplicationGroupTab('All', TRUE);
                            ?>

                        </ul>
                    </div>
                    <div class="panel-body" style="height: 70vh; overflow: scroll;">
                        <div id="tab-contents" class="tab-content">

                            <div class="tab-pane fade in active" id="default">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        foreach ($internships as $internship)
                                        {
                                            echo \app\Helpers\HTMLSnippet::generateInternshipFloatCardWithModal($internship);
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script src="/js/test/jquery-2.2.4.min.js"></script>
    {{--<script src="/js/test/bootstrap.min.js"></script>--}}
    {{--<script src="/js/app.js"></script>--}}


    <script>

        function showHomeLinkIfNoCard() {
            if ($('.container .float-card').length == 0)
            {
                $("#tab-contents").html('' +
                        '<div style="text-align: center">' +
                        '<p>No Internship Needs To Be Closed. ' +
                        '<a href="/home" style="text-decoration: underline;">Click Here</a> to go to Home screen</p>' +
                        '</div>');
            }
        }



        // this variable is used to pass data into the initMap()
        var map_id = '';
        var map_address = '';



        function initMap()
        {

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': map_address}, function(results, status){
                if(status == google.maps.GeocoderStatus.OK)
                {
                    var center = results[0].geometry.location;
//                    console.log(center.lat());
//                    console.log(center.lng());

                    center = {lat: center.lat(), lng: center.lng()};
                    var map = new google.maps.Map(document.getElementById(map_id), {
                        zoom: 8,
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
        function loadScript(internship_id, address)
        {
            var script_id = 'google_map_api_js';
            //first remove previously added script tag
            $('#' + script_id).remove();
            //then re-add it and update map div's map id.
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.id = script_id;
            map_id = 'map_' + internship_id;
            map_address = address;
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA5m_w_hNJuMtBTsSz06VteC1msQIzDRGs&callback=initMap';
            document.body.appendChild(script);

        }



        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            showHomeLinkIfNoCard();

            var form_id = '#sgis_opinions_form';

            var form = $(form_id);

            $(document).on('click', 'button.closeInternship', function(e){
                e.preventDefault();
                console.log('close button is clicked');
                console.log('form data: ' + form.serialize());
                console.log('form action: ' + form.attr('action'));
                console.log('form method: ' + form.attr('method'));

                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(returned_data){
                        console.log(returned_data);
                        alert('the internship is closed and archived');
                        location.reload();

                    }
                });


            });

            $(document).on('click', '#float_card_a', function(){

                var internship_id = $(this).attr('data-target');
                internship_id = internship_id.split('_')[1];
                var address = $('#address_' + internship_id).text();
                loadScript(internship_id, address);


            });



        });

    </script>



@endsection