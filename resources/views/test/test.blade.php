@extends('layouts.app')
@section('content')

    <link href="/css/test/bootstrap.min.css" rel="stylesheet">
    <link href="/css/test/tab_list.css" rel="stylesheet">
    <link href="/css/test/card.css" rel="stylesheet">




    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="active"><a href="#default" data-toggle="tab"></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div id="tab-contents" class="tab-content">
                            <div class="tab-pane fade in active" id="default">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-md-4" style="margin-top: 5%;">
                                            <a href="#" data-toggle="modal" data-target="#myModal">
                                                <div id="float-card" class="col-md-10 col-md-offset-1 float-card">
                                                    <div class="title">
                                                        <h3>
                                                            title_left
                                                        </h3>
                                                    </div>
                                                    <div class="text">
                                                        <p>
                                                            text_left
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Modal Header</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Some text in the modal.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-4" style="margin-top: 5%;">
                                            <a href="#">
                                                <div id="float-card" class="col-md-10 col-md-offset-1 float-card">
                                                    <div class="title">
                                                        <h3>
                                                            title_left
                                                        </h3>
                                                    </div>
                                                    <div class="text">
                                                        <p>
                                                            text_left
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 5%;">
                                            <a href="#">
                                                <div id="float-card" class="col-md-10 col-md-offset-1 float-card">
                                                    <div class="title">
                                                        <h3>
                                                            title_left
                                                        </h3>
                                                    </div>
                                                    <div class="text">
                                                        <p>
                                                            text_left
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4" style="margin-top: 5%;">
                                            <a href="#">
                                                <div id="float-card" class="col-md-10 col-md-offset-1 float-card">
                                                    <div class="title">
                                                        <h3>
                                                            title_left
                                                        </h3>
                                                    </div>
                                                    <div class="text">
                                                        <p>
                                                            text_left
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>




                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    {{--<script src="/js/test/jquery-2.2.4.min.js"></script>--}}
    {{--<script src="/js/test/bootstrap.min.js"></script>--}}
    {{--<script src="/js/test/bootstrap.min.js"></script>--}}



@endsection