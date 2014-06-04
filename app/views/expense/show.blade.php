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

            <div class="col-xs-12">

                <table class="table">
                    <tr>
                        <td style="border-top: 0; padding: 0"><h3>Expense</h3></td>
                        <td style="border-top: 0; padding: 0; vertical-align: middle">
                            {{ Form::open(['route' => ['expense.destroy', $expense->id], 'method' => 'DELETE']) }}
                                <a href="{{ URL::route('expense.edit', $expense->id) }}" class="btn btn-warning" role="button"><i class="fa fa-pencil fa-fw"></i></a>
                                <button type="submit" class="btn btn-danger" onclick="if(!confirm('I\'ll do it!')){return false;};"><i class="fa fa-trash-o fa-fw"></i></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                </table>

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
                    @if (count($images)) <p class="text-left">{{ count($images) }}</p> @endif
                </div><!-- /.col-xs-9 -->

            </div><!-- /.col-xs-12 -->

        </div><!-- /.col-xs-12 -->

    </div><!-- /.row -->

    @if (count($images))
        <div class="row">
            <div class="col-xs-12">
                @foreach ($images as $image)
                    <div class="col-xs-12 col-sm-6 col-lg-3" style="margin-bottom: 10px">
                        <a href="{{ URL::asset('uploads') }}/{{ $image->folder_name }}/{{ $image->name }}">
                            <img src="{{ URL::asset('uploads') }}/{{ $image->folder_name }}/{{ $image->name }}" alt="{{ $image->name }}" class="img-thumbnail center-block" />
                        </a>
                        <p class="help-block text-center small">
                            {{ $image->name }}
                        </p>
                    </div><!-- /.col-xs-9 -->
                @endforeach
            </div><!-- /.col-xs-12 -->
        </div><!-- /.row -->
    @endif

</div><!-- /#page-wrapper -->
@show

@stop

@stop
