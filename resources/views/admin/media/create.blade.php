@extends('layouts.admin')

@section('header')
    <link href="{{asset('js/dropzone/dropzone.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    Upload Media
@endsection

@section('content')

    @include('includes.form_errors')

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'files'=>true, 'class'=>'dropzone']) !!}

    {!! Form::close() !!}

    @section('footer')
        <script src="{{asset('js/dropzone/dropzone.min.js')}}"></script>
    @endsection
@stop