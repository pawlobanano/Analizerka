@extends('layouts.wrapper')


@section('title')
@parent

Expense Edit
@stop


@section('wrapper')
@parent

@section('page-wrapper')

@section('content')
<div id="page-wrapper">

    <ol class="breadcrumb">
        <li><a href="{{ URL::route('expense.index') }}">{{ ucfirst(Request::segment(1)) }}</a></li>
        <li class="active">{{ ucfirst(Request::segment(3)) }}</li>
    </ol>

    <!-- will be used to show any messages -->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <div class="col-lg-12">
        <h1>Edit Expense</h1>
    </div>
    <!-- /.col-lg-12 -->

    <div class="panel-body">

        {{ Form::model($expense, ['route' => ['expense.update', $expense->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true]) }}


        <!-- todo -> get user_id from current session -->
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
            {{ Form::input('datetime', 'date', null, ['class' => 'form-control']) }}
        </div>


        <div class="form-group input-group">
            <span class="input-group-addon">Category</span>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" {{ ($expense->category && $id == $expense->category->id) ? 'selected' : '' }}>{{{ $name }}}</option>
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
            <input type="text" name="value" value="{{ str_replace('.', ',', $expense->value) }}" class="form-control">
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
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3']) }}
        </div>


        @foreach ($errors->get('image') as $message)
            <p class="text-danger">{{ $message }}</p>
        @endforeach

        @if ($errors->has('image'))
            <div class="form-group input-group has-error">
        @else
            <div class="form-group input-group">
        @endif
            <span class="input-group-btn">
                <span class="btn btn-default btn-file" style="background-color: #eee">
                    <i class="fa fa-picture-o fa-lg"></i> Browse {{ Form::file('image[]', ['class' => 'form-control', 'multiple' => true]) }}
                </span>
            </span>
            {{ Form::text(null, null, ['class' => 'form-control', 'readonly' => '']) }}
        </div>

        <p style="margin-bottom: 25px">
            {{ Form::submit('Edit the Expense!', ['class' =>'btn btn-primary']) }}
            <a href="{{ URL::route('expense.index') }}" class="btn btn-info">Expenses list</a>
        </p>

        {{ Form::close() }}


        <div class="row">
            @foreach ($images as $image)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 10px">

                    <a href="{{ URL::asset('uploads') }}/{{ $image->folder_name }}/{{ $image->name }}">
                        <img src="{{ URL::asset('uploads') }}/{{ $image->folder_name }}/{{ $image->name }}" alt="{{ $image->name }}" class="img-thumbnail center-block" />
                    </a>

                    {{ Form::open(['route' => ['image.destroy', $image->id], 'method' => 'DELETE']) }}
                        <p class="help-block text-center small">
                            {{ $image->name }}
                            <button type="submit" class="btn btn-danger btn-xs" onclick="if(!confirm('I\'ll do it!')){return false;};"><i class="fa fa-trash-o fa-fw"></i></button>
                        </p>
                    {{ Form::close() }}

                </div>
            @endforeach
        </div>

    </div>
    <!-- /.panel-body -->

</div>
<!-- /#page-wrapper -->
@show

@stop

@stop
