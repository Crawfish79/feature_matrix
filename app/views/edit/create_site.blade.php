/*
 |Add a website to the database
 |
 |
 */

@extends('layouts.default')

@section('content')

		<h1>Create New </h1>
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

@stop
	   
	
