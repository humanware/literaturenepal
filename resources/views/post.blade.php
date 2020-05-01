@extends('layouts.blog-post')

@section('content')

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->picture->path}}" alt="">

    <hr>

    <!-- Post Content -->
    {{$post->body}}

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>
        @if(Session::has('comment_message'))
            <div class="alert alert-warning">
                {{session('comment_message')}}
            </div>
        @endif
        {{Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store'])}}
        <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::label('body', 'Comment') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="64" src="{{Auth::user()->gravatar}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}


                    @if(count($comment->replies) > 0)

                        @foreach($comment->replies as $reply)

                            @if($reply->is_active == 1)

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply">
                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                            <div class="form-group">
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                {!! Form::label('body', 'Reply') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('custom-scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@endsection
