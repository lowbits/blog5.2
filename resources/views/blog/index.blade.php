@extends('main')

@section('content')


  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Blog</h1>
    </div>

  </div>

  <?php $count=0; ?>
  <?php $countmod=0; ?>
  <!-- nicht schön aber funktioniert
  also in der ersten foreach zählen wir unsere modulo opertor hoch
  in der zweiten foreach teilen wir unseren count durch den modulo
  unser modulo ist so hoch, wie unsere post sind !
  -->
  @foreach($posts as $post)
  <?php $countmod++; ?>
  @endforeach
  @foreach($posts as $post)
  <?php $count++; ?>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>{{ $post->title }}</h2>
        <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

        <p>{{ substr($post->body,0,250)}} {{ strlen($post->body) > 250? '...' : ""}} </p>

        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>


    <?php
      if($countmod<= 10){
        if(!($count%$countmod)==0){   //damit nach dem letzten Post kein hr mehr kommt
          echo "<hr>";
        }
      }else{
        if(!($count%10)==0){   //damit nach dem letzten Post kein hr mehr kommt
          echo "<hr>";
        }
      }
    ?>

    </div>
  </div>
  @endforeach

  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
          {!! $posts->links() !!}
      </div>
    </div>
  </div>

@endsection
