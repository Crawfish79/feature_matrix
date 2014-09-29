@extends('layouts.default')

@section('content')
@if(isset($_POST['submit']))
	<div class="col-sm-4 alert alert-success form-group has-success has-feedback">
	  <label class="control-label"><h3><span class="glyphicon glyphicon-ok"></span>&nbsp;feature has been deleted from group successfully</h3></label>
	</div>	
@else
	<div class = 'panels'>
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title">Feature Group: {{$groupName}}</h3></div>
			<div class="panel-body">Delete features or add new features to the group</div>
		</div>
	</div>
	<div class="selectionForm">
	{{Form::open(array('action' => 'PagesController@groupProfileFeatureDelete'))}}
	<ul class="list-group">	
		@foreach ($featuresOfGroup as $featureOfGroup)
			<li class="list-group-item"><h5>							
				{{Form::radio('featureID', $featureOfGroup->featureID,'true')}}
				{{Form::label($featureOfGroup->featureName,$featureOfGroup->featureName, array('class'=>'text-info'))}}<br>
			</h5></li>				
		@endforeach	
	</ul>
	
	<!-- Modal inside form -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this feature?</h4>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        {{Form::submit('Delete Feature',array('name'=>'submit','class'=>'btn btn-danger'))}}
	      </div>
	    </div>
	  </div>
	</div>
	<!-- End Modal -->	
	
	<div>{{Form::button('Delete Feature',array('name'=>'deleteFeat','class'=>'btn btn-danger btnLink','data-toggle'=>'modal', 'data-target'=>'#myModal'))}}</div>
	{{Form::close()}}
	</div>
	{{Form::open(array('action' => 'PagesController@featureGroupFeatureAdd'))}}
		<div>{{Form::submit('Add New Feature',array('name'=>'addFeat','class'=>'btn btn-info btnLink'))}}</div>
		{{Form::hidden('groupName', $groupName)}}
		{{Form::hidden('groupID', $groupID)}}
	{{Form::close()}}
@endif
@stop