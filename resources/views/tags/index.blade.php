@extends('main')

@section('content')

  <div class="row">
    <div class="col-md-8">

      <h1>Tags</h1>

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
          <tr>
           <th>{{ $tag->id }}</th>
           <td><a href="{{route('tags.show', $tag->id)}}">{{ $tag->name }}</a></td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div><!-- ende von col-md-8-->
    <div class="col-md-3">
      <div class="well">
        {!! Form::open(['route' => 'tags.store']) !!}
            <h3>New Tag</h3>
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
          {{ Form::submit('New Tag',['class' => 'btn btn-success btn-block form-spacing-top']) }}
        {!! Form::close() !!}

      </div>

    </div>

  </div>

@stop
