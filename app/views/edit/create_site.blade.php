
@extends('layouts.default')
@section('content')
		<div class = 'panels'>
		<div class="panel panel-primary">
			<div class="panel-body bg-warning">
									<div class="panel-heading"<h1>Add A Site</h1></div>
						
								
					
		
			
					
					
						<div class="form-group">
					
				{{ Form::open(['url'=> '/create', 'class' => 'form']) }}
					</div>
					<div class="form-group">
					
					
					{{ Form::label('siteName', 'WebSite') }}
					<div class="col-sm-4">{{ Form::text('siteName', null,['placeholder'=>'http://www.example.com','class'=>'form-control']) }}</div>
				
					</div>
					
					<div class="form-group">
						{{ Form::label('description', 'Description') }}
					<div class="col-sm-4">{{ Form::text('description', null,['placeholder'=>'This site ...','class'=>'form-control']) }}</div>
						</div>
						
					<div class="form-group">
						{{ Form::label('launchDate', 'Launch Date ') }}
					<div class="col-sm-4">{{ Form::text('launchDate', null,['placeholder'=>'0000-00-00','class'=>'form-control']) }}</div>
					</div>
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">{{ Form::submit('Create Site Listing', ['class'=>'btn btn-primary']) }}</div>
				</div>
				{{ Form::close() }}
					</div>
				</div>
			
			</div>
@stop
