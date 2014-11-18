<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Dynamix Feature Matrix::reset</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>
	<body>
	    <h1>Dynamix Feature Matrix<small> Set Your New Password</small></h1>
	
	    {{ Form::open() }}
	        <input type="hidden" name="token" value="{{ $token }}">
	
	        <div>
	            {{ Form::label('email', 'Email Address:') }}
	            {{ Form::email('email') }}
	        </div>
	
	        <div>
	            {{ Form::label('password', 'Password:') }}
	            {{ Form::password('password') }}
	        </div>
	
	        <div>
	            {{ Form::label('password_confirmation', 'Password Confirmation:') }}
	            {{ Form::password('password_confirmation') }}
	        </div>
	
	        <div>
	            {{ Form::submit('Submit') }}
	        </div>
	    </form>
	
	    @if (Session::has('error'))
	        <p style="color: red;">{{ Session::get('error') }}</p>
	    @endif
	</body>
</html>