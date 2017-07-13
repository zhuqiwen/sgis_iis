@extends('layouts.app')
<?php
$credit_hours = [
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
];

$countries = [
        'China' => 'China',
        'United Kingdom' => 'United Kingdom',
];

$states = [
        'state 1' => 'state 1',
        'state 2' => 'state 2',
];
$cities = [
        'city 1' => 'city 1',
        'city 2' => 'city 2',
];
?>
@section('content')

    {{--<link rel="stylesheet" href="/css/test/test.css">--}}
    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">
    {{--<link rel="stylesheet" href="/css/test/gsdk-base.css">--}}



    <div class="image-container set-full-height" style="background-image: url('/img/wizard-city.jpg')">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="azzure" id="wizard">
                            {{--<form action="" method="">--}}
                            {!! Form::open(['action' => 'InternApplicationController@prepareLiability']) !!}

                            <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                    <h3>
                                        <b>SGIS Internship Application</b> <br>
                                        <small>Tell us about your internship.</small>
                                    </h3>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#basics" data-toggle="tab">Basics</a></li>
                                        <li><a href="#location" data-toggle="tab">Location</a></li>
                                        <li><a href="#dates" data-toggle="tab">Dates</a></li>
                                        <li><a href="#budgets" data-toggle="tab">Budgets</a></li>
                                        <li><a href="#work" data-toggle="tab">Work</a></li>
                                        <li><a href="#thoughts" data-toggle="tab">Thoughts</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <!-- 6 cards/panes -->
                                    <!-- basics[year, term, paid?, credit hour]-->
                                    <!-- location[country, state, city, street]-->
                                    <!-- dates[departure, return, start, end]-->
                                    <!-- budgets[airfare, living cost per day, accommodation]-->
                                    <!-- work[hours per week, schedule, duties]-->
                                    <!-- thoughts[goals, cultural reasons, challenge]-->
                                    <div class="tab-pane" id="basics">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Let's start with the <b>basic details</b></h4>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">
                                                    {!! Form::label('year', 'Which academic year?') !!}
                                                    {!! Form::select('year',
                                                    ['2018' => '2018', '2019'=> '2019'],
                                                    '2018',
                                                    ['class' => 'form-control']) !!}

                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('term', 'Which Term?') !!}
                                                    {!! Form::select('term',
                                                    ['Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'],
                                                    'Summer',
                                                    ['class' => 'form-control']) !!}
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">
                                                    {!! Form::label('paid_internship', 'Is this internship with any payment?') !!}
                                                    {!! Form::select('paid_internship',
                                                                    [0 => 'No', 1 => 'Yes', 2 => 'Unknown'],
                                                                    2,
                                                                    ['class' => 'form-control']) !!}

                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('credit_hours', 'Credit Hours Desired') !!}

                                                    <div class="input-group">
                                                        {!! Form::select('credit_hours',
                                                                          $credit_hours,
                                                                          '0',
                                                                          ['class' => 'form-control']) !!}
                                                        <span class="input-group-addon">credits</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="location">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text">Tell us more about the internship's <b>location</b></h4>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">

                                                    {!! Form::label('country', 'Country') !!}
                                                    {!! Form::select('country',
                                                                      $countries,
                                                                      null,
                                                                      ['class' => 'form-control']) !!}


                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('state', 'State/Province') !!}
                                                    {!! Form::select('state',
                                                                      $states,
                                                                      null,
                                                                      ['class' => 'form-control']) !!}

                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">

                                                    {!! Form::label('city', 'City') !!}
                                                    {!! Form::select('city',
                                                                      $cities,
                                                                      null,
                                                                      ['class' => 'form-control']) !!}
                                                    <br>

                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('street', 'Street') !!}
                                                    {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="dates">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text">Tell us more about the internship's <b>location</b></h4>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">

                                                    {!! Form::label('country', 'Country') !!}
                                                    {!! Form::select('country',
                                                                      $countries,
                                                                      null,
                                                                      ['class' => 'form-control']) !!}


                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('state', 'State/Province') !!}
                                                    {!! Form::select('state',
                                                                      $states,
                                                                      null,
                                                                      ['class' => 'form-control']) !!}

                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">

                                                    {!! Form::label('city', 'City') !!}
                                                    {!! Form::select('city',
                                                                      $cities,
                                                                      null,
                                                                      ['class' => 'form-control']) !!}
                                                    <br>

                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('street', 'Street') !!}
                                                    {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="captain">
                                        <h4 class="info-text">Do you include a captain? </h4>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Renters you approve will be able to take this boat">
                                                        <input type="radio" name="job" value="Design">
                                                        <div class="icon">
                                                            <i class="fa fa-life-ring"></i>
                                                        </div>
                                                        <h6>No Captain</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you or a certified captain will be included.">
                                                        <input type="radio" name="job" value="Code">
                                                        <div class="icon">
                                                            <i class="fa fa-male"></i>
                                                        </div>
                                                        <h6>Includes Captain</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <div class="row">
                                            <h4 class="info-text"> Drop us a small description </h4>
                                            <div class="col-sm-6 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Boat description</label>
                                                    <textarea class="form-control" placeholder="" rows="9">
                                            </textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Example</label>
                                                    <p class="description">"The boat really nice name is recognized as being a really awesome boat. We use it every sunday when we go fishing and we catch a lot. It has some kind of magic shield around it."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of cards definitions -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                        <input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name='finish' value='Finish' />
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
