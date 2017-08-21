$('document').ready(function() {
	var seats = $(".seats table a");
	seats.click(function(){
		$(this).toggleClass("btn-success");
	});
});