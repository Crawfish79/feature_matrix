<!--Home page-->
@extends('layouts.default')
@section('content')

@if(Session::has('status'))	
	<div class="alert alert-success">
	  <p><span class="glyphicon glyphicon-info-sign"></span>&nbsp;{{Session::get('status')}}</p>
	</div>	
@endif
			<div class="well well-sm">
				<h3>Website Index &amp; Search</h3>
				<p>Browse List of websites or use search to view client profile</p>
			</div>
			<div class="panel panel-default">
			   <div class="panel-body">
					<table width="100%" id="siteTable" class="display">
						<thead><tr><th>#</th><th>Name</th><th>Launch Date</th><th>Description</th></tr></thead>
						<tfoot><tr><th></th></tr></tfoot>
		
						@foreach ($clients as $client)
							<tr>
								<td>{{$client->clientID}}</td>
								<td>{{link_to("/ClientProfile/$client->siteName",$client->siteName)}}</td>
								<td>{{$client->launchDate}}</td>
								<td>{{$client->description}}</td>
							</tr>
						@endforeach
				  </table>
		     	</div>
			</div>
@stop