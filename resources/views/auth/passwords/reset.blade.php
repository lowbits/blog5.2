@extends('main')


@section('content')

 <div class="row">
   <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Reset Password</div>
        <div class="panel-body">
          {!! Form::open(['url' => 'password/reset']) !!} <!-- method POST muss hier nicht eingetragen werden. WEIL ist default! -->

           {{ Form::hidden('token', $token) }} <!-- verstecktes Feld, Laravel wird ein token generieren ! -->
           {{ Form::label('email', 'Email Adresse:')}}
           {{ Form::email('email', $email, ['class' => 'form-control'])}}
           {{ Form::label('password', 'New Password') }}
           {{ Form::password('password', ['class' => 'form-control'])  }}
           {{ Form::label('password_confirmation', 'Confirm New Password') }}
           {{ Form::password('password_confirmation', ['class' => 'form-control'])  }}

           {{ Form::submit('Reset Password', ['class' => 'btn btn-primary login-spacing'])}}

          {!! Form::close() !!}

        </div>

      </div>
   </div>

 </div>

@stop
