@extends('layouts.default')
@section('content')

@if(Session::has('status'))	
	<div class="alert alert-success">
	  <p><span class="glyphicon glyphicon-info-sign"></span>&nbsp;{{Session::get('status')}}</p>
	</div>	
@endif

	<div class = 'panels'>		
		<div class="panel panel-primary" >
			<div class="panel-heading"><h3 class="panel-title">Feature Group: {{$groupName}}</h3></div>
			<div class="panel-body">Delete features or add new features to the group</div>
		</div>
	</div>
	<!-- Form for deleting a feature -->
	{{Form::open(array('action' => 'FeatureController@featureDelete'))}}
		<div class="row">
			@foreach ($featuresOfGroup as $featureOfGroup)
				<div class="col-md-3">					
					<label class="radio-inline control-label">
						{{Form::radio('featureID', $featureOfGroup->featureID,'true')}}
						{{$featureOfGroup->featureName}}
					</label>
				</div>				
			@endforeach	
		</div>
		<hr class ="hr"/>	
		<!-- Modal inside Delete Feature form -->
		<div class="modal fade" id="featureDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this feature?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		        <!-- submission for deleting a feature -->
		        {{Form::submit('Delete Feature',array('name'=>'submit','class'=>'btn btn-danger'))}}
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End Modal -->				
		{{Form::hidden('groupName', $groupName)}}
		{{Form::hidden('groupID', $groupID)}}
	{{Form::close()}}<!-- End Delete Feature Form -->
	
	<!--create feature button form-->
	{{Form::open(array('action' => 'FeatureController@featureCreate'))}}
		<div>{{Form::submit('Create Feature',array('name'=>'addFeat','class'=>'btn btn-info btnLink'))}}</div>
		{{Form::hidden('groupName', $groupName)}}
		{{Form::hidden('groupID', $groupID)}}
	{{Form::close()}}<!-- End Create Feature Button Form -->
	
	<!-- delete feature button to call modal in delete feature form -->
	<div>{{Form::button('Delete Feature',array('name'=>'deleteFeat','class'=>'btn btn-danger btnLink','data-toggle'=>'modal', 'data-target'=>'#featureDeleteModal'))}}</div>
		
	<!-- delete feature group form -->
	{{Form::open(array('action' => 'FeatureGroupController@featureGroupDelete'))}}
		<!-- Modal inside Delete Feature group form -->
		<div class="modal fade" id="groupDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this group?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		        <!-- submission for deleting a group -->
		        {{Form::submit('Delete Group',array('name'=>'submit','class'=>'btn btn-danger'))}}
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End Modal -->			
		{{Form::hidden('groupName', $groupName)}}
		{{Form::hidden('groupID', $groupID)}}
	{{Form::close()}}<!-- End delete feature group form -->
	
	<!-- delete feature group button to call modal delete feature group form-->
	{{Form::button('',array('name'=>'delGroup','class'=>'btnLink2 glyphicon glyphicon-remove','data-toggle'=>'modal', 'data-target'=>'#groupDeleteModal'))}}
	<small class="pull-right text-muted"><u>remove this feature group</u>&nbsp;&nbsp;</small>
@stop