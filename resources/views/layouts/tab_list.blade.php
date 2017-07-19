@extends('layouts.app')
@section('content')
    <link href="/css/test/bootstrap.min.css" rel="stylesheet">
    <link href="/css/test/tab_list.css" rel="stylesheet">






    {{--<link rel="stylesheet" href="/css/test/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="/css/test/demo.css">--}}
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">

    {{--<div class="image-container set-full-height" style="background-image: url('/img/wizard-europe.jpg')">--}}
    <div class="image-container set-full-height">
        <!--   Big container   -->
        <div class="container"  style="min-height: 100%;">
{{--            @yield('a_hyperlink')--}}
            <div class="row" style="margin-top: 10%;">
                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul id="tabs" class="nav nav-tabs">
{{--                                @yield('tabs')--}}

                            </ul>
                        </div>
                        <div class="panel-body">
                            <div id="tab-contents" class="tab-content">
{{--                                @yield('tab-contents')--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!--  big container -->
    </div>


    {{--<script src="/js/test/jquery-1.10.2.js"></script>--}}
    <script src="/js/test/jquery-2.2.4.min.js"></script>
    <script src="/js/test/bootstrap.min.js"></script>



@endsection





{{--<script src="/js/test/jquery-2.2.4.min.js"></script>--}}
{{--<script src="/js/test/bootstrap.min.js"></script>--}}

{{--@endsection--}}
