<!--displays the profile of a selected site-->
@extends('layouts.default')

@section('content')
	<!--website name and description-->
	<div class = 'panels'>
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class = "panel-title">{{$client->siteName}}</h3></div>
		    <div class="panel-body">{{$client->description}}</div>
		</div>
	</div>
	<!--forms group-->
	{{Form::open(array('action' => 'PagesController@ClientFeatureEdit','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4>Forms</h4></div>			
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
		<div>{{Form::submit('Edit Forms',array('class'=>'btn btn-info btn-block profileEditBtn'))}}</div>
	{{Form::close()}}
	<!--widgets group-->
	{{Form::open(array('action' => 'PagesController@ClientFeatureEdit','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4>Widgets</h4></div>			
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
		<div>{{Form::submit('Edit Widgets',array('class'=>'btn btn-info btn-block profileEditBtn'))}}</div>		 		
	{{Form::close()}}
	<!--gadgets group-->
	{{Form::open(array('action' => 'PagesController@ClientFeatureEdit','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4 "panel-title">Gadgets</h4></div>			
				<ul class="list-group">
						@if($gadgets)
							@foreach ($gadgets as $gadget)
									<li class="list-group-item">{{$gadget->featureName}}</li>
							@endforeach
						@else
							<li class="list-group-item"><b>no features added yet</b></li>
						@endif
				</ul>
				{{ Form::hidden('group', 'Gadgets')}}															
				{{ Form::hidden('siteName', $client->siteName)}}														
				{{ Form::hidden('clientID', $client->clientID)}}
				{{ Form::hidden('groupID',3) }}	
			</div> 
		<div>{{Form::submit('Edit Gadgets',array('class'=>'btn btn-info btn-block profileEditBtn'))}}</div>		 		
	{{Form::close()}}
	<!--maps group-->
	{{Form::open(array('action' => 'PagesController@ClientFeatureEdit','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4>Maps</h4></div>			
				<ul class="list-group">
						@if($maps)
							@foreach ($maps as $map)
									<li class="list-group-item">{{$map->featureName}}</li>
							@endforeach
						@else
							<li class="list-group-item"><b>no features added yet</b></li>
						@endif
				</ul>
				{{ Form::hidden('group', 'Maps')}}															
				{{ Form::hidden('siteName', $client->siteName)}}														
				{{ Form::hidden('clientID', $client->clientID)}}
				{{ Form::hidden('groupID',4) }}	
			</div> 
		<div>{{Form::submit('Edit Maps',array('class'=>'btn btn-info btn-block profileEditBtn'))}}</div>		 		
	{{Form::close()}}
	<!--tools group-->
	{{Form::open(array('action' => 'PagesController@ClientFeatureEdit','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4>Tools</h4></div>			
				<ul class="list-group">
						@if($tools)
							@foreach ($tools as $tool)
									<li class="list-group-item">{{$tool->featureName}}</li>
							@endforeach
						@else
							<li class="list-group-item"><b>no features added yet</b></li>
						@endif
				</ul>
				{{ Form::hidden('group', 'Tools')}}															
				{{ Form::hidden('siteName', $client->siteName)}}														
				{{ Form::hidden('clientID', $client->clientID)}}
				{{ Form::hidden('groupID',5) }}	
			</div> 
		<div>{{Form::submit('Edit Tools',array('class'=>'btn btn-info btn-block profileEditBtn'))}}</div>		 		
	{{Form::close()}}	
@stop
