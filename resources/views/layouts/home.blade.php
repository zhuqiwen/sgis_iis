@extends('layouts.app')
@section('content')
    <?php
    $user = Auth::user();
//    $applications = \App\Models\InternApplication::where('user_id', $user->id)->get();
    ?>





    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">
    <link rel="stylesheet" href="/css/test/card.css">



    {{--<div class="image-container set-full-height" style="background-image: url('/img/wizard-europe.jpg')">--}}
    <div class="image-container set-full-height">
        <!--   Big container   -->
        <div class="container"  style="min-height: 100%;">
            @yield('card_rows')
        </div> <!--  big container -->
    </div>


    {{--<script src="/js/test/jquery-1.10.2.js"></script>--}}
    <script src="/js/test/jquery-2.2.4.min.js"></script>
    <script src="/js/test/bootstrap.min.js"></script>
    <script src="/js/test/jquery.validate.min.js"></script>
    <script src="/js/test/jquery.bootstrap.wizard.js"></script>
    <script src="/js/test/wizard.js"></script>
@endsection





{{--<script src="/js/test/jquery-2.2.4.min.js"></script>--}}
{{--<script src="/js/test/bootstrap.min.js"></script>--}}

{{--@endsection--}}
