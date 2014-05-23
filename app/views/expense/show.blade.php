@extends('layouts.wrapper')


@section('title')
@parent

Expense Show
@stop


@section('wrapper')
@parent

@section('page-wrapper')

@section('content')
<div id="page-wrapper">

    <ol class="breadcrumb">
        <li><a href="{{ URL::route('expense.index') }}">{{ ucfirst(Request::segment(1)) }}</a></li>
        <li class="active">Show</li>
    </ol>

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-xs-3">
                        <h1 style="margin-bottom: 25px">Expense</h1>
                    </div><!-- /.col-lg-12 -->

                    <div class="col-xs-9">
                    {{ Form::open(['route' => ['expense.destroy', $expense->id], 'method' => 'DELETE']) }}
                        <p class="text-right">
                            <a href="{{ URL::route('expense.edit', $expense->id) }}" class="btn btn-warning" role="button"><i class="fa fa-pencil fa-fw"></i></a>
                            <button type="submit" class="btn btn-danger" onclick="if(!confirm('I\'ll do it!')){return false;};"><i class="fa fa-trash-o fa-fw"></i></button>
                        </p>
                    {{ Form::close() }}
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-xs-3">
                        <p class="text-right"><strong>Date</strong></p>
                        <p class="text-right"><strong>Category</strong></p>
                        <p class="text-right"><strong>Value</strong></p>
                        @if ($expense->comment) <p class="text-right"><strong>Comment</strong></p> @endif

                        @if (count($images)) <p class="text-right"><strong>Photos</strong></p> @endif
                    </div>

                    <div class="col-xs-9">
                        <p class="text-left">{{ $expense->date }}</p>
                        <p class="text-left">{{ $expense->category->name }}</p>
                        <p class="text-left">{{ $expense->value }}</p>
                        @if ($expense->comment) <p class="text-left">{{ $expense->comment }}</p> @endif
                        @if (count($images))
                            @foreach ($images as $image)
                                <div class="col-xs-9 col-sm-6 col-lg-3" style="margin-bottom: 10px">
                                    <a href="{{ URL::asset('uploads') }}/{{ $image->folder_name }}/{{ $image->name }}">
                                        <img src="{{ URL::asset('uploads') }}/{{ $image->folder_name }}/{{ $image->name }}" alt="{{ $image->name }}" class="img-thumbnail center-block" />
                                    </a>
                                    <p class="help-block text-center small">
                                        {{ $image->name }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>

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
