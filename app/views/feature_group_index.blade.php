<!--Home page-->
@extends('layouts.default')

@section('content')
		<div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading"><h4>DynamiXFeatureGroups</h4></div>	
			<table width="100%" id = "siteTable" class="display">
				<thead><tr><th>Group Name</th></tr></thead>
				<tfoot><tr><th>Group Name</th></tr></tfoot>

				@foreach ($features as $feature)
					<tr>
						<td>{{link_to("/profiles/$feature->featureName",$feature->featureName)}}</td>
						
					</tr>
				@endforeach
		   </table>
		</div>
@stop
