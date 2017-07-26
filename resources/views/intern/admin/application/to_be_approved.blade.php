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
                                <h3 id="current-grouper">Applications to be approved</h3>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" id="submit_approval_folio" href="#">No application selected</a>
                            </div>
                        </div>
                    </div>


                    <div class="panel-heading">
                        <ul id="tabs" class="nav nav-tabs">

                            {{--<li class="active"><a href="#default" data-toggle="tab">most recently submitted first</a></li>--}}
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
                                        foreach ($applications as $application)
                                        {
                                            echo \app\Helpers\HTMLSnippet::generateFloatCardWithModal($application);
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
                        '<div style="align-content: center">' +
                        '<p>No Application Needs To Be Approved. ' +
                        '<a href="/home" style="text-decoration: underline;">Click Here</a> to go to Home screen</p>' +
                        '</div>');
            }
        }



        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            showHomeLinkIfNoApplication();


            $(function(){
                //to store ids of applications to be approved
                window.ApplicationFolio = {};
                window.Applications = {};


                ApplicationFolio.Ids = new Set();
                ApplicationFolio.ajaxUrl = '/intern/ajax';
                ApplicationFolio.currentGroupByField = 'all';
//                console.log("hahaha");


                $(".approve_group_by").click(function (e) {
                    e.preventDefault();
                    ApplicationFolio.currentGroupByField = this.id.replace('groupBy', '').toLowerCase();
                    $("#current-grouper").html('Application Grouped by ' + '<u>' + this.text + '</u>');
                    if(ApplicationFolio.currentGroupByField == 'all')
                    {
                        $("#current-grouper").html('All applications to be approved');

                    }
                    var data = {'field': ApplicationFolio.currentGroupByField, 'is_approved': 0, 'is_submitted': 1};
                    window.ajaxLoadGroupBy(ApplicationFolio.ajaxUrl, data);
                });



                $("#submit_approval_folio").click(function (e) {
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
                            post_data = {'application_ids': Array.from(ApplicationFolio.Ids)};
                            $.ajax({
                                type: 'POST',
                                url: ApplicationFolio.ajaxUrl,
                                data: post_data,
                                success: function (returned_data) {
                                    console.log(returned_data);
//                                    alert(ApplicationFolio.Ids.size + ' applications successfully approved');
                                    alert(returned_data.size + ' applications successfully approved');
                                    ajaxLoadGroupBy(
                                            ApplicationFolio.ajaxUrl,
                                            {'field': ApplicationFolio.currentGroupByField, 'is_approved': 0, 'is_submitted': 1}
                                    );
                                    ApplicationFolio.Ids.clear();
                                    $('#submit_approval_folio').text('No application selected');

                                }
                            });
                        }
                    }
                });
            });
        });

        $(document).on('click', '#float-card', function (e) {
            var currentCardId = $(this).find('div:first').attr('id');
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
    </script>


@endsection