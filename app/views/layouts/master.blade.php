<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>


        @section('title')
        Analizerka |
        @show


    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @yield('header-styles')


</head>
<body>


@section('menu-wrapper')
<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation"
         style="margin-bottom: 0">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.html">Analizerka wita na
                pokładzie</a>

        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">

                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i
                        class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-user-right">

                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User
                            Profile</a>
                    </li>

                    <li><a href="#"><i class="fa fa-gear fa-fw"></i>
                            Settings</a>
                    </li>

                    <li class="divider"></li>

                    <li><a href="login.html"><i
                                class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>

                </ul>
                <!-- /.dropdown-user -->

            </li>
            <!-- /.dropdown -->

        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default navbar-static-side" role="navigation">

            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                    <li>
                        <a href="index.html"><i
                                class="fa fa-dashboard fa-fw"></i>
                            Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>
                            Charts<span
                                class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">

                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>

                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                </ul>
                <!-- /#side-menu -->

            </div>
            <!-- /.sidebar-collapse -->

        </div>
        <!-- /.navbar-static-side -->

    </nav>


    @yield('content')


</div>
<!-- /#wrapper -->
@show


@yield('footer-scripts')


</body>
</html>
