<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories'; //wir sagen hier, wenn wir ein neues model von Category erstellen, dann soll auf categories aus der datenbank zugegrifen werden!

    public function posts(){
      return $this->hasMany('App\Post');
    }
    
}
