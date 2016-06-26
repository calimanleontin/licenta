<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Championship</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="/css/custom.css"/>
    <link href="/css/prettify.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/js/prettify.js"></script>

    <!-- jQuery includes -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <style>
        .navbar.navbar-default{
            position: absolute;
            top:0px;
            width:100%;
        }
    </style>

    <script src="/js/jquery.jOrgChart.js"></script>

    <script>
        jQuery(document).ready(function() {
            $("#org").jOrgChart({
                chartElement : '#chart',
                dragAndDrop  : false
            });
        });
    </script>
</head>

<body onload="prettyPrint();">

<nav class="navbar navbar-default">
    <div class="container-fluid">
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


<ul id="org" style="display:none">
    <li>
        @if(!empty($champion))
            {{ $champion }}
        @else
            First Place
        @endif
        <ul>
            <li>

                @if(!empty($semifinalist1))
                    {{ $semifinalist1 }}
                @else
                    Semifinalist1
                @endif
                <ul>
                    <li>
                        Quarter1
                        <ul>
                            <li>
                                @if(!empty($Hero1))
                                    {{ $Hero1 }}
                                @else
                                    Hero1
                                @endif
                            </li>
                            <li>
                                @if(!empty($Hero2))
                                    {{ $Hero2 }}
                                @else
                                    Hero2
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li>
                        Quarter 2
                        <ul>
                            <li>
                                @if(!empty($Hero3))
                                    {{ $Hero3 }}
                                @else
                                    Hero3
                                @endif
                            </li>
                            <li>
                                @if(!empty($Hero4))
                                    {{ $Hero4 }}
                                @else
                                    Hero4
                                @endif
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                @if(!empty($semifinalist2))
                    {{ $semifinalist2 }}
                @else
                    Semifinalist2
                @endif
                <ul>
                    <li>
                        Quarter3
                        <ul>
                            <li>
                                @if(!empty($Hero1))
                                    {{ $Hero5 }}
                                @else
                                    Hero5
                                @endif
                            </li>
                            <li>
                                @if(!empty($Hero6))
                                    {{ $Hero6 }}
                                @else
                                    Hero6
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li>
                        Quarter4
                        <ul>
                            <li>
                                @if(!empty($Hero7))
                                    {{ $Hero7 }}
                                @else
                                    Hero7
                                @endif
                            </li>
                            <li>
                                @if(!empty($Hero8))
                                    {{ $Hero8 }}
                                @else
                                    Hero8
                                @endif
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<div id="chart" class="orgChart"></div>

<script>
    jQuery(document).ready(function() {

        /* Custom jQuery for the example */
        $("#show-list").click(function(e){
            e.preventDefault();

            $('#list-html').toggle('fast', function(){
                if($(this).is(':visible')){
                    $('#show-list').text('Hide underlying list.');
                    $(".topbar").fadeTo('fast',0.9);
                }else{
                    $('#show-list').text('Show underlying list.');
                    $(".topbar").fadeTo('fast',1);
                }
            });
        });

        $('#list-html').text($('#org').html());

        $("#org").bind("DOMSubtreeModified", function() {
            $('#list-html').text('');

            $('#list-html').text($('#org').html());

            prettyPrint();
        });
    });
</script>

</body>
</html>