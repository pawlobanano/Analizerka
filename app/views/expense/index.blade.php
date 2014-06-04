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
        <li class="active">{{ ucfirst(Request::segment(1)) }}</li>
    </ol>

    <div class="col-xs-12">

        <!-- will be used to show any messages -->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <div class="table-responsive">

            <table class="table table-condensed table-hover" id="expensesTable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Value</th>
                    <th>Comment</th>
                    <th>Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($expenses as $key => $expense)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ date("d-m-Y", strtotime($expense->date)) }}</td>
                    <td>{{{ $expense->category->name or '' }}}</td>
                    <td>{{ str_replace('.', ',', $expense->value) }}</td>
                    <td>{{{ str_limit($expense->comment, $limit = 14, null) }}}</td>
                    <td>{{ date("d-m-Y H:i", strtotime($expense->created_at)) }}</td>
                    <td>
                        <div class="btn-group">
                            {{ Form::open(['route' => ['expense.destroy', $expense->id], 'method' => 'DELETE']) }}
                            <a href="{{ URL::route('expense.show', $expense->id) }}" class="btn btn-info btn-xs" role="button"><i class="fa fa-eye fa-fw"></i></a>
                            <a href="{{ URL::route('expense.edit', $expense->id) }}" class="btn btn-warning btn-xs" role="button"><i class="fa fa-pencil fa-fw"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" onclick="if(!confirm('I\'ll do it!')){return false;};"><i class="fa fa-trash-o fa-fw"></i></button>
                            {{ Form::close() }}
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div><!-- /.table-responsive -->

    </div><!-- /.col-xs-12 -->

    <div class="clearfix"></div>

</div><!-- /#page-wrapper -->
@show

@stop

@stop
