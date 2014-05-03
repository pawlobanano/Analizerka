@extends('layouts.wrapper')


@section('wrapper')
@parent

    @section('page-wrapper')
    <div id="page-wrapper">

        @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Expense</h1>

                {{ Form::open(['route' => 'expenseCreate']) }}

                <!--<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    {{ Form::label('date', 'Expense Date') }}
                </div>

                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                    {{ Form::label('category', 'Category') }}
                    {{ Form::select('category', ['L' => 'Large', 'S' => 'Small']) }}
                </div>-->

                <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                    {{ Form::label('value', 'Value') }}
                    {{ Form::text('value', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                    {{ Form::label('comment', 'Comment') }}
                    {{ Form::text('comment', '', array('class' => 'form-control')) }}
                </div>

                <!--<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    {{ Form::label('image', 'Image Location') }}
                    {{ Form::text('image', Input::old('image', '/images/code.png'),
                    array('placeholder' => 'Image Location', 'class' => 'form-control')) }}
                    <div class="error">{{ $errors->first('image'); }}</div>
                </div>-->



                <!--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {{ Form::label('title', 'Post Title') }}
                    {{ Form::text('title', Input::old('title', 'A New Post About Twitter
                    Bootstrap'), array('placeholder' => 'Post Title', 'class' =>
                    'form-control')) }}
                    <div class="error">{{ $errors->first('title'); }}</div>
                </div>

                <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                    {{ Form::label('text', 'Post Text') }}
                    {{ Form::textarea('text', Input::old('text', 'Lorem ipsum dolor sit amet, no
                    vim virtute detracto comprehensam, iudico mentitum inimicus ad cum. Ne
                    vocibus civibus corpora sea. Clita nominati ut est, at wisi accumsan cum.
                    Voluptatum persequeris per an, ut aperiri delenit vix. Et agam eros
                    omittantur cum, mutat cetero sed te. Iuvaret voluptaria sententiae ea qui,
                    choro discere reprehendunt at nam.'), array('placeholder' => 'Post Text',
                    'class' => 'form-control')) }}
                    <div class="error">{{ $errors->first('text'); }}</div>
                </div>

                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    {{ Form::label('image', 'Image Location') }}
                    {{ Form::text('image', Input::old('image', '/images/code.png'),
                    array('placeholder' => 'Image Location', 'class' => 'form-control')) }}
                    <div class="error">{{ $errors->first('image'); }}</div>
                </div>

                <div class="form-group {{ $errors->has('months[]') ? 'has-error' : '' }}">
                    {{ Form::label('months', 'Months') }}
                    <select name="months[]" id="months" size="12" class="form-control" multiple>
                        @foreach (Month::all() as $month)
                        <option value="{{ $month->id }}">{{ $month->name }}</option>
                        @endforeach
                    </select>

                    <div class="error">{{ $errors->first('months[]'); }}</div>
                </div>-->

                {{ Form::submit('Create Expense', array('class' => 'btn btn-default'))  }}
                {{ Form::close() }}

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @show

    </div>
    <!-- /#page-wrapper -->
    @stop

@stop


