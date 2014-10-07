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
	@foreach ($featureGroups as $featureGroup)
	{{Form::open(array('action' => 'ClientFeatureController@clientFeatureEdit','class'=>'profileForm'))}}<!--pointing to controller -->			
		<div class="panel panel-info">
			<div class="panel-heading"><h4>{{$featureGroup->groupName}}</h4></div>			
				<ul class="list-group">
						@if($clientFeatures && in_array($featureGroup->groupID,$groupIDs))
							@foreach ($clientFeatures as $clientFeature)
								@if($clientFeature->groupID==$featureGroup->groupID)
									<li class="list-group-item">{{$clientFeature->featureName}}</li>
								@endif	
							@endforeach
						@else
							<li class="list-group-item"><b>no features added yet</b></li>
						@endif
				</ul>
				{{ Form::hidden('group', $featureGroup->groupName)}}											
				{{ Form::hidden('siteName', $client->siteName)}}							
				{{ Form::hidden('clientID', $client->clientID)}}
				{{ Form::hidden('groupID',$featureGroup->groupID) }}	
			</div> 
		<div>{{Form::submit('Edit '.$featureGroup->groupName,array('class'=>'btn btn-info btn-block profileEditBtn'))}}</div>
	{{Form::close()}}
	@endforeach
@stop
