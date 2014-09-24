
@extends('layouts.default')

@section('content')

		<h1>Create New </h1>
		
		{{ Form::open(['route' => 'users.store']) }}
		<div>
		  {{ Form::label('siteName', 'Site Name:') }}
		  {{ Form::text('siteName') }}
		  </div>
		   <div>
		   {{ Form::label('description', 'description:') }}
		  {{ Form::text('description') }}
		  </div>
		  <div>
		  {{ Form::label('launchDate', 'Launch Date:') }}
		  {{ Form::date('launchDate') }}
		  </div>
		  
		  <div>
		  {{ Form::submit('Create') }}</div>
		
		{{ Form::close()}}

@stop
	   
