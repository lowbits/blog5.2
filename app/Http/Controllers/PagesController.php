<?php

  namespace App\Http\Controllers;

  use App\Post;
  class PagesController extends Controller {

      public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();  //wir müssen hier nicht db:: nutzen, da wir post haben und da schon auf die datenbank zugegriffen wird!
        return view('pages.welcome')->withPosts($posts);         //  der . ist genau wie ein / !!!
      }

      public function getAbout(){
        $first = 'Tobias';
        $last = 'Lobitz';
        $email = 't.lobitz@candvision.de';
        $data['email'] = $email;
        $fullname = $first ." ". $last;
        return view('pages.about')->withFullname($fullname)->withData($data);
      }

      public function getContact(){
        return view('pages.contact');
      }


  }


 ?>
