@extends('main')

@section('content')

  <div class="row">
    <div class="col-md-8">

      <h1>Categories</h1>

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
           <th>{{ $category->id }}</th>
           <td>{{ $category->name }}</td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div><!-- ende von col-md-8-->
    <div class="col-md-3">
      <div class="well">
        {!! Form::open(['route' => 'categories.store']) !!}
            <h3>New Category</h3>
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
          {{ Form::submit('New Category',['class' => 'btn btn-success btn-block form-spacing-top']) }}
        {!! Form::close() !!}

      </div>

    </div>

  </div>

@stop
