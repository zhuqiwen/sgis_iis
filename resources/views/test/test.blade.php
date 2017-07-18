

<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/test/rotating-card.css">
{{--<link rel="stylesheet" href="/css/test/card.css">--}}

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-md-5">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="front-title">

                                <h3>Internship Applications</h3>
                            </div>
                            <div class="front-text">
                                <p>some description of this functionality</p>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="col-sm-12">
                                <a href="#">
                                    <div class="col-sm-6 float-card" id="float-card">
                                        <div class="back-title" >

                                            <h3>Title 1-1</h3>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="col-sm-6 float-card" id="float-card">
                                        <div class="back-title">
                                            <h3>title 1-2</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col md 5 -->
            <div class="col-md-5 col-md-offset-2">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="front-title">

                                <h3>Internship Applications</h3>
                            </div>
                            <div class="front-text">
                                <p>some description of this functionality</p>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="col-sm-12">
                                <a href="#">
                                    <div class="col-sm-6 float-card" id="float-card">
                                        <div class="back-title" >

                                            <h3>Title 1-1</h3>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="col-sm-6 float-card" id="float-card">
                                        <div class="back-title" >

                                            <h3>title 1-2</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col md 5 -->
        </div> <!-- end col-sm-10 -->
    </div> <!-- end row -->
    {{--<div class="space-200"></div>--}}
</div>


<script src="js/app.js" type="text/javascript"></script>

<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>


