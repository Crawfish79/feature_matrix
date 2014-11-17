@extends('layouts.default')
@section('content')
	<div class = 'panel panel-default'>
		<div class="panel-body">	
			<h4><span class="text-muted"><b>{{$resultsCount}}</b></span> results returned for <span class="text-primary"><em>"{{$searchTerm}}"</em></span> feature</h4>
			<hr class = "hr">
			
				@if($resultsCount > 0)
						
					@foreach ($results as $result)
						<dl class="dl-left-border">
							<dt>{{$result->siteName}} |<span class="text-primary"> {{link_to("/ClientProfile/$result->siteName","view profile")}}</span></dt>
							<dd><i>{{$result->featureName}}</i></dd>
							<dd><span class="text-primary">Note:</span><span class="text-info">{{$result->clientFeatureNote}}</span></dd>
						</dl>
					@endforeach
						
				{{ $results->appends(Input::except('page'))->links() }}
		
				@else
				<h2 class="text-muted"><i>No results found for this feature</i></h2>
				@endif	
		</div>
	</div>					
@stop