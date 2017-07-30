@extends('layouts.app')

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
{{--                        {!! Form::open(['action' => 'InternOrganizationController@store']) !!}--}}
                        <!--        You can switch ' data-color="azzure" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header">
                                <h3>
                                    <b>SGIS Internship Journals and Evaluations</b> <br>
                                    <small>Here you can submit required assignments</small>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#internships" data-toggle="tab">Select Internship and Assignment Type</a></li>
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
                                                {!! Form::select('internship', $internship_options, NULL, ['class' => 'form-control', 'id' => 'internship-select']) !!}
                                            </div>
                                            <div id="internship-details">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                {{--here need to check if the url is legal--}}
                                                {!! Form::label('assignment_type', 'please select the type of this assignment') !!}
                                                {!! Form::select('assignment_type', $assignment_types, NULL, ['class' => 'form-control', 'id' => 'assignment-select']) !!}
                                                <br>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- end of cards definitions -->

                            </div>

                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <a data-toggle="modal" href="#" class="btn btn-finish btn-fill btn-info btn-wd btn-sm disabled">Let's Go</a>
                                    <?php

                                        echo $assignment_modals;
                                    ?>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                            {{--</form>--}}
{{--                            {!! Form::close() !!}--}}
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
        function getAvailableAssignments(url, internship_id){
            var type_id_separator = '-';
            $.ajax({
                type: 'GET',
                url: url,
                data: {'internship_id': internship_id},
                dataType: 'json',
                success: function(returned_data){
                    console.log(returned_data);
                    //populate the options
                    var options = '';
                    for (doc_type in returned_data)
                    {

                        var inner_length = returned_data[doc_type].length;
                        for(var j = 0; j < inner_length; j++)
                        {
                            console.log(doc_type + ': ' + returned_data[doc_type][j].id);
                            var assignment = doc_type + ': due on ' + returned_data[doc_type][j].due_date;
                            options += '<option value="'
                                + doc_type
                                + type_id_separator
                                + returned_data[doc_type][j].id
                                + '">'
                                + assignment
                                + '</option>';
                        }
                    }

                    $('#assignment-select').html(options);


                }
            });
        }

        $(document).ready(function () {


            var url = '/test_ajax_get_available_docs';

            getAvailableAssignments(url, $('#internship-select').val());






            var internships = <?php echo json_encode($internships)?>;
            var option_detail_list = {};

            for (var i = 0; i < internships.length; i++)
            {
                obj = internships[i];
                option_detail_list[obj.internship_id] = '<p>Internship ID: '
                        + obj.internship_id
                        + '</p>'
                        + '<p> Country: '
                        + obj.internship_country
                        + '</p>'
                        + '<p> Organization: '
                        + obj.organization_name
                        + '</p>';
            }



            var default_item = $('#internship-select').val();
            $('#internship-details').html(option_detail_list[default_item]);


            $('#internship-select').change(function () {
                var internship_id = $('#internship-select').val();
                $('#internship-details').html(option_detail_list[internship_id]);


                getAvailableAssignments(url, internship_id)

            });

            $('#lets_go').click(function(){
                console.log('let\'s go');
                console.log('internship id: ' + $('#internship-select option:selected').val());
                console.log('assignment: ' + $('#assignment-select option:selected').val());
            });


        });
    </script>
@endsection
