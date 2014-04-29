@extends('layouts.blank-page')


@section('title')
@parent
Strona Główna
@stop


@section('header-styles')
@stop


@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Taka tam tabelka</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table
                            class="table table-striped table-bordered table-hover"
                            id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Data</th>
                                <th>Kategoria</th>
                                <th>Wartość</th>
                                <th>Komentarz</th>
                                <th>Dodano</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->id }}</td>
                                <td>{{ $expense->date }}</td>
                                <td>{{ $expense->category_id }}</td>
                                <td>{{ $expense->value }}</td>
                                <td>{{ $expense->comment }}</td>
                                <td>{{ $expense->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@stop
