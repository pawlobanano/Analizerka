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

    <ol class="breadcrumb">
        <li><a href="#">Expenses</a></li>
        <li class="active">List</li>
    </ol>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="table-responsive">

                        <table class="table table-hover" id="expensesTable">
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
                                <td>{{ date("d-m-Y", strtotime($expense->date)) }}
                                </td>
                                <td>{{{ $expense->category->name }}}</td>
                                <td>{{ str_replace('.', ',', $expense->value) }}</td>
                                <td>{{{ str_limit($expense->comment, $limit = 14, null) }}}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($expense->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear fa-fw"></i>Settings <span class="caret"></span></button>
                                        <ul class="dropdown-menu" >
                                            <li style="padding-bottom: 5px;"><button type="submit" href="{{ URL::route('expense.edit', $expense->id) }}" class="btn btn-warning btn-sm btn-block"><i class="fa fa-pencil fa-fw"></i>Edit</button></li>
                                            <li>{{ Form::open(['route' => ['expense.destroy', $expense->id], 'method' => 'delete']) }}<button type="submit" href="{{ URL::route('expense.destroy', $expense->id) }}" onclick="if(!confirm('I\'ll do it!')){return false;};" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash-o fa-fw"></i>Delete</button>{{ Form::close() }}</li>
                                        </ul>
                                    </div>
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
