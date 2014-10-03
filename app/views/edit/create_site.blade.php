
@extends('layouts.default')
@section('content')
		<div class = 'panels'>
		<div class="panel panel-primary">		
		<div class="panel-heading"><h3 class="panel-title">Add A Site</h3></div>			
		<div class="panel-body bg-warning">									
					
<<<<<<< HEAD
				{{ Form::open(['url'=> '/create','class'=>'form-horizontal', 'role'=>'form']) }}
					<div class="form-group">					
					{{ Form::label('siteName', 'WebSite:',array('class'=>'col-sm-2 control-label')) }}
					<div class="col-sm-4">{{ Form::text('siteName', null,['placeholder'=>'www.example.com','class'=>'form-control','required' => 'required']) }}</div>		
=======
						<div class="form-group">
					
				{{ Form::open(['url'=> '/create', 'class' => 'form']) }}
					</div>
					<div class="form-group">
					
					
					{{ Form::label('siteName', 'WebSite') }}
					<div class="col-sm-4">{{ Form::text('siteName', null,['placeholder'=>'www.example.com','class'=>'form-control','required' => 'required']) }}</div>
				
>>>>>>> origin/master
					</div>
					
					<div class="form-group">
						{{ Form::label('description', 'Description:',array('class'=>'col-sm-2 control-label')) }}
					<div class="col-sm-4">{{ Form::text('description', null,['placeholder'=>'This site ...','class'=>'form-control','required' => 'required']) }}</div>
						</div>
						
					<div class="form-group">
						{{ Form::label('launchDate', 'Launch Date:',array('class'=>'col-sm-2 control-label')) }}
					<div class="col-sm-2">{{ Form::text('launchDate', null,['id'=>'datepicker','placeholder'=>'0000-00-00','class'=>'form-control']) }}</div>
					</div>
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">{{ Form::submit('Create Site Listing', ['class'=>'btn btn-primary']) }}</div>
				</div>
				{{ Form::close() }}
					</div>
				</div>			
			</div>
			<script>
        
            $(function() {
                $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
            });      
        	</script>  
@stop
