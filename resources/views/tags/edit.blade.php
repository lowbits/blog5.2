@extends('main')

@section('content')
    {{Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
      {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block form-spacing-top']) }}
    {{Form::close() }}

@stop
