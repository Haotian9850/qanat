$(function(){

	function hide_most(){
		$(".list-group").each(function(){
			var plugs = $(this).children("li");
			var count = 0;
			plugs.each(function(){
				if($(this).hasClass("d-flex")){
					count++;
				}
				if(count >= 5){
					$(this).addClass("d-none");
					$(this).removeClass("d-flex");
				}
			});
		});
	}

	hide_most();
	

	var filtered = false;
	var hidden = true;

	function hide_bs_element(el){
		el.addClass("d-none");
		el.removeClass("d-flex");
	}

	function show_bs_element(el){
		el.removeClass("d-none");
		el.addClass("d-flex");
	}

	$(".show-all").click(function(){
		var plugs = $(this).prev().children("li");

		if(!$(this).prop("shown") || $(this).prop("shown") == "false"){
			hidden = false;
			plugs.each(function(){
				if(!filtered || ($(this).attr("compatible") == "true")){
					show_bs_element($(this))
				} 
			});
			$(this).text("Hide most");
			$(this).prop("shown","true");
		}else{
			hidden = true;
			var count = 0;
			plugs.each(function(){
				if($(this).hasClass("d-flex")){
					count++;
				}
				if(count >= 5){
					hide_bs_element($(this));
				}
			});
			$(this).text("Show all");
			$(this).prop("shown","false");
		}
		
	});

	$("#filter").click(function(e){
		var box = $(this).children("input");
		if(box.prop("checked")){
			$(".total_plug_ct").hide();
			$(".compatible_plug_ct").show();
			filtered = true;
			$(this).css("font-weight","bold");
			$(".list-group").children("li").each(function(){
				show_bs_element($(this));
			});
			var incompatible = $(".list-group li[compatible=false]");
			incompatible.each(function(){
				hide_bs_element($(this));
			});
			if(hidden){
				hide_most();
			}
		}else{
			filtered = false;
			$(".total_plug_ct").show();
			$(".compatible_plug_ct").hide();
			$(this).css("font-weight","");
			$(".list-group").children("li").each(function(){
				show_bs_element($(this));
			});
			if(hidden){
				hide_most();
			}
		}
	});

});