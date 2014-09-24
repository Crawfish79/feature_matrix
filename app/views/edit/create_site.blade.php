
@extends('layouts.default')
@section('content')
			<section class="header section-padding">
					<div class="background">&nbsp;</div>
					<div style="text-align:center">
					<div class="container">
						<div class="header-text">
								<h1>Add A Site</h1>
							</div>
								
						</div>
					</div>
				</section>
			
					
					
						<div class="form-group">
					
				{{ Form::open(['url'=> '/create', 'class' => 'form']) }}
					</div>
					<div class="form-group">
					
					
					{{ Form::label('siteName', 'SiteUrl') }}
					{{ Form::text('siteName', null,['class'=>'form-control']) }}
					</div>
					
					<div class="form-group">
				
				
					{{ Form::label('description', 'description') }}
					{{ Form::text('description', null,['class'=>'form-control']) }}
						</div>
				
				<div class="form-group">
					{{ Form::submit('Create Site Listing', ['class'=>'btn btn-primary']) }}
				</div>
				{{ Form::close() }}
					</div>
			
			</div>
@stop
