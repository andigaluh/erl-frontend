$(document).ready(function() {	
	
	$("#first_name").select2({
		placeholder: "Search for a user",
		minimumInputLength: 3,
	});

	$("#first_name").change(function(){
		if($(this).val() != 0){
			window.location = $(this).val();
		}
	});

	
});