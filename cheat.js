$(function(){

	$(".list-group").each(function(){
		var plugs = $(this).children("li");
		plugs.each(function(count){
			if(count >= 5){
				$(this).addClass("d-none");
				$(this).removeClass("d-flex");
			}
		});
	});
});