@extends('main')

@section('content')

<div class="row"> <!-- ROW open -->
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

  <div class="col-md-8">
    {{ Form::label('title', 'Title:')}}
    {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
    {{ Form::label('slug', 'Url:', ['class' => 'form-spacing-top']) }}
    {{ Form::text('slug', null, ['class' => 'form-control'])}}
    {{ Form::label('body', 'Body:', ['class'=> 'form-spacing-top'])}}
    {{ Form::textarea('body', null, ["class" => 'form-control']) }}

  </div>




 <div class="col-md-4"> <!-- SIDEBAR -->
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
            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' =>'btn btn-danger btn-block')) !!}
            <!-- ist das gleich wie :
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a> -->
          </div>
          <div class="col-md-6">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])  }}
            <!-- ist das gleiche wie :
            <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block">Delete</a> -->
          </div>
      </div>
    </div>
  </div> <!-- sidebar ende -->

  {!! Form::close() !!}
</div> <!-- row ende -->

@endsection
