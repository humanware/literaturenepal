@extends('layouts.admin')

@section('page-header')
    Media
@endsection

@section('content')
    @if(Session::has('deleted_media'))
        <div class="alert alert-danger">
            {{session('deleted_media')}}
        </div>
    @elseif(Session::has('updated_media'))
        <div class="alert alert-success">
            {{session('updated_media')}}
        </div>
    @elseif(Session::has('created_media'))
        <div class="alert alert-success">
            {{session('created_media')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->path}}" /></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop