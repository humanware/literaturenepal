@extends('layouts.admin')

@section('page-header')
    Posts
@endsection

@section('content')
    @if(Session::has('deleted_post'))
        <div class="alert alert-danger">
            {{session('deleted_post')}}
        </div>
    @elseif(Session::has('updated_post'))
        <div class="alert alert-success">
            {{session('updated_post')}}
        </div>
    @elseif(Session::has('created_post'))
        <div class="alert alert-success">
            {{session('created_post')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Picture</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td><img height="50" src="{{ $post->picture ? $post->picture->path : 'http://placehold.it/50x50' }}" /></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{ str_limit($post->body, 20) }}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->slug)}}">{{count($post->comments) . ' comments'}}</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@stop