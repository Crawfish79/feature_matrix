@extends('layouts.default')
@section('content')
		<div class="well well-sm">
				<h3>{{$siteName}}<small>&nbsp;{{$group}} update</small></h3>
		</div>
		
		<div class = 'panel panel-default'>
			<div class="panel-body">
				{{Form::open(array('action' => 'ClientFeatureController@clientFeatureUpdate','class'=>'form-group'))}}
					<div class="row">
						@foreach ($featuresOfGroup as $featureOfGroup)
							@if(in_array($featureOfGroup->featureID, $clientFeatures_FeatureID))
								@foreach($clientFeatures as $clientFeature)
									@if($featureOfGroup->featureID == $clientFeature->featureID)
										<div class="col-md-3">
											{{Form::checkbox('features[]', $featureOfGroup->featureID,true,array('class'=>'cf-check'))}}
											{{$featureOfGroup->featureName}}
											<div class="cf-note">{{Form::textarea('features[]',$clientFeature->clientFeatureNote,array('class'=>'form-control','style' =>'height:60px'))}}</div>						
											{{ Form::hidden('prevFeatures[]',$featureOfGroup->featureID) }}					
										</div>
									@endif
								@endforeach	
							@else
								<div class="col-md-3">
									{{Form::checkbox('features[]', $featureOfGroup->featureID,false,array('class'=>'cf-check'))}}
									{{$featureOfGroup->featureName}}
									<div class="cf-note">{{Form::textarea('features[]',null,array('class'=>'form-control','placeholder'=>'Add Notes...','style' =>'height:60px'))}}</div>
								</div>
							@endif
						@endforeach
					</div>
					<hr class = 'border'/>
					<div>{{Form::submit('Update '.$group,array('name'=>'submit','class'=>'btn btn-info btn-block'))}}</div>
					{{ Form::hidden('clientID', $clientID)}}
					{{ Form::hidden('siteName', $siteName)}}		
				{{Form::close()}}
			</div>
		</div>	

@stop
