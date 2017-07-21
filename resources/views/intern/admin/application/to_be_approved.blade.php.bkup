@extends('layouts.app')
@section('content')

    <link href="/css/test/bootstrap.min.css" rel="stylesheet">
    <link href="/css/test/tab_list.css" rel="stylesheet">




    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
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
                    console.log("jo");
                    var get_url = '/test_ajax';
                    $.ajax({
                        type: 'GET',
                        url: get_url,
                        data: {'field': value},
                        success: function (returned_data) {
                            console.log('success');
                            console.log(returned_data);
//                        $("#area_to_be_reloaded").html(returned_data);
                            var tabs = '';
                            var contents = '';

                            var cnt = 0;
                            for (key in returned_data)
                            {
                                if (cnt == 0)
                                {
                                    tabs += '<li class="active"><a href="#' + key + '" data-toggle="tab">' + key + '</a></li>';
//                                contents += '<div class="tab-pane fade in active" id="' + key + '">' + returned_data[key] + '</div>';
                                }
                                else
                                {
                                    tabs += '<li><a href="#'+key+'" data-toggle="tab">'+key+'</a></li>';
//                                contents += '<div class="tab-pane fade" id="' + key + '">' + returned_data[key] + '</div>';

                                }
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