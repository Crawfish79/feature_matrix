<!-- form for creating and editing users -->
@extends('layouts.default')
@section('content')
<div class="well well-sm">
	<!-- adjust heading for edit or create -->
	@if(isset($heading))
		<h3>{{$heading}}</h3>
	@else
		<h3>Register New User</h3>
	@endif
	
	<p>please provide a username,email, and password</p>
</div>
<div class = 'panel panel-default'>
	<div class="panel-body">

	{{ Form::open(array('action'=>'UsersController@create', 'role'=>'form')) }}
		<!--adjust input value to determine if null or will contain user info -->
		@if(isset($heading))	
			{{Form::hidden('authID', Auth::user()->id)}}
			{{Form::hidden('heading', $heading)}}
			<div class="row">
			    <div class="col-md-3 form-group">
			    	{{ Form::label('userName', 'User Name',array('class'=>'text-muted control-label')) }}
			    	{{ Form::text('userName',Auth::user()->userName, array('class'=>'form-control', 'placeholder'=>'* User Name')) }}
			    </div>
			    <div class="col-md-3 form-group">
			    	{{ Form::label('email', 'E-mail',array('class'=>'text-muted control-label')) }}	    	
			    	{{ Form::text('email',Auth::user()->email, array('class'=>'form-control', 'placeholder'=>'* myemail@mail.com')) }}
			    </div>
		@else
			<div class="row">
				<div class="col-md-3 form-group">
			    	{{ Form::label('userName', 'User Name',array('class'=>'text-muted control-label')) }}
			    	{{ Form::text('userName', null, array('class'=>'form-control', 'placeholder'=>'* User Name')) }}
			    </div>
			    <div class="col-md-3 form-group">
			    	{{ Form::label('email', 'E-mail',array('class'=>'text-muted control-label')) }}	    	
			    	{{ Form::text('email',null, array('class'=>'form-control', 'placeholder'=>'* myemail@mail.com')) }}
			    </div>
	    @endif	
	        
	    <div class="col-md-3 form-group">
	    	{{ Form::label('password', 'Password',array('class'=>'text-muted control-label')) }}	    	
	    	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'* Password')) }}
	    </div>
	    <div class="col-md-3 form-group">
	    	{{ Form::label('password_confirmation', 'Confirm Password',array('class'=>'text-muted control-label')) }}	    		    
	    	{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'* Confirm Password')) }}
	    </div>
	    @if(Session::has('message'))	
			<div class="col-md-12"style="height:25px;">
				<p class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;<i>{{Session::get('message')}}</i></p>
			</div>	
		@else
		    <div class="text-danger col-md-3"style="height:25px;"><i>{{ $errors->first('userName') }}</i></div>
		    <div class="text-danger col-md-3"style="height:25px;"><i>{{ $errors->first('email') }}</i></div>
		    <div class="text-danger col-md-3"style="height:25px;"><i>{{ $errors->first('password') }}</i></div>
		 	<div class="text-danger col-md-3"style="height:25px;"><i>{{ $errors->first('password_confirmation') }}</i></div>
		@endif
		
		</div>
		<div style="height:25px;"></div><br>
		<small class="text-muted">* <i>Required Fields</i></small>
		
		<hr class="border">
	    <div>{{ Form::submit('Register', array('class'=>'btn btn-large btn-info btn-block'))}}</div>
	    
	{{ Form::close() }}
	</div>
</div>
@stop

