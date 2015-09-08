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
		<h3>Add New Feature To <span class="text-capitalize">{{$groupName}}</span> Group</h3>
		<p>please provide feature name and feature note</p>
	</div>
	<div class = 'panel panel-default'>
			<div class="panel-body">
				
				{{Form::open(array('action' => 'FeatureController@featureCreate','role'=>'form'))}}	

							
					<div class="row">

						<div class="form-group col-md-12">
							{{Form::label('groupID', 'Group ID: '.$groupID,array('class'=>'control-label'))}}
						</div>
												
						<div class="form-group col-md-12">
							{{Form::label('groupName', 'Group Name: '.$groupName,array('class'=>'control-label'))}}
						</div>
												
						<br>
						<div class="form-group col-md-6">
							{{Form::label('featureName','Feature Name',array('class'=>'control-label text-muted'))}}
							@if(isset($featureName))
							{{Form::text('featureName',$featureName,array('class'=>'form-control','placeholder'=>'* Feature Name'))}}
							@else
							{{Form::text('featureName',null,array('class'=>'form-control','placeholder'=>'* Feature Name'))}}							
							@endif
						</div>
	
						<div class="form-group col-md-6">
							{{Form::label('featureNote','Feature Note',array('class'=>'control-label text-muted'))}}
							@if(isset($featureNote))
							{{Form::textarea('featureNote',$featureNote,array('class'=>'form-control','placeholder'=>'* Feature Note'))}}
							@else
							{{Form::textarea('featureNote',null,array('class'=>'form-control','placeholder'=>'* Feature Note'))}}						
							@endif
						</div>
											
						<div class="text-danger col-md-6"style="height:25px;"><i>{{$errors->first('featureName')}}</i></div>
						<div class="text-danger col-md-6"style="height:25px;"><i>{{$errors->first('featureNote')}}</i></div>
					</div>
					
					<small class="text-muted">* <i>Required Fields</i></small>
					
					<hr class="border"/>
					<div>{{Form::submit('Create Feature',array('name'=>'createFeat','class'=>'btn btn-large btn-info btn-block'))}}</div>									    
					
					{{Form::hidden('groupName', $groupName)}}
					{{Form::hidden('groupID', $groupID)}}	
						
				{{Form::close()}}
				
			</div>
		</div>

@stop