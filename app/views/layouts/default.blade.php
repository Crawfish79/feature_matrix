<!--default layout-->
<!doctype html>
<html lang="en">
	
 @include('partials.head')
 
	<body data-spy="scroll" data-target="#myScrollspy" data-offset="85">
			
		@include('partials.nav')
			
      	<div class='container main-container'>
      	
			@yield('content')

	    </div>
	    
  		@include('partials.footer')
  		
 	</body>
 	
</html>
