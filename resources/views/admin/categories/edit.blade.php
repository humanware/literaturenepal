@extends('layouts.admin')

@section('page-header')
    Categories
@endsection

@section('content')
    @if(Session::has('deleted_category'))
        <div class="alert alert-danger">
            {{session('deleted_category')}}
        </div>
    @elseif(Session::has('updated_category'))
        <div class="alert alert-success">
            {{session('updated_category')}}
        </div>
    @elseif(Session::has('created_category'))
        <div class="alert alert-success">
            {{session('created_category')}}
        </div>
    @endif
    <div class="col-md-6">
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
    </div>
@stop