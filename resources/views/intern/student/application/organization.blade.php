@extends('layouts.app')
<?php
$user_id = Auth::user()->id;

//$organization_id = (int)session('data')['org_id'];
$organization_id = 198155;


//$supervisor_id = (int)session('data')['supervisor_id'];
$supervisor_id = 198155;

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
$work_schedule_guide = 'please briefly describe your anticipated work schedule';
$duties_guide = 'Provide a detailed description of the internship experience and your specific duties';
$reasons_guide = 'Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals)';
$culture_guide = 'If it is an internship abroad, explain how you will interact with the host culture';
$challenge_guide = 'Detail any challenges you expect to face during  the internship and explain how you intend to face these challenges';
?>
@section('content')

    <link rel="stylesheet" href="/css/test/bootstrap.min.css">
    <link rel="stylesheet" href="/css/test/demo.css">
    <link rel="stylesheet" href="/css/test/gsdk-bootstrap-wizard.css">
    {{--<link rel="stylesheet" href="/css/test/gsdk-base.css">--}}



    <div class="image-container set-full-height" style="background-image: url('/img/wizard-europe.jpg')">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="azzure" id="wizard">
                        {{--<form action="" method="">--}}
                        {!! Form::open(['action' => 'InternOrganizationController@store']) !!}

                        <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header">
                                <h3>
                                    <b>SGIS Internship Application</b> <br>
                                    <small>Tell us about your internship.</small>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#organization" data-toggle="tab">Organization</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">

                                <div class="tab-pane" id="organization">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Which <b>organization</b> is the internship with?</h4>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                {!! Form::label('organization_name', 'Organization name') !!}
                                                {!! Form::text('organization_name', null, ['class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                {{--here need to check if the url is legal--}}
                                                {!! Form::label('organization_url', 'Organization Website URL') !!}
                                                {!! Form::text('organization_url', 'https://', ['class' => 'form-control']) !!}
                                                <br>
                                            </div>
                                        </div>
                                        {{--TODO--}}
                                        {{--We will need organization type --}}

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


    <script src="/js/test/jquery-1.10.2.js"></script>
    <script src="/js/test/bootstrap.min.js"></script>
    <script src="/js/test/jquery.validate.min.js"></script>
    <script src="/js/test/jquery.bootstrap.wizard.js"></script>
    <script src="/js/test/wizard.js"></script>
@endsection
