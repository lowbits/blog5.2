<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //hier validieren wir die angeforderten daten
        $this->validate($request, array(
            'title'       => 'required|max:255',
            'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body'        => 'required'
        ));

        //in die datenbank speichern !
        $post = new Post;

        $post->title       = $request->title;  //hier daten in die datenbank übernehmen
        $post->slug        = $request->slug;
        $post->category_id = $request->category_id;

        $post->body        = $request->body;

        $post->save(); //hier in die datenbank schieben ! flush
        $post->tags()->sync($request->tags, false); //synchroniszie TAGS mit posts | False bedeutet überschreibt die alten nicht, addet nur neue
        Session::flash('success', 'The blog post was successfully save!');

        //auf andere seiten weiterleiten
          return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        // gleiche wie withPost($post);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ein anderes beispiel für SELECT etwas komplizierter auf den ersten blick.
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
          $cats[$category->id] = $category->name;   //keys fürs select in edit.blade.
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag){
          $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        //edit -> save changes -> update in der Datenbank !
          if($request->input('slug') == $post->slug){
            $this->validate($request, array(
                'title'       => 'required|max:255',
                'category_id' => 'required|integer',
                'body'        => 'required'
            ));
          }else{
            $this->validate($request, array(
              'title'       => 'required|max:255',
              'category_id' => 'required|integer',
              'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
              'body'        => 'required'
            ));
          }

          //finde post mit der gegebenen ID

          //hier werden die neuerungen gesetzt !
          $post->title       = $request->input('title');
          $post->slug        = $request->input('slug');
          $post->category_id = $request->input('category_id');
          $post->body        = $request->input('body');
          //und abflug! Also daten in die Datenbank pushen
          $post->save();

          if(isset($request->tags)){ //wenn tags übergeben werden !
            $post->tags()->sync($request->tags, true);  //hier true, weil hier unsere tags überschrieben werden!
          }else{                                       //DA wenn false: Hätten wir 1 tag angegben, und wir löschen dieses, ersetzten es mit einem anderen
            $post->tags()->sync(array());             //dann würde wir 2 tags haben, das alte und das NEUE .....
          }
          //flashnachricht bei erfolgreichem update
          Session::flash('success', 'Post was successfully updated!');

          return redirect()->route('posts.show', $post->id); //zurück zur seite mit dem Post
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id); //methode um unser Post zu finden

        $post->delete();
        Session::flash('success', 'Unser Post wurde erfolgreich gelöscht!');
        return redirect()->route('posts.index'); //zurück zur seite mit dem Post
    }
}
