@extends('main')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body}}</p>
        <hr>
        <p>Posted In: <a class="category_a">{{ $post->category->name }}</a></p>
    </div>

  </div>

@stop
