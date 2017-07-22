<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SGIS IIS') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">




    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" style="background-image: url('/img/wizard-europe.jpg')">
    {{--<div id="app">--}}
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'SGIS Internship Management System') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            @if(Request::path() === 'register')
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            @endif
                            @if(Request::path() === 'login')
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @endif
                        @else
                            @if(Request::path() === 'intern/admin/application/to_approve' || Request::path() == 'test')
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Group By <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a id="groupByAll" class="approve_group_by" href="#">

                                                All
                                            </a>

                                        </li>
                                        <li>
                                            <a id="groupByYear" class="approve_group_by" href="#">

                                                Internship Year
                                            </a>

                                        </li>
                                        <li>
                                            <a id="groupByTerm" class="approve_group_by" href="#">

                                                Academic Term
                                            </a>

                                        </li>
                                        <li>
                                            <a id="groupByCredit_hours" class="approve_group_by" href="#">

                                                Desired Credits
                                            </a>

                                        </li>
                                        <li>
                                            <a id="groupByCountry" class="approve_group_by" href="#">

                                                Country
                                            </a>

                                        </li>
                                        <li>
                                            <a id="groupByPaid_internship" class="approve_group_by" href="#">

                                                Payment
                                            </a>

                                        </li>
                                        <li>
                                            <a id="groupByOrganization_type" class="approve_group_by" href="#">

                                                Organization Type
                                            </a>

                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->first_name }} <span class="caret"></span>
                                    </a>



                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();
                                                    ">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('invalid_user'))
            <div class="alert alert-warning alert-dismissible" role="alert" style="text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {!! session('invalid_user') !!}
            </div>

        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    {{--<script src="/js/test/jquery-2.2.4.min.js"></script>--}}

    <script src="/js/app.js"></script>
    {{--<script src="/js/test/bootstrap.min.js"></script>--}}
</body>
</html>
