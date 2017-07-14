@extends('layouts.app')
<?php
$application_id = 1;
        $name = 'zhu, qiwen';
        $city = 'bloomington';
        $country = 'US';
?>
@section('content')

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
                        {!! Form::open(['action' => 'InternApplicationController@review']) !!}

                        {!! Form::hidden('application_id', $application_id) !!}

                            <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                    <h3>
                                        <b>SGIS Internship Application</b> <br>
                                        <small>Tell us about your internship.</small>
                                    </h3>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#liability" data-toggle="tab">Liability Release</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">

                                    <div class="tab-pane" id="liability">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> <b>Assumption of Risk and Release from Liability</b>?</h4>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <p>
                                                    This Assumption of Risk and Release from Liability pertains to international internship experiences in the School of Global and International Studies.
                                                </p>
                                                <p>
                                                    I, <b>{!! $name !!}</b>, have made arrangements to participate in an international internship at <b>{!! $city !!}</b> in <b>{!! $country !!}</b>. The Internship Registration Form is attached to and incorporated into this Assumption of Risk and Release form.
                                                </p>

                                                <p>
                                                    I hereby state the following:
                                                </p>
                                                <p>
                                                    1. My selection and participation in the particular international intership is voluntary and wholly my own.
                                                </p>
                                                <p>
                                                    2. I understand that certain risks are inherent in any foreign travel experience and I fully accept those risks. These risks may include, but are not limited to, such things as war, quarantine, civil unrest, public health risks, criminal activity, terrorism, exposure to communicable diseases, ill effects of unfamiliar food and water, incidents related to ground, air or water transportation, adverse weather conditions, accident, injuries or damage to property, and other physical, mental and emotional injury.
                                                </p>
                                                <p>
                                                    3. I also understand that, at this time, travel conditions in <b>{!! $country !!}</b> are particularly dangerous. International Studies and Indiana University have brought to my attention the U.S. Department of State Travel Warning against travel to <b>US</b> by U.S. citizens dated <b>June 25, 2017</b>. I have read and fully understand the warning. I am proceeding with my travel plans notwithstanding this State Department Warning and suggestion made to me by University and Department officials that I defer this travel until a lower level of alert for <b>{!! $country !!}</b> is reinstated by the U.S. Department of State.
                                                </p>
                                                <p>
                                                    4. I have been advised that no one can guarantee my safety in <b>{!! $country !!}</b> and I have been advised to have adequate insurance before my departure, which should include medical evacuation, repatriation of remains and life insurance. I understand that the University strongly recommends that I carry my own health, medical and property insurance for purposes of potential loss related to my participation in this international experience.
                                                </p>
                                                <p>
                                                    5. I understand that it is my responsibility to educate myself on the host country’s cultural values and norms, obey the host country’s laws and familiarize myself with the services available in the host country, including but not limited to police, hospitals, and local U.S. embassies, and local emergencies practices.
                                                </p>
                                                <p>
                                                    6. I fully understand the above risks involved in the proposed travel and I agree to assume the risks of this international experience, including the risk of catastrophic injury or death.
                                                </p>
                                                <p>
                                                    7. I release and fully discharge Indiana University, its Trustees, offices, employees, and agents, from any and all claims and expenses, including reasonable attorney’s fees, for any injury, loss or damage to personal property, including catastrophic injury or death, related to this international experience in <b>{!! $country !!}</b> or suffered by me.
                                                </p>

                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">
                                                    {!! Form::label('sign_date', 'Date') !!}
                                                    {!! Form::date('sign_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    {!! Form::label('signature', 'Printed Name') !!}
                                                    {!! Form::text('signature', $name, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- end of cards definitions -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                        {!! Form::submit('Almost done. let\'s review your application' , ['class' => 'btn btn-finish btn-fill btn-info btn-wd btn-sm', 'name' => 'finish']) !!}
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
