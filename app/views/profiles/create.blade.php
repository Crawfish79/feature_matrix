@extends('layouts.default')

@section('content')

	<h1>Add Client Site</h1>
	<div>
		
	{{ Form::open(['route' => 'pages.store']) }}
	  {{ Form::label('siteName', 'Site Name: ') }}
	  {{ Form::input('text', 'siteName') }}
	  {{ $errors->first('siteName') }}
	</div>
	
	<div>
		
	{{ Form::open() }}
	  {{ Form::label('description', 'Description: ') }}
	  {{ Form::input('text', description') }}
	 {{ $errors->first('description') }}
	</div>
	
	<div>{{ Form::submit('Create Site') }}</div>
	
{{ Form::open('profiles/show'}}
 
@stop
	