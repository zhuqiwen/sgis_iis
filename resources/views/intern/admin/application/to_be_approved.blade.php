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
    </style>


    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div id="group-title">
                        <h3 id="current-grouper">Applications to be approved</h3>
                    </div>


                    <div class="panel-heading">
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="active"><a href="#default" data-toggle="tab">most recently submitted first</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
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
        $(document).ready(function(){
            $(function(){
                $(".approve_group_by").click(function (e) {
                    e.preventDefault();
                    var value = this.id.replace('groupBy', '').toLowerCase();
                    $("#current-grouper").html('Application Grouped by ' + '<u>' + this.text + '</u>');
                    console.log("jo");
                    var get_url = '/test_ajax';
                    $.ajax({
                        type: 'GET',
                        url: get_url,
                        data: {'field': value, 'is_approved': 0, 'is_submitted': 1},
                        dataType: 'json',
                        success: function (data) {
                            console.log(data.tabs);
                            $("#tabs").html(data.tabs);
                            $("#tab-contents").html(data.contents);

                        }

                    });
                });
            });
        });
    </script>


@endsection