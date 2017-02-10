@extends('main')

@section('content')


 <h1>Edit Comment:</h1>
  {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method'=> 'PUT']) }}
        {{ Form::label('name', 'Name:')}}
        {{ Form::text('name', null, ['class'=>'form-control', 'disabled' => 'disabled' ])}}

        {{ Form::label('email', 'Email:')}}
        {{ Form::email('email', null, ['class'=>'form-control', 'disabled' => 'disabled' ])}}

        {{ Form::label('comment', 'Comment:')}}
        {{ Form::textarea('comment', null, ['class'=>'form-control'])}}

        {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success spacing-top-5'])}}
  {{ Form::close() }}
@endsection
