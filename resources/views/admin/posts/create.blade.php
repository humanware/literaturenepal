@extends('layouts.admin')

@section('page-header')
    Create Post
@endsection

@section('content')

    @include('includes.tinyeditor')

    <div class="row">
        <div class="col-md-12">
            @include('includes.form_errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>4]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('picture_id', 'Picture') !!}
                {!! Form::file('picture_id', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', ['' => 'Choose Category'] + $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop