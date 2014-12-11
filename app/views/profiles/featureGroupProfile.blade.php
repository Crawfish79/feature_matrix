@extends('layouts.default')
@section('content')

@if(Session::has('status'))	
	<div class="alert alert-success">
	  <p><span class="glyphicon glyphicon-info-sign"></span>&nbsp;{{Session::get('status')}}</p>
	</div>	
@endif
@if(Session::has('danger'))	
	<div class="alert alert-danger">
	  <p><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;{{Session::get('danger')}}</p>
	</div>
@endif

	<div class="well well-sm">
		<div class="row">
		<div class="col-md-12"><h3 class="text-capitalize">{{$groupName}} Group</h3></div>
		<div class="col-md-6"><p>Delete features or add new features to the group</p></div>		
		<!-- delete feature group button to call modal delete feature group form-->
		<div class="col-md-6">{{Form::button('Delete Group',array('name'=>'delGroup','class'=>'btn text-muted pull-right','data-toggle'=>'modal', 'data-target'=>'#groupDeleteModal'))}}</div>
	</div>
	
	</div>
	<div class = 'panel panel-default'>
		<div class="panel-body">
			<!-- Form for deleting a feature -->
			{{Form::open(array('action' => 'FeatureController@featureDelete'))}}
				<div class="row">
					@foreach ($featuresOfGroup as $featureOfGroup)
						<div class="col-md-3">
						<ul class="list-unstyled">					
							<li>
								<label class="radio-inline control-label">
									{{Form::radio('featureID', $featureOfGroup->featureID,'true')}}
									<b><u>{{$featureOfGroup->featureName}}</u></b>
								</label>
							</li>
							<li>{{$featureOfGroup->featureNote}}</li>
						</ul>
						</div>				
					@endforeach	
				</div>
				<hr class ="border"/>	
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
		</div>
	</div>
@stop