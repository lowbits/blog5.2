<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category(){
      return $this->belongsTo('App\Category');  //category gehört zu einer KATEGORIE ABER!, CATEGORIES hat viele POSTS ....
    }
}
