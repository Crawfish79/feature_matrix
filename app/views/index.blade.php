<!--Home page-->
@extends('layouts.default')

@section('content')
		<div>
			<table class="table table-striped table-condensed table-bordered table-hover"><caption>Websites</caption>
				<tr><th>Name</th><th>Launch date</th><th>Description</th></tr>
				@foreach ($clients as $client)
					<tr>
						<td>{{link_to("/profiles/$client->siteName",$client->siteName)}}</td>
						<td>{{$client->launchDate}}</td>
						<td>{{$client->description}}</td>
					</tr>
				@endforeach
		   </table>
		</div>
@stop