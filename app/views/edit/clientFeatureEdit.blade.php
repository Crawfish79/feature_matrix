@extends('layouts.default')
@section('content')
@if(isset($_POST['submit']))
	<h1>client features have been updated</h1>
@else
	<div class="panel panel-primary">
		<div class="panel-heading panels"><h3 class="panel-title">{{$siteName}}'s Feature Edit: {{$group}} update</h3></div>
	</div>
		{{Form::open(array('url' => '/ClientFeatureEdit','class'=>'profileForm'))}}
			<ul class="list-group">
				@foreach ($featuresOfGroup as $featureOfGroup)
					@if((in_array($featureOfGroup->featureID, $clientFeatures_FeatureID)))
						<li class="list-group-item"><h5>							
						{{Form::checkbox('name', $featureOfGroup->featureName,true)}}
						{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName, array('class'=>'text-info'))}}<br>
						</h5></li>	
					@else
						<li class="list-group-item"><h5>
						{{Form::checkbox('name', $featureOfGroup->featureName)}}
						{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName)}}<br>					
						</h5></li>
					@endif
				@endforeach
			</ul>
		<div>{{Form::submit('Update '.$group,array('name'=>'submit','class'=>'btn btn-info btn-lg btn-block profileEditBtn'))}}</div>
		{{Form::close()}}
	@endif
@stop
