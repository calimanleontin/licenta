<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}

    {{--<!-- Optional theme -->--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">--}}

    {{--<!-- Latest compiled and minified JavaScript -->--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/site.css') }}" rel="stylesheet">


    <title>Game</title>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid header">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('/shop') }}">Shop</a>
                </li>
                <li>
                    <a href="{{ url('/lists/championships') }}">Tournaments</a>
                </li>
                <li>
                    <a href="{{ url('/tops') }}">Tops</a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right list-inline">
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/auth/login') }}" class="l">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/auth/register') }}">Register</a>
                    </li>
            </ul>

            @else

                <li>
                    <div class="mini">
                        <div class="btn btn-default dropdown-toggle " type="button" id="menu1" data-toggle="dropdown">{{Auth::user()->name}}
                            <span class="caret"></span></div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/user-profile">User Profile</a> </li>
                            <li>
                                <a href="{{ url('/auth/logout') }}" >Logout</a>
                            </li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/cart/index">My cart</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/order-history">Order History</a> </li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/user-profile">User Profile</a> </li>

                        </ul>
                    </div>
                </li>

            @endif
        </div>
    </div>
</nav>


<div class="container">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p class="panel-body">
                {{ Session::get('message') }}
            </p>
        </div>
    @endif
    @if ($errors->any())
        <div class='flash alert-danger'>
            <ul class="panel-body">
                @foreach ( $errors->all() as $error )
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12 ">
                    <h2>@yield('title')</h2>
                    @yield('title-meta')
                    @yield('content')
        </div>

    </div>
</div>

<div class="footer">
    <div class="">
        <ul class="list list-unstyled text-center">
            <li>        Facebook: <a href="https://www.facebook.com/profile.php?id=100006271487210">Caliman Leontin</a>
            </li>

               <li>
                   Email:<a href="#">calimanleontin@gmail.com</a>

               </li>
        </ul>
    </div>
</div>


</body>
</html>