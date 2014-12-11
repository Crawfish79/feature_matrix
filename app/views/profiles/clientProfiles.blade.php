<!--displays the profile of a selected site-->
@extends('layouts.default')
@section('content')

	@if(Session::has('status'))	
		<div class="alert alert-success">
		  <p><span class="glyphicon glyphicon-info-sign"></span>&nbsp;{{Session::get('status')}}</p>
		</div>	
	@endif
		<div class="row">
			<div class="col-md-2"  id="myScrollspy">
				<nav id="sidebar-menu">
					<ul class="tab-menu nav nav-stacked" data-spy="affix" data-offset-top="85">
						@foreach($featureGroups as $featureGroup)
							<li><a href="#{{$featureGroup->groupID}}"title="{{$featureGroup->groupName}}">{{$featureGroup->groupName}}</a></li>
						@endforeach
						<li class="active"><a href="#top"><span class="glyphicon glyphicon-chevron-up"></span>&nbsp;back to top</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-md-10">	
		<!--website name and description-->
				<div class="well well-sm"id="top">
					<div class="row">
						<div class="col-md-12">
							<h2>{{$client->siteName}}<small>&nbsp;Site ID:{{$client->clientID}} | Launch:{{$client->launchDate}}</small></h2></div>
					    <div class="col-md-8"><p>{{$client->description}}</p></div>
						<!-- Edit button.. change name,description, and launch date of a site-->
						<div class="col-md-4">
							{{Form::open(array('action' => 'ClientSiteController@edit'))}}
							{{Form::submit('Edit Site',array('name'=>'editSite','class'=>'btn text-muted pull-right'))}}
							{{ Form::hidden('clientID', $client->clientID)}}		    
							{{ Form::hidden('siteName', $client->siteName)}}
							{{ Form::hidden('description', $client->description)}}
							{{ Form::hidden('launchDate', $client->launchDate)}}
							{{Form::close()}}
						</div>
					</div>
				</div>
				<br>

					@foreach ($featureGroups as $featureGroup)
					<div class="panel panel-default"id="{{$featureGroup->groupID}}">
						<div class="panel-body">
							{{Form::open(array('action' => 'ClientFeatureController@clientFeatureEdit'))}}<!--pointing to controller -->
								<div class="row">
									<div class="col-md-10"><h3 class="text-muted text-capitalize">{{$featureGroup->groupName}}</h3></div>
									<div class="col-md-2" style = "padding-top:15px;">{{Form::submit('Edit '.$featureGroup->groupName,array('class'=>'btn btn-info btn-block','id' => 'toggleEdit'))}}</div>		
								</div>
								<hr class="border"/>	
									<div class="row">
										@if($clientFeatures AND in_array($featureGroup->groupID,$groupIDs))
											@foreach ($clientFeatures as $clientFeature)
												@if($clientFeature->groupID==$featureGroup->groupID)
													<div class="col-md-3 ">
														<dl>
															<dt>{{$clientFeature->featureName}}</dt>
															<dd>{{$clientFeature->clientFeatureNote}}</dd>
														</dl>
													</div>								
												@endif	
											@endforeach
										@else
											<div class="col-md-4"><dl><dt>no features added yet</dt></dl></div>
										@endif
									</div>
									<hr style = "border-bottom:1px #777 dotted">
									{{ Form::hidden('group', $featureGroup->groupName, array('id'=>'group'))}}											
									{{ Form::hidden('siteName', $client->siteName, array('id'=>'siteName'))}}							
									{{ Form::hidden('clientID', $client->clientID, array('id'=>'clientID'))}}
									{{ Form::hidden('groupID',$featureGroup->groupID, array('id'=>'groupID'))}}
								{{Form::close()}}
							</div>
						</div>
					@endforeach
					<div class="vspace"></div>
				</div>
			</div>

	
@stop
