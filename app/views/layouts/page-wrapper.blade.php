@extends('layouts.master')


@section('header-styles')
<!-- Core CSS - Include with every page -->
<link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/font-awesome/css/font-awesome.css') }}" />

<!-- SB Admin CSS - Include with every page -->
<link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/sb-admin.css') }}" />

<!-- Page-Level Plugin CSS - Tables -->
<link rel="stylesheet" href="{{ asset('vendor/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') }}" />
@stop

@section('wrapper')
@parent

    @section('page-wrapper')

        @section('footer')
        <div class="footer text-center">
            &copy; {{ date('Y') }} <a href="mailto:pawlobanano@gmail.com?Subject=Personal Finance Analyzer">Paweł Banach</a>
        </div>
        @stop

    @stop

@stop



@section('footer-scripts')
<!-- Core Scripts - Include with every page -->
<script src="{{ asset('vendor/sb-admin-v2/js/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('vendor/sb-admin-v2/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/sb-admin-v2/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="{{ asset('vendor/sb-admin-v2/js/sb-admin.js') }}"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="{{ asset('vendor/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
@stop


