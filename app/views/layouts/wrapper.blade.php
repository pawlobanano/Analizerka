@extends('layouts.master')


@section('header-styles')
    <!-- Core CSS - Include with every page -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/font-awesome/css/font-awesome.css') }}"/>

    <!-- SB Admin CSS - Include with every page -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/sb-admin.css') }}"/>

    <!-- Page-Level Plugin CSS - Tables -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') }}"/>

    <!-- DatePicker (jQUery UI) -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/plugins/datePicker/redmond/jquery-ui-1.10.4.datePicker.css') }}"/>
@stop


@section('wrapper')
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="{{ action('AnalyzerController@index') }}" class="navbar-brand">Greetings, traveler!</a>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user-right">

                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ action('UserController@logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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

                        @include('sub-view.searchBar', ['dataTables' => $dataTables])

                        <li>
                            <a href="{{ URL::route('index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="{{ URL::route('expense.index') }}"><i class="fa fa-table fa-fw"></i> Expenses<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="{{ URL::route('expense.index') }}"><i class="fa fa-list-ol fa-fw"></i> List</a>
                                </li>

                                <li>
                                    <a href="{{ URL::route('expense.create') }}"><i class="fa fa-plus fa-fw"></i> Create</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts placeholder<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="{{ URL::route('index') }}">Chart 1</a>
                                </li>

                                <li>
                                    <a href="{{ URL::route('index') }}">Chart 2</a>
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

        @yield('page-wrapper')

        @section('footer')
        <div class="footer text-center">
            &copy; 2014 <a href="https://github.com/pawlobanano" target="_blank">@pawlobanano</a>
        </div>
        @show

    </div>
    <!-- /#wrapper -->
@stop


@section('footer-scripts')
    <!-- Core Scripts - Include with every page -->
    <script src="{{ asset('vendor/sb-admin-v2/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin-v2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin-v2/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{ asset('vendor/sb-admin-v2/js/sb-admin.js') }}"></script>

    <!-- Highcharts -->
    <script src="http://code.highcharts.com/highcharts.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="{{ asset('vendor/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>

    <script src="{{ asset('vendor/sb-admin-v2/js/plugins/datePicker/jquery-ui-1.10.4.datePicker.min.js') }}"></script>

    <!-- Page-Level Plugin - DataTables -->
    <script>
        // DataTables configuration
        oTable = $('#expensesTable').dataTable({
            "bPaginate": true,
            "bFilter": true,
            "bInfo": true
        });

        // Here you can hide table's search bar ( DataTables )
        //    $('#expensesTable_filter').hide();
        $('#mainSearch').keyup(function () {
            oTable.fnFilter($(this).val());
        });

        // Input file helper
        $(document)
            .on('change', '.btn-file :file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

        // Input file helper
        $(document).ready( function() {
            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
        });

        // DatePicker (from jQuery UI)
        $('input[name = date]').datepicker( {
            dateFormat: 'dd-mm-yy',
            firstDay: 1,
            showWeek: true,
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            selectOtherMonths: true
        });
    </script>
@stop
