@extends('layouts.app')
<?php
$user_id = Auth::user()->id;
?>
@section('content')

    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">



    {{--<div class="image-container set-full-height" style="background-image: url('/img/wizard-europe.jpg')">--}}
    <div class="image-container set-full-height">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="azzure" id="wizard">
                        {!! Form::open(['action' => 'InternOrganizationController@store']) !!}
                        <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header">
                                <h3>
                                    <b>SGIS Internship Journals and Evaluations</b> <br>
                                    <small>Here you can submit required assignments</small>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#" data-toggle="tab">Select Internship and Assignment Type</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">

                                <div class="tab-pane" id="internships">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Which <b>internship</b> is this assignment for?</h4>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                {!! Form::label('internship', 'Please select an internship') !!}
                                                {!! Form::select('internship', $internships, NULL, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                {{--here need to check if the url is legal--}}
                                                {!! Form::label('assignment_type', 'please select the type of this assignment') !!}
                                                {!! Form::select('assignment_type', $assignment_type, NULL, ['class' => 'form-control']) !!}
                                                <br>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- end of cards definitions -->

                            </div>

                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                    {!! Form::submit('Tell us about your supervisor in this organization', ['class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm', 'name' => 'finish']) !!}
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {{--</form>--}}
                            {!! Form::close() !!}
                        </div>
                    </div> <!-- wizard container -->
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

    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
