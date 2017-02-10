<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

  // Authentification Routes
  Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
  Route::post('auth/login', 'Auth\AuthController@postLogin');
  Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
  // Registration Routes
  Route::get('auth/register', 'Auth\AuthController@getRegister');
  Route::post('auth/register', 'Auth\AuthController@postRegister');

  //Passwörter zurücksetzen ...
  Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
  Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
  Route::post('password/reset', 'Auth\PasswordController@reset');
//---------------------------------------------------------------------------------------------//

  //Unsere category Routes !
Route::resource('categories', 'CategoryController', ['except' => 'create']); // alle funktionen aus unserem CategoryController | except=ausnhahme :create
 //Unsere tag Routes!
Route::resource('tags', 'TagController', ['except' => 'create']);


//comments Routes!
  Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
  Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
  Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
  Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
  Route::get('comment/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);



Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
      ->where('slug', '[\w\d\-\_\ä\ö\ü]+'); //reguläre Sprache \w = alle wörter \d= alle zahlen \- ist klar! \_ ist eben so klar
Route::get('blog',['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

Route::resource('posts', 'PostController');  //alle funktionen aus unserem PostController
