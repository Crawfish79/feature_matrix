$(document).ready(function($){	
	//scroll spy for clientProfile view
	var offsetHeight = 70;

	$('#sidebar-menu ul.tab-menu li a').click(function(event) {
    	var scrollPos = $('body > .container').find($(this).attr('href')).offset().top - offsetHeight;
    	$('body,html').animate({
        	scrollTop: scrollPos
    	},250);
    return false;
	});
		
	//datatable for index page	
	$('#siteTable').dataTable( {
		"paging":         true,
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		"dom": "<'row'"+
				"<'col-md-6'l><'col-md-6'f>\n"+
				"<'clearfix'>\n"+
				"<'col-md-6'i><'col-md-6'p>\n"+
				"<'clearfix'>"+
				"<'col-md-12'<'border2'>>\n"+
				"<'clearfix'>\n"+
				"<'col-md-12'rt>\n"+
				"<'clearfix'>"+
				"<'col-md-12'<'border2'>>\n"+
				"<'clearfix'>"+
				"<'col-md-6'i><'col-md-6'p>\n"+
				"<'clearfix'>"+
				">"
		});
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
