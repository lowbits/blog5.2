@extends('main')

@section('content')
<div class="row">
    <div class="col-md-8">
      <h1>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} Posts</small> </h1>

    </div>
    <div class="col-md-2 col-md-offset-2">
      <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary btn-block pull-right form-spacing-top">Edit</a>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Tags</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($tag->posts as $post)
        <tr>
          <th>{{ $post->id }}</th>
          <td>{{ $post->title }}</td>
          <td>@foreach($post->tags as $tag)
              <span class="label label-default">{{$tag->name}}</span>
              @endforeach
          </td>
          <td><a href="{{ route('posts.show', $post->id)}}" clas="btn btn-default btn-xs">view</a></td>
          <tr>
        @endforeach
      </tbody>
    </table>

  </div>

</div>
@stop
