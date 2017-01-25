<?php

  namespace App\Http\Controllers;

  class PagesController extends Controller {

      public function getIndex(){
        return view('pages.welcome');         //  der . ist genau wie ein / !!!
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
