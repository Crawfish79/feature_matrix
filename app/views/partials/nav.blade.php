		<!-- New Feature Group Modal -->
			<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="createGroupLabel">Create New Feature Group</h4>
			      </div>
			   {{Form::open(array('action' => 'FeatureGroupController@featureGroupCreate','id'=>'groupForm','class' => 'form-horizontal', 'method'=>'post', 'role'=>'form'))}}
			      <div class="modal-body">
			      	          <div class="alert alert-danger"id="group_alert" role="alert" style="display: none">
              <ul></ul>
          </div>
			      	
			      	    <div class="row">
							<div class="form-group">
								<div class="col-sm-4">{{Form::label('groupName','Feature Group:',array('class'=>'control-label pull-right','for'=>'groupName'))}}</div>
								<div class="col-sm-4">{{Form::text('groupName',null,array(
																							'id'=>'groupName',
																							'class'=>'form-control',
																							'required','pattern'=>'^.{3,14}$',
																							'title'=>'unique group name and min:3/max:14 characters required'
																							))}}
							</div>
							<div class="col-sm-3"><small><i>*format requires unique name and min:3/max:14 characters</i></small></div>
						</div>	        		
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
		                	<li>{{link_to_action('UsersController@userList','Users List')}}</li>
		                	<li class="divider"></li>
		                	<li class="dropdown-header">My Actions</li>
		                	<li>{{link_to_action('UsersController@userProfileEdit','Edit Profile')}}</li>		                	
		                	<li>{{link_to('/logout','Sign Out')}}</li>		
		                </ul>
		            </li>
		            <li><a href = "{{ URL::to('app_instructions/content/DynamiX Feature Matrix.html') }}" target="_blank"><span class="glyphicon glyphicon-question-sign"></a></span></li>
		          </ul>			      
	          </div><!--/.nav-collapse -->
        	</div><!--/.container-fluid -->
     	 </nav>