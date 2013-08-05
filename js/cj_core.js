$(document).ready(function(){
	//$('#header_sub').hide();
	$("#accordion").accordion({ heightStyle: "content",active: 0,collapsible: true});
	$("ul#main_nav").accordion({ heightStyle: "content",active: 0,collapsible: true});
	$('#loader').hide();
	
	$('#job_category_alljobs').on("click",function(){
		$('#loader').show();
		//$('#mid_column').html('');
		$('#loader').hide().delay(1000);
	});
	
});