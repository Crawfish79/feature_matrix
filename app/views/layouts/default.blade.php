<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dynamix Feature Matrix::Home</title>
	<style>
		  table {
		  		border:3;
		  		width:835;
				cellpadding:3; 
		  		cellspacing:0;
		  		margin-left:auto;
		  		margin-right:auto;
		  }
		  		
          td {
          		background-color:#f8f8f8;
          } 
          		
  		  caption {
  		  		font-family:Verdana, sans-serif; 
  		  		font-weight:bold; 
  		  		font-size:1em; 
  		  		padding-bottom:5px;
  		  		color:white;
  		  		background-color:#888888;
  		  }
  		  
		  ul {
			    list-style-type: none;
			    margin: 0;
			    padding: 0;
		  }
			
		  li {
			    display: inline;
		  }
		    		  
	</style>
</head>
	<body>	
		<div style="width: 100%; overflow: hidden;padding:2px;">
		    <div style="width: 600px; float: left;">
		    	<h1>DynamiX Feature Matrix</h1>
		    </div>
		    <div style="margin-left: 620px;margin-top:35px; text-align: right;"> 
		    	<label>search: <input type="text"></label>&nbsp;
		    	<input type="submit" value="go">
			</div>
		</div>
		<div style = "border: 1px solid">
			<ul>
			  <li><a href="">Websites</a></li>
			  <li><a href="">Feature</a></li>
			</ul>
		</div><br>
		@yield('content')
	</body>
</html>