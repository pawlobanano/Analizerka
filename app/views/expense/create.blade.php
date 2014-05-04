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

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Create Expense</h1>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

    <div class="panel-body">

        {{ Form::open(['url' => 'expense', 'class' => 'form-horizontal', 'role' => 'form']) }}

            <!-- TODO -> get user_id from current session -->
            {{ Form::hidden('user_id', '1') }}

            @foreach( $errors->get('date') as $message )
                <p class="text-danger">{{ $message }}</p>
            @endforeach
            @if ( $errors->has('date') )
            <div class="form-group input-group has-error">
            @else
            <div class="form-group input-group">
            @endif
                <span class="input-group-addon">Date</span>
                {{ Form::input('datetime', 'date', null, ['class' => 'form-control', 'placeholder' => '11-11-2014']) }}
            </div>

            <div class="form-group input-group">
                <span class="input-group-addon">Category</span>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $id => $category)

                    <option value="{{ $id }}" @if ($id===1) {{ 'selected' }} @endif>{{ $category }}</option>

                    @endforeach
                </select>
            </div>

            @foreach( $errors->get('value') as $message )
            <p class="text-danger">{{ $message }}</p>
            @endforeach
            @if ( $errors->has('value') )
            <div class="form-group input-group has-error">
            @else
            <div class="form-group input-group">
            @endif
                <span class="input-group-addon">Value</span>
                {{ Form::text('value', null, ['class' => 'form-control', 'placeholder' => '11,11']) }}
            </div>

            @foreach( $errors->get('comment') as $message )
            <p class="text-danger">{{ $message }}</p>
            @endforeach
            @if ( $errors->has('comment') )
            <div class="form-group input-group has-error">
            @else
            <div class="form-group input-group">
            @endif
                <span class="input-group-addon">Comment</span>
                {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'A comment maybe?']) }}
            </div>

            <div class="form-group input-group">
                {{ Form::submit('Create the Expense!', ['class' => 'btn btn-primary']) }}
            </div>

        {{ Form::close() }}

    </div>
    <!-- /.panel-body -->

</div>
<!-- /#page-wrapper -->
@show

@stop

@stop