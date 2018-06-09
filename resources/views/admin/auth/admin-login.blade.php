
<!doctype html>
<html lang="en" style="height: 100%;">

@include('admin/partials/_head')

  <body id="signin-body">
    
    <div class='form-signin-container'>
   
      
      <h2 class="h3 mb-3 font-weight-normal text-center">Admin Login</h2>
      <p class="validation-error">{{  $errors->first('username')  }}</p>
      {!!Form::open(['route'=>'admin.login.submit','class'=>'form-signin']) !!}
      {{ Form::label('username', 'Username')}}
      {{ Form::text('username', null, ['class' => 'form-control']) }}
      <br>
      {{ Form::label('password', "Password")}}
      {{ Form::password('password', ['class'=> 'form-control']) }}
      <br>
      {{ Form::checkbox('remember') }}
      {{ Form::label('remeber',"Keep me signed in")}}
      <br>
      
      
      {{ Form::submit('Login', ['class' => 'btn btn-default btn-block btn-signin']) }}
      {!! Form::close() !!}

</div>


  </body>
</html>