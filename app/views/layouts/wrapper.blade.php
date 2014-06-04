@extends('layouts.master')


@section('header-styles')
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/font-awesome/css/font-awesome.css') }}"/>

    <!-- SB Admin CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/sb-admin.css') }}"/>

    <!-- Styles-override.css - CSS styles override -->
    <link rel="stylesheet" href="{{ asset('css/styles-override.css') }}"/>

    <!-- Page-Level Plugin CSS - Tables -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') }}"/>

    <!-- DatePicker (jQUery UI) -->
    <link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/plugins/datePicker/redmond/jquery-ui-1.10.4.datePicker.css') }}"/>
@stop


@section('wrapper')
<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">

        <ul class="nav navbar-top-links navbar-right" style="float: right">

            <li><a href="{{ URL::route('expense.create') }}"><i class="fa fa-plus fa-fw"></i></a></li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">

                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sliders fa-fw"></i> Settings</a>
                    </li>

                    <li class="divider"></li>

                    <li>
                        <a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>

                </ul><!-- /.dropdown-menu dropdown-menu-right -->

            </li><!-- /.dropdown -->

        </ul><!-- /.nav navbar-top-links navbar-right -->

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="{{ action('AnalyzerController@index') }}" class="navbar-brand">Greetings, traveler! <span class="label label-info">Alpha</span></a>

        </div><!-- /.navbar-header -->

        <div class="navbar-default navbar-static-side" role="navigation">

            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                    @include('sub-view.searchBar', ['dataTables' => $dataTables])

                    <li>
                        <a href="{{ URL::route('index') }}"><i class="fa fa-home fa-fw"></i> Overview</a>
                    </li>

                    <li>
                        <a href="{{ URL::route('expense.index') }}"><i class="fa fa-list-ol fa-fw"></i> Expenses history</a>
                    </li>

                    <li>
                        <a href="{{ URL::route('expense.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> Monthly incomes</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-tags fa-fw"></i> Categories</a>
                    </li>

                </ul><!-- /#side-menu -->

            </div><!-- /.sidebar-collapse -->

        </div><!-- /.navbar-static-side -->

    </nav><!-- /.navbar navbar-default navbar-fixed-top -->

    @yield('page-wrapper')

    @section('footer')
        <div class="text-center" style="padding: 10px; border-top: 1px solid #e7e7e7">
            &copy; 2014 <a href="https://github.com/pawlobanano">@pawlobanano</a>
        </div>
    @show

</div><!-- /#wrapper -->
@stop


@section('footer-scripts')
<!-- Core Scripts - Include with every page -->
    <script src="{{ asset('vendor/sb-admin-v2/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin-v2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('vendor/sb-admin-v2/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<!-- SB Admin Scripts - Include with every page -->
    <script src="{{ asset('vendor/sb-admin-v2/js/sb-admin.js') }}"></script>

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
            .on('change', '.btn-file :file', function () {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

        // Input file helper
        $(document).ready(function () {
            $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });
        });

        // DatePicker (from jQuery UI)
        $('input[name = date]').datepicker({
            dateFormat: 'dd-mm-yy',
            firstDay: 1,
            showWeek: true,
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            selectOtherMonths: true
        });

        // bootstrap-progressbar v0.7.1
        $('.progress .progress-bar').progressbar();
    </script>
@stop
