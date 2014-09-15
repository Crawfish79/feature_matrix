<!--displays the profile of a selected site-->
@extends('layouts.default')

@section('content')
	<!--website name and description-->
	<div class="panel panel-primary">
		<div class="panel-heading"><h3 "panel-title">{{$client->siteName}}</h3></div>
	    <div class="panel-body">{{$client->description}}</div>
	</div>
	<!--website name and description-->
	{{Form::open(array('action' => 'PagesController@profileEditClientFeature','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4 "panel-title">Forms</h4></div>			
				<ul class="list-group">
						@if($forms)
							@foreach ($forms as $form)
									<li class="list-group-item">{{$form->featureName}}</li>
							@endforeach
						@else
							<li class="list-group-item"><b>no features added yet</b></li>
						@endif
				</ul>
				{{ Form::hidden('group', 'Forms')}}											
				{{ Form::hidden('siteName', $client->siteName)}}							
				{{ Form::hidden('clientID', $client->clientID)}}
				{{ Form::hidden('groupID',1) }}	
			</div> 
		<div>{{Form::submit('Edit Forms',array('class'=>'btn btn-info btn-lg btn-block'))}}</div>
	{{Form::close()}}
	<!--widgets group-->
	{{Form::open(array('action' => 'PagesController@profileEditClientFeature','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4 "panel-title">Widgets</h4></div>			
				<ul class="list-group">
						@if($widgets)
							@foreach ($widgets as $widget)
									<li class="list-group-item">{{$widget->featureName}}</li>
							@endforeach
						@else
							<li class="list-group-item"><b>no features added yet</b></li>
						@endif
				</ul>
				{{ Form::hidden('group', 'Widgets')}}															
				{{ Form::hidden('siteName', $client->siteName)}}														
				{{ Form::hidden('clientID', $client->clientID)}}
				{{ Form::hidden('groupID',2) }}	
			</div> 
		<div>{{Form::submit('Edit Widgets',array('class'=>'btn btn-info btn-lg btn-block'))}}</div>
		 		
	{{Form::close()}}	
@stop
