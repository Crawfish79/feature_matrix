<!--default layout-->
<!doctype html>
<html lang="en">
	
 @include('partials.head')
 
	<body>
			
		@include('partials.nav')
			
      	<div class='container main-container'>
      	
			@yield('content')

	    </div>
	    
  		@include('partials.footer')
  		
 	</body>
 	
</html>
