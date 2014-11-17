
@extends('layouts.default')
@section('content')


		<div class="well well-sm">
				<h3>Website Registration</h3>
				<p>please provide site name, description, and launch date</p>
		</div>

		<div class="panel panel-default">		
			<div class="panel-body">									
					{{ Form::open(['url'=> '/site_register','role'=>'form']) }}
							
						@if(isset($_POST['clientID']))
						
							<p class="text-danger">** EDIT | SITE ID:{{Input::get('clientID')}} **</p>
							
							<div class="row">
							<div class="form-group col-md-4">					
								{{ Form::label('siteName', 'Site Name',array('class'=>'text-muted control-label')) }}
								{{ Form::text('siteName',Input::get('siteName'),['placeholder'=>'* www.example.com','class'=>'form-control']) }}		
							</div>
							
							<div class="form-group col-md-4">
								{{ Form::label('description', 'Description',array('class'=>'text-muted control-label')) }}
								{{ Form::text('description',Input::get('description'),['placeholder'=>'* This site ...','class'=>'form-control']) }}
							</div>
								
							<div class="form-group col-md-4">
								{{ Form::label('launchDate', 'Launch Date',array('class'=>'text-muted control-label')) }}
								{{ Form::text('launchDate',Input::get('launchDate'),['id'=>'datepicker','placeholder'=>'* (yyyy-mm-dd)','class'=>'form-control']) }}
							</div>								
													
						@else
							
							<div class="row">
							<div class="form-group col-md-4">					
								{{ Form::label('siteName', 'Site Name',array('class'=>'text-muted control-label')) }}
								{{ Form::text('siteName', null,['placeholder'=>'* www.example.com','class'=>'form-control']) }}		
							</div>
							
							<div class="form-group col-md-4">
								{{ Form::label('description', 'Description',array('class'=>'text-muted control-label')) }}
								{{ Form::text('description', null,['placeholder'=>'* This site ...','class'=>'form-control']) }}
							</div>
								
							<div class="form-group col-md-4">
								{{ Form::label('launchDate', 'Launch Date',array('class'=>'text-muted control-label')) }}
								{{ Form::text('launchDate', null,['id'=>'datepicker','placeholder'=>'* (yyyy-mm-dd)','class'=>'form-control']) }}
							</div>
							
						@endif
						
						@if(Session::has('status'))	
			  				<div class="text-danger col-md-12"style="height:25px;"><i><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;{{Session::get('status')}}</i></div>
						@else
						
						    <div class="text-danger col-md-4"style="height:25px;"><i>{{ $errors->first('siteName') }}</i></div>
						    <div class="text-danger col-md-4"style="height:25px;"><i>{{ $errors->first('description') }}</i></div>
						 	<div class="text-danger col-md-4"style="height:25px;"><i>{{ $errors->first('launchDate') }}</i></div>		
						
						@endif
						
						</div>
						
						<small class="text-muted">* <i>Required Fields</i></small>
						
						<hr class="border">
						<div>{{ Form::submit('Register Site', ['name'=>'createSite','class'=>'btn btn-info btn-block']) }}</div>					
						
						@if(isset($_POST['clientID']))
							{{ Form::hidden('clientID',Input::get('clientID'))}}
						@endif
						
					{{ Form::close() }}
			</div>
		</div>			
 
@stop
