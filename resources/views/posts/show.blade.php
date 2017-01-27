@extends('main')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>
      <p class="lead">{{ $post->body }}</p>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Edited At:</dt>
          <dd>{{ date('M j, Y  H:i', strtotime($post->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
            <div class="col-md-6">
              {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' =>'btn btn-primary btn-block')) !!}
              <!-- ist das gleich wie :
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a> -->
            </div>
            <div class="col-md-6">
              {!! Form::open(array('route'=>['posts.destroy' , $post->id], 'method' => 'DELETE')) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!} <!--    unser submit button   -->
                      <!--  {!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' =>'btn btn-danger btn-block')) !!} -->
                      <!-- ist das gleiche wie :
                      <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block">Delete</a> -->
              {!! Form::close() !!}


            </div>
        </div>
      </div>
    </div>
  </div>

@endsection