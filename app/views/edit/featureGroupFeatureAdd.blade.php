@extends('layouts.default')

@section('content')
@if(isset($_POST['submit']))
	
	<div class="col-sm-4 alert alert-success form-group has-success has-feedback">
	  <label class="control-label"><h3><span class="glyphicon glyphicon-ok"></span>&nbsp;feature has been added to group successfully</h3></label>
	</div>
@else
	<div class = 'panels'>
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title">Feature Group: add new feature to {{$groupName}} group</h3></div>
			<div class="panel-body bg-warning">
				{{Form::open(array('action' => 'PagesController@featureGroupFeatureAdd','class'=>'form-horizontal', 'role'=>'form'))}}	
					<div class="form-group">
						{{Form::label('groupName', 'Group Name:',array('class'=>'col-sm-2 control-label'))}}
						<div class="col-sm-4"><p class="form-control-static">{{$groupName}}</p></div>
					</div>
					<div class="form-group">
						{{Form::label('groupID', 'Group ID:',array('class'=>'col-sm-2 control-label'))}}
						<div class="col-sm-4"><p class="form-control-static ">{{$groupID}}</p></div>
					</div>	
					<div class="form-group">
						{{Form::label('featureName','Feature Name:',array('class'=>'col-sm-2 control-label'))}}
						<div class="col-sm-4">{{Form::text('featureName',null,array('class'=>'form-control','required' => 'required'))}}</div>
					</div>
					<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10">{{Form::submit('submit',array('name'=>'submit','class'=>'btn btn-info'))}}</div>
				    </div>
					{{Form::hidden('groupName', $groupName)}}
					{{Form::hidden('groupID', $groupID)}}		
				{{Form::close()}}
			</div>
		</div>
	</div>
@endif
@stop