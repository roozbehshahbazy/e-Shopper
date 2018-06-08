@extends('auth')
@section('title', '| Login')
@section('content')
<section id="form">
	<div class="container">
		<div class="col-sm-3 col-sm-offset-4">
			<h2>Admin Login</h2>
			<br>
			
			<p class="validation-error">{{  $errors->first('username')  }}</p>
			{!! Form::open(['route'=>'admin.login.submit']) !!}
			{{ Form::label('username', 'Username')}}
			{{ Form::text('username', null, ['class' => 'form-control']) }}
			<br>
			{{ Form::label('password', "Password")}}
			{{ Form::password('password', ['class'=> 'form-control']) }}
			
			<br>
			
			
			{{ Form::checkbox('remember') }}
			{{ Form::label('remeber',"Keep me signed in")}}
			<br>
			
			
			{{ Form::submit('Login', ['class' => 'btn btn-default btn-block']) }}
			{!! Form::close() !!}

		</div>
	</div>
</section>
@endsection