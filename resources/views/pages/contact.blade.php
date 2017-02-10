@extends('main')

 @section('content')

              <div class="row">
                <div class="col-md-12">
                    <h1>Contact Me </h1>
                    <hr>
                    <form class="" action="{{ url('contact') }}" method="POST"> <!-- url('') weil wir die route nicht benannt haben   -->
                      {{ csrf_field() }}
                        <div class="form-group">
                          <label name="email">Email:</label>
                          <input id="email" type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                          <label name="email">Subject:</label>
                          <input id="subject" type="text" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                          <label name="message">Message:</label>
                          <textarea id="message" type="text" name="message" class="form-control">type here some text </textarea>
                        </div>
                        <input type="submit" value="Send Message" class="btn btn-success">
                    </form>
                </div>

              </div>

@endsection
