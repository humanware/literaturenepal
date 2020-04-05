@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img class="img-responsive img-rounded" src="{{ $user->picture ? $user->picture->path : 'http://placehold.it/400x400' }}" />
    </div>

    <div class="col-sm-9">
        @include('includes.form_errors')

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter your full name']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'you@yourdomain.com']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('picture_id', 'Picture') !!}
            {!! Form::file('picture_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Please type your password']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop