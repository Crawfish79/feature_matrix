/*
 |Add a website to the database
 |
 |
 */

@extends('layouts.default')
@section('content')
@if(isset($_POST['submit']))
	<h1>Client Site Has been Added</h1>
@else
	<div class="panel panel-primary">
	
	</div>	
		{{ Form::open(['route' => 'ClientSites.store']) }}
		<div>
		  {{ Form::label('siteName', ' WebSite Name:') }}
		  {{ Form::text('siteName') }}
		  </div>
		  
		   <div>
		   {{ Form::label('launchDate', 'Launch Date:') }}
		  {{ Form::date('launchDate') }}
		  </div>
		   <div>
		   {{ Form::label('description', 'Description:') }}
		  {{ Form::text('description') }}
		  </div>
		  <div>
		  {{ Form::submit('Create') }}</div>
		
		{{ Form::close()}}

	@endif
@stop

@stop
	   
	
