@extends('layouts.default')
@section('content')
<div class="well well-sm">
	<h3>Register New User</h3>
	<p>please provide a username and password</p>
</div>
<div class = 'panel panel-default'>
	<div class="panel-body">

	{{ Form::open(array('action'=>'UsersController@create', 'role'=>'form')) }}
		<div class="row">
			
	    <div class="col-md-4 form-group">
	    	{{ Form::label('userName', 'User Name',array('class'=>'text-muted control-label')) }}
	    	{{ Form::text('userName', null, array('class'=>'form-control', 'placeholder'=>'* User Name')) }}
	    </div>
	    <div class="col-md-4 form-group">
	    	{{ Form::label('password', 'Password',array('class'=>'text-muted control-label')) }}	    	
	    	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'* Password')) }}
	    </div>
	    <div class="col-md-4 form-group">
	    	{{ Form::label('password_confirmation', 'Confirm Password',array('class'=>'text-muted control-label')) }}	    		    
	    	{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'* Confirm Password')) }}
	    </div>
	    <div class="text-danger col-md-4"style="height:25px;"><i>{{ $errors->first('userName') }}</i></div>
	    <div class="text-danger col-md-4"style="height:25px;"><i>{{ $errors->first('password') }}</i></div>
	 	<div class="text-danger col-md-4"style="height:25px;"><i>{{ $errors->first('password_confirmation') }}</i></div>
		</div>
		
		<small class="text-muted">* <i>Required Fields</i></small>
		
		<hr class="border">
	    <div>{{ Form::submit('Register', array('class'=>'btn btn-large btn-info btn-block'))}}</div>
	    
	{{ Form::close() }}
	</div>
</div>
@stop

