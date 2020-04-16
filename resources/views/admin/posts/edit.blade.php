@extends('layouts.admin')

@section('page-header')
    Edit Post
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.form_errors')
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive img-rounded" src="{{ $post->picture ? $post->picture->path : 'http://placehold.it/400x400' }}" />
        </div>
        <div class="col-md-9">
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

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
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop