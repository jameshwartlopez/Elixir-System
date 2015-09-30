$(document).ready(function(){

	$('.txtSearchReport').on('input',function(){
		searchData = $(this).val();
		table_search('reportList',searchData);
	})

	$(".btnViewStockin").on('click',function(){
		dateFrom = $("#txtDateFrom").val();
		dateTo = $("#txtDateTo").val();

		$.post(home_url+'/report/stockIn_dateFromTo',{'dateFrom':dateFrom,'dateTo':dateTo},function(response){
			$("#reportList").html("").html(response);
		});

	});

	$(".btnViewService").on('click',function(){
		dateFrom = $("#txtDateFrom").val();
		dateTo = $("#txtDateTo").val();

		$.post(home_url+'/report/service_dateFromTo',{'dateFrom':dateFrom,'dateTo':dateTo},function(response){
			$("#reportList").html("").html(response);
		});

	});
});