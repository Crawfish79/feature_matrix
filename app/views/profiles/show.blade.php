<!--displays the profile of a selected site-->
@extends('layouts.default')

@section('content')
	<div class>
		<h3>{{$site->siteName}}</h3><p>{{$site->description}}</p>
	</div>
	
	 {{Form::open()}} 
	 <div>
 		 {{Form::label('forms', 'Forms: ')}}
	</div>
		<div>
			<ul>
				@foreach ($forms as $form)
						<li>{{$form->featureName}}</li>
				@endforeach
			</ul>
			   		<div>{{Form::submit('edit')}}</div>
		</div>	
	{{Form::close()}}&nbsp;
	{{Form::open()}} 
	 <div>
 		 {{Form::label('widgets', 'Widgets: ')}}
	</div>
		<div>
			<ul>
				@foreach ($widgets as $widget)
						<li>{{$widget->featureName}}</li>
				@endforeach	
			 </ul>
			   	<div>{{Form::submit('edit')}}</div>
		</div>	   	
	{{Form::close()}}
@stop
