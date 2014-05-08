@extends('layouts.wrapper')


@section('title')
@parent

Expense Create
@stop


@section('wrapper')
@parent

@section('page-wrapper')

@section('content')
<div id="page-wrapper">

    <ol class="breadcrumb">
        <li><a href="{{ URL::route('expense.index') }}">{{ ucfirst(Request::segment(1)) }}</a></li>
        <li class="active">{{ ucfirst(Request::segment(2)) }}</li>
    </ol>

    <!-- will be used to show any messages -->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif




    <div class="panel-body">

        {{ Form::open(['url' => 'expense', 'class' => 'form-horizontal', 'role' => 'form']) }}


        <!-- TODO -> get user_id from current session -->
        {{ Form::hidden('user_id', '1') }}


        @foreach ($errors->get('date') as $message)
            <p class="text-danger">{{ $message }}</p>
        @endforeach

        @if ($errors->has('date'))
            <div class="form-group input-group has-error">
        @else
            <div class="form-group input-group">
        @endif
            <span class="input-group-addon">Date</span>
                {{ Form::text('date', null, ['class' => 'form-control', 'placeholder' => '11-11-2014']) }}
        </div>


        <div class="form-group input-group">
            <span class="input-group-addon">Category</span>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        @foreach ($errors->get('value') as $message)
            <p class="text-danger">{{ $message }}</p>
        @endforeach

        @if ($errors->has('value'))
            <div class="form-group input-group has-error">
        @else
            <div class="form-group input-group">
        @endif
            <span class="input-group-addon">Value</span>
                {{ Form::text('value', null, ['class' => 'form-control', 'placeholder' => '11,11']) }}
        </div>


        @foreach ($errors->get('comment') as $message)
            <p class="text-danger">{{ $message }}</p>
        @endforeach

        @if ($errors->has('comment'))
            <div class="form-group input-group has-error">
        @else
            <div class="form-group input-group">
        @endif
            <span class="input-group-addon">Comment</span>
                {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'A comment maybe?']) }}
        </div>


        @foreach ($errors->get('file') as $message)
        <p class="text-danger">{{ $message }}</p>
        @endforeach

        @if ($errors->has('photo'))
            <div class="form-group input-group has-error">
        @else
            <div class="form-group input-group">
        @endif
            <span class="input-group-btn">
                <span class="btn btn-default btn-file" style="background-color: #eee">
                    <i class="fa fa-picture-o fa-lg"></i> Browse {{ Form::file('photo', ['multiple' => '']) }}
                </span>
            </span>
            {{ Form::text(null, null, ['class' => 'form-control', 'readonly' => '']) }}
        </div>


        {{ Form::submit('Create the Expense!', ['class' => 'btn btn-primary']) }}

        <a href="{{ URL::route('expense.index') }}" class="btn btn-info">No, take me back!</a>


        {{ Form::close() }}

    </div>
    <!-- /.panel-body -->

</div>
<!-- /#page-wrapper -->
@show

@stop

@stop
