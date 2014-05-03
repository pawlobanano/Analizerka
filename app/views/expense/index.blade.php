@extends('layouts.wrapper')


@section('title')
@parent

Expenses List
@stop


@section('wrapper')
@parent

@section('page-wrapper')

@section('content')
<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Expense Table</h1>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Expenses Table
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">

                    <div class="table-responsive">

                        <table
                            class="table table-striped table-bordered table-hover"
                            id="expensesTable">
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
                                <td>{{ date("d-m-Y H:i",
                                    strtotime($expense->date)) }}
                                </td>
                                <td>{{{ $expense->category->name }}}</td>
                                <td>{{{ $expense->value }}}</td>
                                <td>{{{ $expense->comment }}}</td>
                                <td>{{ date("d-m-Y H:i",
                                    strtotime($expense->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{ URL::route('expense.edit', $expense->id) }}"
                                       class="btn btn-primary btn-xs btn-block"><i
                                            class="fa fa-pencil fa-fw"></i> Edit</a>
                                    <a href="{{ URL::route('expense.destroy', $expense->id) }}"
                                       onclick="if(!confirm('I\'ll do it!')){return false;};"
                                       class="btn btn-danger btn-xs btn-block"><i
                                            class="fa fa-trash-o fa-lg"></i>
                                        Delete</a>
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
