<?php

  namespace App\Http\Controllers;


  use Illuminate\Http\Request;

  use App\Http\Requests;

  use App\Post;
  use Mail;
  use Session;
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

      public function postContact(Request $request){
            $this->validate($request, [
              'email'   => 'required|email',
              'subject' => 'min:3',
              'message' => 'min:10'
            ]);
            $data = array(
              'email' => $request->email,
              'subject' => $request->subject,             //Hier nur ein beispiel um das Array zu verstehn
              'bodyMessage' => $request->message
            );
            Mail::send('emails.contact', $data, function($message) use ($data){
              $message->from($data['email']);
              $message->to('cvision@candvision.de');
              $message->subject($data['subject']);
            });
            Session::flash('success', 'Your Email was Sent');


              return redirect('/');
      }


  }


 ?>
