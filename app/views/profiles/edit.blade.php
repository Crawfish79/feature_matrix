@extends('layouts.default')
@section('content')

		{{Form::open(array())}}
				@foreach ($featuresOfGroup as $featureOfGroup)
					@if((in_array($featureOfGroup->featureID, $clientFeatures_FeatureID)))								
						{{Form::checkbox('name', $featureOfGroup->featureName,true)}}
						{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName)}}<br>
					@else
						{{Form::checkbox('name', $featureOfGroup->featureName)}}
						{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName)}}<br>					
					@endif
				@endforeach	
		{{Form::close()}}	
	
@stop
