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

    @if (Session::has('error'))
        <div class="alert alert-danger" style="margin: 20px 0 0">{{ Session::get('error') }}</div>
    @endif

    <div class="row">

        <div class="col-xs-12">

            <div class="col-xs-12">

                <h3>Add Expense</h3>

                {{ Form::open(['url' => 'expense', 'role' => 'form', 'files' => true]) }}

                    <!-- @todo get user_id from current session -->
                    {{ Form::hidden('user_id', '1') }}

                    <div class="row">
                        <div class="col-xs-12">

                            @foreach ($errors->get('date') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach

                            @if ($errors->has('date'))
                                <div class="form-group input-group has-error">
                            @else
                                <div class="form-group input-group">
                            @endif
                                    <span class="input-group-addon">Date</span>
                                        {{ Form::text('date', $today, ['class' => 'form-control', 'placeholder' => '11-11-2014']) }}
                                </div><!-- /.form-group -->

                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Category</span>
                                <select class="form-control" id="category_id" name="category_id">
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.form-group -->

                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">

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
                                </div><!-- /.form-group -->

                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-xs-12">

                            @foreach ($errors->get('comment') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach

                            @if ($errors->has('comment'))
                                <div class="form-group input-group has-error">
                            @else
                                <div class="form-group input-group">
                            @endif
                                    <span class="input-group-addon">Comment</span>
                                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'A comment maybe?', 'rows' => '2']) }}
                                </div><!-- /.form-group -->

                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">

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
                                    {{ Form::text(null, null, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                                </div><!-- /.form-group -->

                        </div><!-- /.col-xs-12 -->
                    </div><!-- /.row -->

                    {{ Form::submit('Add the Expense!', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}

            </div><!-- /.col-xs-12 -->

        </div><!-- /.col-xs-12 -->

    </div><!-- /.row -->

</div><!-- /#page-wrapper -->
@show

@stop

@stop
