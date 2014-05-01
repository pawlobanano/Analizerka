@extends('layouts.master')


@section('header-styles')
<!-- Core CSS - Include with every page -->
{{ HTML::style('vendor/sb-admin-v2/css/bootstrap.min.css') }}
{{ HTML::style('vendor/sb-admin-v2/font-awesome/css/font-awesome.css') }}

<!-- SB Admin CSS - Include with every page -->
{{ HTML::style('vendor/sb-admin-v2/css/sb-admin.css') }}

<!-- Page-Level Plugin CSS - Tables -->
{{ HTML::style('vendor/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') }}
@overwrite


@section('footer-scripts')
<!-- Core Scripts - Include with every page -->
{{ HTML::script('vendor/sb-admin-v2/js/jquery-1.10.2.js') }}
{{ HTML::script('vendor/sb-admin-v2/js/bootstrap.min.js') }}
{{ HTML::script('vendor/sb-admin-v2/js/plugins/metisMenu/jquery.metisMenu.js') }}

<!-- SB Admin Scripts - Include with every page -->
{{ HTML::script('vendor/sb-admin-v2/js/sb-admin.js') }}

<!-- Page-Level Plugin Scripts - Tables -->
{{ HTML::script('vendor/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('vendor/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js') }}

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
@overwrite
