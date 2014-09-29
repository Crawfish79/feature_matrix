@extends('layouts.default')
@section('content')
@if(isset($_POST['submit']))
<?php echo var_dump($_POST) ?>
	<div class="col-sm-4 alert alert-success form-group has-success has-feedback">
	  <label class="control-label"><h3><span class="glyphicon glyphicon-ok"></span>&nbsp;client features have been updated succesfully</h3></label>
	</div>	
@else
	<div class="panel panel-primary">
		<div class="panel-heading panels"><h3 class="panel-title">{{$siteName}} Feature Edit: {{$group}} update</h3></div>
	</div>
	<div class="selectionForm">
		{{Form::open(array('action' => 'PagesController@ClientFeatureUpdate'))}}
			<ul class="list-group">
				@foreach ($featuresOfGroup as $featureOfGroup)
					@if((in_array($featureOfGroup->featureID, $clientFeatures_FeatureID)))
						<li class="list-group-item"><h5>							
						{{Form::checkbox('features[]', $featureOfGroup->featureID,true)}}
						{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName, array('class'=>'text-info'))}}<br>
						{{ Form::hidden('prevFeatures[]',$featureOfGroup->featureID) }}					
						</h5></li>	
					@else
						<li class="list-group-item"><h5>
						{{Form::checkbox('features[]', $featureOfGroup->featureID)}}
						{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName)}}<br>
						</h5></li>
					@endif
				@endforeach
			</ul>
		<div>{{Form::submit('Update '.$group,array('name'=>'submit','class'=>'btn btn-info btnLink'))}}</div>
		{{ Form::hidden('clientID', $clientID)}}		
		{{Form::close()}}
	</div>
	@endif
@stop
