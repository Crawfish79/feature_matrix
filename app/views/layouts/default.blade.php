<!--default layout-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dynamix Feature Matrix</title>
	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="/dynamix_feature_matrix.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/flick/jquery-ui.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/725b2a2115b/integration/jqueryui/dataTables.jqueryui.css">
	    <!-- Placed at the end of the document so the pages load faster -->

	    {{ HTML::script("https://code.jquery.com/jquery-1.11.1.js")}}
	    {{ HTML::script("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js")}}
	    {{ HTML::script("https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js")}}
	    {{ HTML::script("https://cdn.datatables.net/plug-ins/725b2a2115b/integration/jqueryui/dataTables.jqueryui.js")}}
	    {{ HTML::script("https://code.jquery.com/ui/1.11.1/jquery-ui.js")}}	    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	<body>
		
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
	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
		<div class="nav-header">
		   <h3 id="logo">{{HTML::image('images/DynamiX-logo.png')}}&nbsp;<small>Feature Matrix</small></h3>
	    </div> 	
      <!-- Static navbar -->
        <div class="container-fluid bg-info">
			   <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main">
			       <span class="sr-only">Toggle navigation</span>
			       <span class="icon-bar"></span>
			       <span class="icon-bar"></span>
			       <span class="icon-bar"></span>
			      </button>
		      </div>
	          <div class="navbar-collapse collapse" id="nav-main">
		          <ul class="nav navbar-nav">
		            <li>{{link_to('/','Home')}}</li>
		            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Feature Groups<span class="caret"></span></a>
		                <ul class="dropdown-menu" role="menu">
		                	<li>{{link_to('#','Create New Group',['data-toggle'=>'modal','data-target'=>'#newGroupModal'])}}</li>
		                	<li class="divider"></li>
		                	<li class="dropdown-header">Feature Groups</li>
		                	@foreach ($featureGroups as $featureGroup)
		                		<li class="text-capitalize">{{link_to("/GroupProfile/$featureGroup->groupName",$featureGroup->groupName)}}</li>
							@endforeach
		
		                </ul>
		            </li>
		            <li>{{HTML::linkAction('ClientSiteController@create','Create Site')}}</li>
		          </ul>
			      <form class="navbar-form navbar-right input-group-btn" role="search">
			        <input type="text" class="form-control" placeholder="Feature Search">
			        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>		          
			      </form>
	          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <div class='container'>
      	
@yield('content')

	  </div>	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{ HTML::script('bootstrap-3.2.0-dist/js/ie10-viewport-bug-workaround.js')}}
 	</body>
</html>
