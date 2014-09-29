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
	    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/725b2a2115b/integration/jqueryui/dataTables.jqueryui.css">
	    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	<body>
	<div class="navbar navbar-fixed-top navbar-default" role="navigation">
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
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
					<li>{{Form::open(array('action' => 'PagesController@groupProfile'))}}{{Form::submit('Forms',array('class'=>'btn btn-block'))}}{{Form::hidden('groupID', '1')}}{{Form::hidden('groupName', 'forms')}}{{Form::close()}}</li>
					<li>{{Form::open(array('action' => 'PagesController@groupProfile'))}}{{Form::submit('Widgets',array('class'=>'btn btn-block'))}}{{Form::hidden('groupID', '2')}}{{Form::hidden('groupName', 'widgets')}}{{Form::close()}}</li>
					<li>{{Form::open(array('action' => 'PagesController@groupProfile'))}}{{Form::submit('Gadgets',array('class'=>'btn btn-block'))}}{{Form::hidden('groupID', '3')}}{{Form::hidden('groupName', 'gadgets')}}{{Form::close()}}</li>
					<li>{{Form::open(array('action' => 'PagesController@groupProfile'))}}{{Form::submit('Maps',array('class'=>'btn btn-block'))}}{{Form::hidden('groupID', '4')}}{{Form::hidden('groupName', 'maps')}}{{Form::close()}}</li>
					<li>{{Form::open(array('action' => 'PagesController@groupProfile'))}}{{Form::submit('Tools',array('class'=>'btn btn-block'))}}{{Form::hidden('groupID', '5')}}{{Form::hidden('groupName', 'tools')}}{{Form::close()}}</li>
					
                </ul>
              <li>{{HTML::linkAction('PagesController@create','Create Site')}}</li>
            </ul>
		      <form class="navbar-form navbar-right" role="search">
		        <div class="input-group-btn">
		          <input type="text" class="form-control" placeholder="Feature Search">
		        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>		          
		        </div>
		      </form>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
      <div class='container'>
	@yield('content')
	  </div>	
	    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js")}}
    {{ HTML::script("https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js")}}
    {{ HTML::script("https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js")}}
    {{ HTML::script("https://cdn.datatables.net/plug-ins/725b2a2115b/integration/jqueryui/dataTables.jqueryui.js")}}
	<script>
	
	$(document).ready(function() {
	    $('#siteTable').dataTable( {
	        "scrollY":        "200px",
	        "scrollCollapse": true,
	        "paging":         true
	    } );
	} );
	
	</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{ HTML::script('bootstrap-3.2.0-dist/js/ie10-viewport-bug-workaround.js')}}
 	</body>
</html>
