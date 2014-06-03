@extends('layouts.wrapper')


@section('title')
@parent

Home Page
@stop


@section('wrapper')
@parent

@section('page-wrapper')

@section('content')
<div id="page-wrapper">

    <ol class="breadcrumb">
        <li class="active">Overview</li>
    </ol>

    <h1>{{ $month }}</h1>
    <div class="row">

        <div class="col-xs-12">

            <!-- will be used to show any messages -->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="row">

                        <div class="col-xs-12 col-sm-6">
                            <p>OVERALL</p>
                            <h1 class="text-center">492,14<small>zł</small></h1>
                            <p class="small text-center">350,15<small>zł</small> left of your month limit</p>
                        </div>

                        <div id="chart" class="col-xs-12 col-sm-6">

                            <p>EXPENSES</p>

                            <p class="text-success" style="margin: 0">Jedzenie i picie 55,95zł</p>
                            <div class="progress" style="margin-bottom: 10px">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuetransitiongoal="40"></div>
                            </div>

                            <p class="text-info" style="margin: 0">Transport 25,00zł</p>
                            <div class="progress" style="margin-bottom: 10px">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuetransitiongoal="20"></div>
                            </div>

                            <p class="text-warning" style="margin: 0">Inne 155,39zł</p>
                            <div class="progress" style="margin-bottom: 10px">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuetransitiongoal="60"></div>
                            </div>

                            <p class="text-danger" style="margin: 0">Zdrowie 255,80zł</p>
                            <div class="progress" style="margin-bottom: 10px">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuetransitiongoal="80"></div>
                            </div>

                        </div><!-- /#chart -->

                    </div><!-- /.row -->

                </div><!-- /.panel-body -->

            </div><!-- /.panel -->

        </div><!-- /.col-lg-12 -->

    </div><!-- /.row -->

</div><!-- /#page-wrapper -->
@show

@stop

@stop
