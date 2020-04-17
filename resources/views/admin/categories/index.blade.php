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
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-default">Edit</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop