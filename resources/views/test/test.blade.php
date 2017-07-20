@extends('layouts.app')
@section('content')

<link href="/css/test/bootstrap.min.css" rel="stylesheet">
<link href="/css/test/tab_list.css" rel="stylesheet">
<link href="/css/test/card.css" rel="stylesheet">

<style>
    #group-title {
        text-align: center;
    }
</style>


<div class="container">
    <div class="row" style="margin-top: 10%;">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div id="group-title">
                    <h3 id="current-grouper">Applications to be approved</h3>
                </div>

                <div class="panel-heading">
                    <ul id="tabs" class="nav nav-tabs">
                        <li class="active"><a href="#default" data-toggle="tab"></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div id="tab-contents" class="tab-content">
                        <div class="tab-pane fade in active" id="default">default view when first loaded</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<script src="/js/test/jquery-2.2.4.min.js"></script>
<script src="/js/test/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $(function(){
            $(".approve_group_by").click(function (e) {
                e.preventDefault();
                var value = this.id.replace('groupBy', '').toLowerCase();
                $("#current-grouper").html('Application Grouped by ' + '<u>' + this.text + '</u>');
                console.log("jo");
                var get_url = '/test_ajax';
                $.ajax({
                    type: 'GET',
                    url: get_url,
                    data: {'field': value, 'is_approved': 0, 'is_submitted': 1},
                    success: function (returned_data) {
                        console.log('success');
                        console.log(returned_data);
//                        $("#area_to_be_reloaded").html(returned_data);
                        var tabs = '';
                        var contents = '';

                        var cnt = 0;
                        for (var tab in returned_data)
                        {
                            var original_tab = tab;
                            tab = tab.replace(' ','-');
                            if (cnt == 0)
                            {
                                tabs += '<li class="active"><a href="#' + tab + '" data-toggle="tab">' + tab + '</a></li>';
                                contents += '<div class="tab-pane fade in active" id="' + tab + '">'
                                            + '<div class="row">'
                                            + '<div class="col-md-12">';
                            }
                            else
                            {
                                tabs += '<li><a href="#'+tab+'" data-toggle="tab">'+tab+'</a></li>';
                                contents += '<div class="tab-pane fade" id="' + tab + '">'
                                        + '<div class="row">'
                                        + '<div class="col-md-12">';

                            }
                            var inner_cnt = 0;
                            console.log(returned_data[original_tab]);
                            for (var application in returned_data[original_tab])
                            {
                                console.log('aha');
                                console.log(application);
                                application = returned_data[original_tab][application];
                                contents += '<div class="col-md-4" style="margin-top: 5%;">'
                                        + '<a href="#" style="text-decoration: none">'
                                        + '<div id="float-card" class="col-md-10 col-md-offset-1 float-card">'
                                        + '<div class="title"><h4>'
                                        + application.last_name + ', ' + application.first_name
                                        + '<br/><small>IUID: ' + application.iuid + '</small>'
                                        + '</h4></div>'
                                        + '<hr style="color: black; background-color: black; height: 1px; margin: 0 0;">'
                                        + '<div class="text">'
                                        + '<p><strong>Internship Address:</strong></p>'
                                        + '<p>'
                                        + application.street + ', '
                                        + application.city + ','
                                        + '</p><p>'
                                        + application.state + ', '
                                        + application.country
                                        + '</p>'
                                        + '<p><strong>Internship Organization:</strong></p>'
                                        + '<p>'
                                        + application.org_name
                                        + '</p>'
                                        + '<p><strong>Internship Date:</strong></p>'
                                        + '<p>From '
                                        + application.start_date
                                        + ' To '
                                        + application.end_date
                                        + '</p>'
                                        + '</p></div></div></a></div>'
                                inner_cnt ++;
                            }
                            contents += '</div></div></div>';
                            cnt ++;
                        }
                        $("#tabs").html(tabs);
                        $("#tab-contents").html(contents);

                    }

                });
            });
        });
    });
</script>


@endsection