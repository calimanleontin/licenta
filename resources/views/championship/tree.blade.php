<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Championship Chart</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="/css/custom.css"/>
    <link href="/css/prettify.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/js/prettify.js"></script>

    <!-- jQuery includes -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

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
<div class="topbar">
    <div class="topbar-inner">
        <div class="container">
        </div>
    </div>
</div>

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
                                @if(!empty($nr1))
                                    {{ $nr1 }}
                                @else
                                    Nr1
                                @endif
                            </li>
                            <li>
                                @if(!empty($nr2))
                                    {{ $nr2 }}
                                @else
                                    Nr2
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li>
                        Quarter 2
                        <ul>
                            <li>
                                @if(!empty($nr3))
                                    {{ $nr3 }}
                                @else
                                    Nr3
                                @endif
                            </li>
                            <li>
                                @if(!empty($nr4))
                                    {{ $nr4 }}
                                @else
                                    Nr4
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
                                @if(!empty($nr1))
                                    {{ $nr5 }}
                                @else
                                    Nr5
                                @endif
                            </li>
                            <li>
                                @if(!empty($nr6))
                                    {{ $nr6 }}
                                @else
                                    Nr6
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li>
                        Quarter4
                        <ul>
                            <li>
                                @if(!empty($nr7))
                                    {{ $nr7 }}
                                @else
                                    Nr7
                                @endif
                            </li>
                            <li>
                                @if(!empty($nr8))
                                    {{ $nr8 }}
                                @else
                                    Nr8
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