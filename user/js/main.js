$('document').ready(function() {
	var storSeats = $("#store_seats");
	var seats = $(".seats table input");
	var array = [];
	seats.click(function(){
		$(this).toggleClass("btn-success");
		var value = $(this).val();
		array.push(value);
		storSeats.val(JSON.stringify(array));
	});
});