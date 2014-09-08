<!--Create New Feature Page-->
@extends('layouts.default')

		<h1>Add New Feature </h1>
		{{ Form::open(['route' => 'features.store']) }}
		<div>
		  {{ Form::label('featureName', 'FeatureName:') }}
		  {{ Form::text('featureName') }}
		  </div>
		   <div>
		   {{ Form::label('launchDate', 'launchDate:') }}
		  {{ Form::date('launchDate') }}
		  </div>
		 
		  <div>
		  {{ Form::submit('Create') }}</div>
		
		{{ Form::close()}}

@stop
	   
