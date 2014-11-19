<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Dynamix Feature Matrix::reset</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/dynamix_feature_matrix.css">
	</head>
	<body>
	<div class="container">
	    <h2>Dynamix Feature Matrix<small> Set Your New Password</small></h2>
	
	    {{ Form::open(array('role'=>'form')) }}
		    <div class="row">		
		        <div class="col-md-4 form-group">
		            {{ Form::label('email', 'Email Address',array('class'=>'control-label')) }}
		            {{ Form::email('email','',array('class'=>'form-control','placeholder'=>'myemail@mail.com')) }}
		        </div>
		
		        <div class="col-md-4 form-group">
		            {{ Form::label('password', 'Password',array('class'=>'control-label')) }}
		            {{ Form::password('password',array('class'=>'form-control')) }}
		        </div>
		
		        <div class="col-md-4 form-group">
		            {{ Form::label('password_confirmation', 'Password Confirmation',array('class'=>'control-label')) }}
		            {{ Form::password('password_confirmation',array('class'=>'form-control')) }}
		        </div>
				
				<div class="col-md-12"style="height:25px;">
				    @if (Session::has('error'))
				        <p class="text-danger">{{ Session::get('error') }}</p>
				    @endif
				</div>
		        
		        <div class="col-md-12">
		            {{ Form::submit('Submit',array('class'=>'btn btn-info pull-right')) }}
		        </div>		        
		    </div>
		    <input type="hidden" name="token" value="{{ $token }}">	        
	    </form>
	    </div>
	</body>
</html>