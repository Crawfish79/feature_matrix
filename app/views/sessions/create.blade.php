<!doctype html>
<html lang="en">
<head>
	<title>Dynamix Feature Matrix::login</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/dynamix_feature_matrix.css">
	<link rel="stylesheet" href="/css/dynamix_login.css">

	{{ HTML::script("http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js")}}	
</head>
<body>
<div class="container">
	<div style = "height:75px"></div>
	<div class ='row'>
		<div class="col-md-12">
			{{HTML::image('images/DynamiX-logo.png','Dynamix Feature Matrix')}}
		</div>		
		<div class="col-md-12">
			<h3 class="text-muted">Feature Matrix<small>&nbsp;Login Panel</small></h3>
		</div>
	</div>
	{{ Form::open(array('route' => 'sessions.store','class'=>'form-signin','role'=>'form')) }}
			<div class ='row'>
				<div class ="col-md-4">
					{{ Form::text('email', Input::old('email'),array('class'=>'form-control','placeholder'=>'  myemail@mail.com')) }}
					<span class="glyphicon glyphicon-envelope"></span>
				</div>
		
				<div class ="col-md-4">
					{{ Form::password('password',array('class'=>'form-control','placeholder'=>'  password')) }}
					<span class="glyphicon glyphicon-lock"></span>
				</div>

				<div class ="col-md-4">
					{{ Form::button('Sign In',array('type' => 'submit','class'=>'btn btn-lg btn-info btn-block')) }}
				</div>
				
				@if(Session::has('message'))	
					<div class="col-md-12"style = "height:25px">
					  <p class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;<i>{{Session::get('message')}}</i></p>
					</div>	
				@else
				
					<div class ="col-md-4"style = "height:25px">
						<div class="text-danger"><i>{{ $errors->first('email') }}</i></div>
					</div>	
						
					<div class ="col-md-4"style = "height:25px">
						<div class="text-danger"><i>{{ $errors->first('password') }}</i></div>
					</div>
				
				@endif	
					<div class="col-md-12">
					  <a><span class="glyphicon glyphicon-lock"></span>&nbsp;reset password</a>
					</div>					
			</div>
			<div style = "height:60px"></div>
	{{ Form::close() }}
</div>	

	@include('partials.footer')

</html>