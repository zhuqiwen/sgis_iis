@extends('layouts.app')
<?php
$org_id = session('org_id');
?>
@section('content')

    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">
    {{--<link rel="stylesheet" href="/css/test/gsdk-base.css">--}}



    <div class="image-container set-full-height" style="background-image: url('/img/wizard-japan.jpg')">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="azzure" id="wizard">
                        {!! Form::open(['action' => 'InternSupervisorController@store']) !!}
                        {!! Form::hidden('organization_id', $org_id) !!}

                        <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header">
                                <h3>
                                    <b>SGIS Internship Application</b> <br>
                                    <small>Tell us about your internship.</small>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#supervisor" data-toggle="tab">Supervisor</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">

                                <div class="tab-pane" id="supervisor">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Who will be your <b>supervisor</b> in that organization?</h4>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                {!! Form::label('first_name', 'First name') !!}
                                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('last_name', 'Last name') !!}
                                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                {!! Form::label('prefix', 'prefix') !!}
                                                {!! Form::text('prefix', null, ['class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('email', 'email') !!}
                                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                {!! Form::label('phone_country_code', 'phone: country code') !!}
                                                {!! Form::text('phone_country_code', null, ['class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('phone', 'phone #') !!}
                                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <!-- end of cards definitions -->

                            </div>

                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                    {!! Form::submit('Give us some other details', ['class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm', 'name' => 'finish']) !!}
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


    <script src="/js/test/jquery-1.10.2.js"></script>
    <script src="/js/test/bootstrap.min.js"></script>
    <script src="/js/test/jquery.validate.min.js"></script>
    <script src="/js/test/jquery.bootstrap.wizard.js"></script>
    <script src="/js/test/wizard.js"></script>
@endsection
