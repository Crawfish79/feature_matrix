$(document).ready(function($){	
	//scroll spy for clientProfile view
	var offset = 95;
	$('#spy-pos-fixed li a').click(function(event) {
		
		event.preventDefault();
		$($(this).attr('href'))[0].scrollIntoView();
		scrollBy(0, -offset);		
		});//end scroll spy
		
	//datatable for index page	
	$('#siteTable').dataTable( {
		"scrollY":        "200px",
		"scrollCollapse": true,
		"paging":         true
		})
		.removeClass( 'display' )
		.addClass('table table-striped table-hover');
		//end datatable
		
	//clientFeatureEdit-checbox to textarea display
	var new_height = 100;	
	$('input.cf-check').change(function(){
			
		if ($(this).is(':checked'))
    		$(this).next('div.cf-note').slideDown("slow");
    		
		else
    		$(this).next('div.cf-note').slideUp("slow");
			}).change();
			//end checkbox to textarea display
			
	//date picker for newly added sites
    $( "#datepicker" ).datepicker({	                	
        dateFormat: "yy-mm-dd",
        changeMonth: true,
      	changeYear: true
      	});
		//end date-picker
});//end document.ready
