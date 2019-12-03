$(function(){



	$("#export").click(function(){
		// $(".list-group").children)
		$.ajax({
			url: '/?action=export',
			data: {},
			success: function(data){

				// https://stackoverflow.com/questions/14964035/how-to-export-javascript-array-info-to-csv-on-client-side
				var encodedUri = encodeURI("data:text/csv;charset=utf-8," + data);
				$("#hidden_export_link").attr("href",encodedUri);
				$("#hidden_export_link").attr("download","data_export.csv");
				document.getElementById("hidden_export_link").click();
				// $("#hidden_export_link").trigger("click");
			}
		});
	});

});