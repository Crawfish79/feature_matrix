<!--Home page-->
@extends('layouts.default')

@section('content')
		<div class = "panels">
		<div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading"><h4>Dynamix Client Websites</h4></div>	
			<table width="100%" id = "siteTable" class="display">
				<thead><tr><th>Name</th><th>Launch_date</th><th>Description</th></tr></thead>
				<tfoot><tr><th>Name</th><th>Launch_date</th><th>Description</th></tr></tfoot>

				@foreach ($clients as $client)
					<tr>
						<td>{{link_to("/ClientProfile/$client->siteName",$client->siteName)}}</td>
						<td>{{$client->launchDate}}</td>
						<td>{{$client->description}}</td>
					</tr>
				@endforeach
		   </table>
		</div>
		</div>
@stop