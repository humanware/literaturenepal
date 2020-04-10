@extends('layouts.admin')

@section('page-header')
    Users
@endsection

@section('content')
    @if(Session::has('deleted_user'))
        <div class="alert alert-danger">
            {{session('deleted_user')}}
        </div>
    @elseif(Session::has('updated_user'))
        <div class="alert alert-success">
            {{session('updated_user')}}
        </div>
    @elseif(Session::has('created_user'))
        <div class="alert alert-success">
            {{session('created_user')}}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <img height="50" src="{{ $user->picture ? $user->picture->path : 'http://placehold.it/50x50' }}" />
                    </td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop