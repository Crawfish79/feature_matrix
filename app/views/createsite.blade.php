<!--Create New Site Page-->
@extends('layouts.default')

		<h1>Add New Website </h1>
		{{ Form::open(['route' => 'sites.store']) }}
		<div>
		  {{ Form::label('siteName', 'Websitename:') }}
		  {{ Form::text('siteName') }}
		  </div>
		   <div>
		   {{ Form::label('launchDate', 'launchDate:') }}
		  {{ Form::date('launchDate') }}
		  </div>
		 <div>
		   {{ Form::label('description', 'description:') }}
		  {{ Form::text('description') }}
		  </div>
		  <div>
		  {{ Form::submit('Create') }}</div>
		
		{{ Form::close()}}

@stop
	   
