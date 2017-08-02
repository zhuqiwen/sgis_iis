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

        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
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
                        alert('the internship' +  + 'is closed and archived')
                        location.reload();

                    }
                });


            });



        });

    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5m_w_hNJuMtBTsSz06VteC1msQIzDRGs&callback=initMap">
    </script>

@endsection