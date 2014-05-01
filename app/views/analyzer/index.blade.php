@extends('layouts.page-wrapper')


@section('title')
@parent
Home Page
@stop


@section('wrapper')
@parent

    @section('page-wrapper')

        @section('content')
        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Awesome Table</h1>
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
                                        <th>Date</th>
                                        <th>Category</th>
                                        <th>Value</th>
                                        <th>Comment</th>
                                        <th>Added</th>
                                        <th>Options</th>
                                    </tr>

                                    </thead>

                                    <tbody>

                                    @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{{{ date("d-m-Y
                                            H:m",strtotime($expense->date)) }}}
                                        </td>
                                        <td>{{ $expense->category->name }}</td>
                                        <td>{{ $expense->value }}</td>
                                        <td>{{ $expense->comment }}</td>
                                        <td>{{{ date("d-m-Y
                                            H:m",strtotime($expense->created_at)) }}}
                                        </td>
                                        <td><a href="{{ action('AnalyzerController@edit', $expense->id) }}"\
                                            class="btn btn-default">Edit</a>
                                            <a href="{{ action('AnalyzerController@destroy', $expense->id) }}"\
                                            class="btn btn-default">Delete</a>
                                        </td>
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
        @show

    @stop

@stop
