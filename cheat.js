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

	$(".show-all").click(function(){
		var plugs = $(this).prev().children("li");

		if(!$(this).prop("shown") || $(this).prop("shown") == "false"){
			plugs.each(function(){
				$(this).removeClass("d-none");
				$(this).addClass("d-flex");
			});
			$(this).text("Hide most");
			$(this).prop("shown","true");
		}else{
			plugs.each(function(count){
				if(count >= 5){
					$(this).addClass("d-none");
					$(this).removeClass("d-flex");
				}
			});
			$(this).text("Show all");
			$(this).prop("shown","false");
		}
		
	});

});