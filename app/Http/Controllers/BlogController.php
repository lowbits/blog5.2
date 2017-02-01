<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post; //damit unsere POST.php geladen wird
class BlogController extends Controller
{
    //
    public function getIndex(){
      $posts = Post::paginate(10);

      return view('blog.index')->withPosts($posts);
    }
    public function getSingle($slug){
        //slug aus der Datenbank holen
        $post = Post::where('slug', '=', $slug)->first(); //wir könnten auch ->get() nehmen aber ->first() endet beim ersten. Wir haben nur einen; also schneller !
        //return view datenbank einnahme, ausgeben !
        return view('blog.single')->withPost($post);
    }


}
