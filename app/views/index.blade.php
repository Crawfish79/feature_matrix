@extends('layouts.default')

@section('content')
		<div>
			<table><caption>Websites</caption>
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