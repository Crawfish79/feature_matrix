		<!-- New Feature Group Modal -->
			<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="createGroupLabel">Create New Feature Group</h4>
			      </div>
			   {{Form::open(array('action' => 'FeatureGroupController@featureGroupCreate','class' => 'form-horizontal'))}}
			      <div class="modal-body">			      	
						<div class="form-group">
							{{Form::label('groupName','Feature Group:',array('class'=>'control-label col-sm-4','for'=>'groupName'))}}
							<div class="col-sm-4">{{Form::text('groupName',null,array('class'=>'form-control col-sm-4','required' => 'required'))}}</div>
						</div>	        		
			      </div>			      
			      <div class="modal-footer">
			        {{Form::button('Cancel',array('name'=>'cancel','class'=>'btn btn-default','data-dismiss'=>'modal'))}}
			        {{Form::submit('Create Group',array('name'=>'createGroup','class'=>'btn btn-primary'))}}
			      </div>
			   {{Form::close()}}
			      
			    </div>
			  </div>
			</div>	
	
	
	<!--nav-->
	<nav class="navbar navbar-fixed-top navbar-default" id = "header"role="navigation">
	
      <!-- Static navbar -->
        <div class="container-fluid main-container-fluid">
			   <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main">
			       <span class="sr-only">Toggle navigation</span>
			       <span class="icon-bar"></span>
			       <span class="icon-bar"></span>
			       <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">{{HTML::image('images/DynamiX-logo.png','Dynamix Feature Matrix',array('id'=>'logo'))}}<span class = "small">Feature Matrix</span></a>
		      </div>
		      
	          <div class="navbar-collapse collapse" id="nav-main">			               	
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		            <li>{{HTML::linkAction('ClientSiteController@create','Create Site')}}</li>
		            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Feature Groups<span class="caret"></span></a>
		                <ul class="dropdown-menu" role="menu">
		                	<li>{{link_to('#','Create New Group',['data-toggle'=>'modal','data-target'=>'#newGroupModal'])}}</li>
		                	<li class="divider"></li>
		                	<li class="dropdown-header">Feature Groups</li>
		                	@foreach ($featureGroups as $featureGroup)
		                		<li class="text-capitalize">{{link_to("/GroupProfile/$featureGroup->groupName",$featureGroup->groupName)}}</li>
							@endforeach		
		                </ul>
		            </li>
		            <li>
			          	<!--search form -->
				      	{{Form::open(array('method' => 'GET','action' => 'FeatureController@featureSearch','class'=>'navbar-form navbar-right', 'role'=>'search'))}}
					      <div class="input-group add-on searchdiv">
					        <input type="text" name = "searchTerm" value="{{Input::get('searchTerm')}}" class="form-control col=md-4 search" placeholder="Feature Search..."/>
					        <div class="input-group-btn">
					        	<button type="submit" class="btn btn-default btn-search"><i class="glyphicon glyphicon-search text-primary"></i></button>		          
					      	</div>
					      </div>
				      	{{Form::close()}}	 
		            </li>
		            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->userName}}<span class="caret"></span></a>
		                <ul class="dropdown-menu" role="menu">
		                	<li>{{link_to('/users/create','Add New User')}}</li>
		                	<li class="divider"></li>
		                	<li>{{link_to('/logout','Sign Out')}}</li>		
		                </ul>
		            </li>
		            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></li>
		          </ul>			      
	          </div><!--/.nav-collapse -->
        	</div><!--/.container-fluid -->
     	 </nav>