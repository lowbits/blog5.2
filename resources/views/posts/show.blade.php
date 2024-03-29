@extends('main')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <img src="{{asset('images/'.$post->image)}}" alt="">
      <h1>{{ $post->title }}</h1>
      <p class="lead">{!! $post->body !!}</p>
      <hr>
      <div class="tags">

        @foreach($post->tags as $tag)
        <span class="label label-default">{{ $tag->name }}</span>
        @endforeach
      </div>
      <div class="backend-comments">
          <h3>Comments: <small>{{ $post->comments()->count() }} total</small></h3>

          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th width="70px"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($post->comments as $comment)
              <tr>
              <td>{{$comment->name}}</td>
              <td>{{$comment->email}}</td>
              <td>{{$comment->comment}}</td>
              <td>
                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">
                  <span class="glyphicon glyphicon-pencil"></span>
               </a>
               <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">
                 <span class="glyphicon glyphicon-trash"></span>
               </a>
             </td>
           </tr>
              @endforeach
            </tbody>

          </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p> <!-- {{ route('blog.single', $post->slug) == url('blog/'.$post->slug)}} -->
        </dl>

        <dl class="dl-horizontal">
          <label>Category:</label>
          <p>{{ $post->category->name }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>Created At:</label>
          <p>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>Edited At:</label>
          <p>{{ date('M j, Y  H:i', strtotime($post->updated_at)) }}</p>
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
            <div class="row">
            <div class="col-md-12">
              {!! Html::linkRoute('posts.index', '<< See All Posts', array($post->id), array('class' =>'btn btn-default btn-block btn-h1-spacing')) !!}
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
