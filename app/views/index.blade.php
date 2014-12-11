<!--Home page-->
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
				<h3>Website Index &amp; Search</h3>
				<p>Browse List of websites or use search to view client profile</p>
			</div>
			<div class="panel panel-default">
			   <div class="panel-body">
					<table width="100%" id="siteTable" class="table table-hover table-striped">
						<thead><tr><th>Site_ID</th><th>Site_Name</th><th>Launch_Date</th><th>Description</th></tr></thead>
						<tfoot><tr><th>Site_ID</th><th>Site_Name</th><th>Launch_Date</th><th>Description</th></tr></tfoot>						
						<tbody>
							@foreach ($clients as $client)
								<tr>
									<td>{{$client->clientID}}</td>
									<td>{{link_to("/ClientProfile/$client->siteName",$client->siteName)}}</td>
									<td>{{$client->launchDate}}</td>
									<td>{{$client->description}}</td>
								</tr>
							@endforeach				  		
				  		</tbody>		
				 </table>
		     	</div>
			</div>
@stop