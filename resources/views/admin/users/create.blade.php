@extends('layouts.admin')

@section('page-header')
    Create User
@endsection

@section('content')

    @include('includes.form_errors')

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
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
            {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], 0, ['class'=>'form-control']) !!}
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
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop