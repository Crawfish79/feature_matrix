<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Dynamix Feature Matrix::reminder</title>	
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/dynamix_feature_matrix.css">		
	
	</head>
	<body>
	<div style="margin:10px;">
	
	    {{ Form::open(array('role'=>'form','class'=>'form-horizontal')) }}
	    
	    <h2>Dynamix Feature Matrix<small> Need to reset your password?</small></h2>
	    
	    <div="row">
	   	    <div class="form-group col-md-4">
	            {{ Form::label('email', 'Email Address:',array('class'=>'control-label','style'=>'height:25px;')) }}
	            {{ Form::email('email','',array('class'=>'form-control','placeholder'=>'myemail@mail.com')) }}
	        </div>
	
	        <div class="form-group col-md-10">
	            {{ Form::submit('Reset',array('class'=>'btn btn-info')) }}
	        </div>
	        <div class="form-group col-md-10">
		    @if (Session::has('error'))
		        <p style="color: red;">{{ Session::get('error') }}</p>
		    @elseif (Session::has('status'))
		        <p>{{ Session::get('status') }}</p>
		    @endif
		    </div>	        
	     </div>
	    {{ Form::close() }}
	    
	</div>
	

	</body>
</html>