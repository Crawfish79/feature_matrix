<!--Home page-->
@extends('layouts.default')
@section('content')

			<div class="well well-sm">
				<h3>Users List</h3>
				<p>Displays all users account info: id, user name, and email</p>
			</div>
			<div class="panel panel-default">
			   <div class="panel-body">
					<table width="100%" class="table table-striped table-hover">
						<thead><tr><th>#</th><th>User Name</th><th>E-Mail</th></tr></thead>
						<tbody>
							@foreach ($users as $user)
								<tr>
									<td>{{$user->id}}</td>
									<td>{{$user->userName}}</td>
									<td>{{$user->email}}</td>
								</tr>
							@endforeach
				  		</tbody>
				  </table>
		     	</div>
			</div>
@stop