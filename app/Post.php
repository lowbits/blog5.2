<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category(){
      return $this->belongsTo('App\Category');  //category gehört zu einer KATEGORIE ABER!, CATEGORIES hat viele POSTS ....
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }
}
