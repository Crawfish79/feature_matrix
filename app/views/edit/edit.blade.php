
@extends('layouts.default')
@section('content')
		<div class = 'panels'>
		<div class="panel panel-primary">		
		<div class="panel-heading"><h3 class="panel-title">Create New Site Listing</h3></div>			
		<div class="panel-body">	
			<h1>Edit ClientSites {{ $clientsite->clientID }}</h1>								
					

			{{ Form::open(['url'=> '/edit', 'class'=>'form']) }}
			{{ Form::hidden('clientID', $clientsite->clientID) }}				
					<div class="form-group">					
				{{ Form::label('clientID', 'siteName:') }}
						<div class="col-sm-4">{{ Form::text('siteName', $clientsite->siteName,['class' => 'form-control']) }}</div>		
					</div>
					
					<div class="form-group">
				{{ Form::label('description', 'description:') }}
						<div class="col-sm-4">{{ Form::textarea('description', $clientsite->description,['class' => 'form-control']) }}

</div>
					</div>
						
		<div class="form-group">
						{{ Form::label('launchDate', 'Launch Date:',array('class'=>'col-sm-2 control-label')) }}
						<div class="col-sm-2">{{ Form::text('launchDate', null,['id'=>'datepicker','placeholder'=>'0000-00-00','class'=>'form-control']) }}</div>
					</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">{{ Form::submit('Edit Site Listing', ['class'=>'btn btn-primary']) }}</div>
					</div>
					
				{{ Form::close() }}
					</div>
				</div>			
			</div>
			<script>
        
            $(function() {
                $( "#datepicker" ).datepicker({	                	
                	dateFormat: "yy-mm-dd",
                    changeMonth: true,
      				changeYear: true
      			});
            });      
        	</script>  
@stop


