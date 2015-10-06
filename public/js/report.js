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

	$(".btnViewStockOut").on('click',function(){
		dateFrom = $("#txtDateFrom").val();
		dateTo = $("#txtDateTo").val();

		data = {'dateFrom':dateFrom,'dateTo':dateTo};
		$.post(home_url+'/report/stockOut_DateFromTo',data,function(response){
			// console.log(data);
			console.log(response);

			$("#reportList").html("").html(response);
		});

	});
	//btnViewStockPilde
	$(".btnViewStockPilde").on('click',function(){
		dateFrom = $("#txtDateFrom").val();
		dateTo = $("#txtDateTo").val();

		data = {'dateFrom':dateFrom,'dateTo':dateTo};
		$.post(home_url+'/report/stokPile_report',data,function(response){
			// console.log(data);
			console.log(response);

			$("#reportList").html("").html(response);
		});

	});

	//btnViewReturndList
	$(".btnViewReturndList").on('click',function(){
		dateFrom = $("#txtDateFrom").val();
		dateTo = $("#txtDateTo").val();

		data = {'dateFrom':dateFrom,'dateTo':dateTo};
		$.post(home_url+'/report/returned_list',data,function(response){
			// console.log(data);
			console.log(response);

			$("#reportList").html("").html(response);
		});

	});	
});