<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
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
        return view('posts.create');

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
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required'
        ));

        //in die datenbank speichern !
        $post = new Post;

        $post->title = $request->title;  //hier daten in die datenbank übernehmen
        $post->slug  = $request->slug;
        $post->body  = $request->body;

        $post->save(); //hier in die datenbank schieben ! flush

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
        //
        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
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
        //edit -> save changes -> update in der Datenbank !
          $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required'
          ));

          //finde post mit der gegebenen ID
          $post = Post::find($id);

          //hier werden die neuerungen gesetzt !
          $post->title = $request->input('title');
          $post->slug = $request->input('slug');
          $post->body  = $request->input('body');
          //und abflug! Also daten in die Datenbank pushen
          $post->save();
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
