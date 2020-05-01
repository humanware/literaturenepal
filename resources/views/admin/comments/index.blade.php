@extends('layouts.admin')

@section('page-header')
    Comments
@endsection

@section('content')
    @if(Session::has('deleted_comment'))
        <div class="alert alert-danger">
            {{session('deleted_comment')}}
        </div>
    @elseif(Session::has('updated_comment'))
        <div class="alert alert-success">
            {{session('updated_comment')}}
        </div>
    @elseif(Session::has('created_comment'))
        <div class="alert alert-success">
            {{session('created_comment')}}
        </div>
    @endif
    <table class="table">
        @if(count($comments) > 0)
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Post</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a href="{{route('home.post', $comment->post->slug)}}">{{$comment->post->title}}</a></td>
                        <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">{{count($comment->replies)}} replies</a></td>
                        <td>{{$comment->created_at}}</td>
                        <td>{{$comment->updated_at}}</td>
                        <td>
                            @if ($comment->is_active == 1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">
                                        {!! Form::submit('Unapprove', ['class'=>'btn btn-warning']) !!}
                                    </div>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <h1 class="text-center">No comments found</h1>
        @endif
    </table>
@stop