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

        <!-- if there are creation errors, they will show here -->
        @if ( $errors->count() > 0 )
        <p>The following errors have occurred:</p>

        <ul>
            @foreach( $errors->all() as $message )
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['url' => 'expense', 'class' => 'form-horizontal']) }}

        <!-- TODO -> get user_id from current session -->
        {{ Form::hidden('user_id', '1') }}

        <div class="form-group">
            {{ Form::label('date', 'Date', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {{ Form::text('date', null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Category', ['class' => 'col-sm-2 control-label']) }}

            <div class="col-sm-10">
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $id => $category)

                    <option value="{{ $id }}" @if ($id===1) {{ 'selected' }} @endif>{{ $category }}</option>

                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('value', 'Value', ['class' => 'col-sm-2 control-label']) }}

            <div class="col-sm-10">
                {{ Form::text('value', null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comment', 'Comment', ['class' => 'col-sm-2 control-label']) }}

            <div class="col-sm-10">
                {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Create the Expense!', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
    <!-- /.panel-body -->

</div>
<!-- /#page-wrapper -->
@show

@stop

@stop
