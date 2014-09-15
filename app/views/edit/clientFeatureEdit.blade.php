@extends('layouts.default')
@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading"><h3 "panel-title">{{$siteName}}'s Profile Edit:{{$group}}</h3></div>
	</div>	
		{{Form::open()}}
		<div class="panel panel-primary">
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
		<div>{{Form::submit('Edit '.$group,array('class'=>'btn btn-info btn-lg btn-block'))}}</div>
		</div>	
		{{Form::close()}}	
	
@stop
