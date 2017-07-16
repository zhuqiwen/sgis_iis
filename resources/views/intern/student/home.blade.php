@extends('layouts.app')
@section('content')
<?php
$user = Auth::user();
$applications = \App\Models\InternApplication::where('user_id', $user->id)->get();
?>





    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">
    {{--<link rel="stylesheet" href="/css/test/gsdk-base.css">--}}
    <link rel="stylesheet" href="/css/test/card.css">



    {{--<div class="image-container set-full-height" style="background-image: url('/img/wizard-europe.jpg')">--}}
    <div class="image-container set-full-height">
        <!--   Big container   -->
        <div class="container"  style="min-height: 100%;">
            <div class="row" style="margin-top: 10%">
                <div class="col-sm-12">

                    {{--shows info of student, such as--}}


                    {{--<p>--}}
                    {{--Hi, {!! $user->first_name !!}--}}
                    {{--</p>--}}

                    {{--<p>--}}
                    {{--@if($applications->where('is_submitted', 0)->count() === 0)--}}
                    {{--you have no application that needs to be submitted--}}
                    {{--@else--}}
                    {{--{!! $applications->where('is_submitted', 0)->count() !!} application(s) need to be submitted.--}}
                    {{--@endif--}}


                    {{--</p>--}}
                    {{--<p>--}}
                    {{--things to do, such as submitting journal, and site evaluation--}}
                    {{--</p>--}}
                    {{--<p>--}}
                    {{--other info--}}
                    {{--</p>--}}

                    {{--四个section entries：<br>--}}
                    {{--internship applications<br>--}}
                    {{--qualified scholarships<br>--}}
                    {{--internship journals & evaluations<br>--}}
                    {{--successful stories(brows past internship site evaluations)<br>--}}



                    {{--<a href="student/application/organization">Create a new internship application</a>--}}


                    <a href="internship_manage.html"><div id="float-card" class="col-md-5 float-card">
                            <h3>
                                Student Internship Management
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. </p>
                        </div></a>
                    <a href="alum_manage.html"><div id="float-card" class="col-md-5 col-md-offset-2 float-card">
                            <h3>
                                Alum Management
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. </p>
                            </p>
                        </div></a>


                </div>
            </div> <!-- row -->
            <div class="row" style="margin-top: 5%;">
                <div class="col-sm-12">

                    {{--shows info of student, such as--}}


                    {{--<p>--}}
                    {{--Hi, {!! $user->first_name !!}--}}
                    {{--</p>--}}

                    {{--<p>--}}
                    {{--@if($applications->where('is_submitted', 0)->count() === 0)--}}
                    {{--you have no application that needs to be submitted--}}
                    {{--@else--}}
                    {{--{!! $applications->where('is_submitted', 0)->count() !!} application(s) need to be submitted.--}}
                    {{--@endif--}}


                    {{--</p>--}}
                    {{--<p>--}}
                    {{--things to do, such as submitting journal, and site evaluation--}}
                    {{--</p>--}}
                    {{--<p>--}}
                    {{--other info--}}
                    {{--</p>--}}

                    {{--四个section entries：<br>--}}
                    {{--internship applications<br>--}}
                    {{--qualified scholarships<br>--}}
                    {{--internship journals & evaluations<br>--}}
                    {{--successful stories(brows past internship site evaluations)<br>--}}



                    {{--<a href="student/application/organization">Create a new internship application</a>--}}


                    <a href="internship_manage.html"><div id="float-card" class="col-md-5 float-card">
                            <h3>
                                Student Internship Management
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. </p>
                        </div></a>
                    <a href="alum_manage.html"><div id="float-card" class="col-md-5 col-md-offset-2 float-card">
                            <h3>
                                Alum Management
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. </p>
                            </p>
                        </div></a>


                </div>
            </div> <!-- row -->

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
