

<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/test/rotating-card.css">

<div class="container">
    <div class="row">
        <h1 class="title">
            This is our awesome team
            <br>
            <small>Present your team in an interesting way</small>
        </h1>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="col-md-5">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb2.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile3.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">John Marvel</h3>
                                    <p class="profession">CEO</p>
                                    <p class="text-center">"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>
                                </div>
                                <div class="footer">
                                    <i class="fa fa-mail-forward"></i> Auto Rotation
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Job Description</h4>
                                    <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>

                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>235</h4>
                                            <p>
                                                Followers
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>114</h4>
                                            <p>
                                                Following
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>35</h4>
                                            <p>
                                                Projects
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <div class="social-links text-center">
                                    <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
            <!--         <div class="col-sm-1"></div> -->
            <div class="col-md-5 col-md-offset-2">
                <div class="card-container manual-flip">
                    <div class="card">
                        <div class="front">
                            <div class="cover">
                                <img src="images/rotating_card_thumb.png"/>
                            </div>
                            <div class="user">
                                <img class="img-circle" src="images/rotating_card_profile2.png"/>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3 class="name">Andrew Mike</h3>
                                    <p class="profession">Web Developer</p>
                                    <p class="text-center">"Lamborghini Mercy <br>Your chick she so thirsty <br>I'm in that two seat Lambo"</p>
                                </div>
                                <div class="footer">
                                    <button class="btn btn-simple" onclick="rotateCard(this)">
                                        <i class="fa fa-mail-forward"></i> Manual Rotation
                                    </button>
                                </div>
                            </div>
                        </div> <!-- end front panel -->
                        <div class="back">
                            <div class="header">
                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h4 class="text-center">Job Description</h4>
                                    <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>

                                    <div class="stats-container">
                                        <div class="stats">
                                            <h4>235</h4>
                                            <p>
                                                Followers
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>114</h4>
                                            <p>
                                                Following
                                            </p>
                                        </div>
                                        <div class="stats">
                                            <h4>35</h4>
                                            <p>
                                                Projects
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                    <i class="fa fa-reply"></i> Back
                                </button>
                                <div class="social-links text-center">
                                    <a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                    <a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                    <a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                </div>
                            </div>
                        </div> <!-- end back panel -->
                    </div> <!-- end card -->
                </div> <!-- end card-container -->
            </div> <!-- end col sm 3 -->
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


