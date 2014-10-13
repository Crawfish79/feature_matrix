@extends('layouts.default')
@section('content')

	<div class = 'panels'>
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title">Feature Group: add new feature to {{$groupName}} group</h3></div>
			<div class="panel-body bg-warning">
				
				{{Form::open(array('action' => 'FeatureController@featureCreate','class'=>'form-horizontal', 'role'=>'form'))}}	
				
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
						<div class="col-sm-4">{{Form::text('featureName',null,array('class'=>'form-control'))}}</div>
						{{$errors->first('featureName')}}
					</div>
					
					<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10">
				    		{{Form::submit('Create Feature',array('name'=>'createFeat','class'=>'btn btn-info'))}}
				    	</div>
				    </div>
				    
					{{Form::hidden('groupName', $groupName)}}
					{{Form::hidden('groupID', $groupID)}}	
						
				{{Form::close()}}
				
			</div>
		</div>
	</div>

@stop