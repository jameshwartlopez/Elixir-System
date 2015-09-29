$(document).ready(function(){

	$("#txtSearchService").on('input',function(){
        table_search('serviceList',$(this).val());
    });

	$("#btnSaveService").on('click',function (argument) {
		save_service("save");
	});

	$("#btnUpdateService").on('click',function (argument) {
		update_service();
	});

	$("#btnClearService").on('click',function (argument) {
		clear_service();
	});

	$(document).on('click',".btnEditService",function (argument) {
		$("#txtDate").val($(this).data('service-date'));
		$("#cmbClient").val($(this).data('service-client-id'));
		$("#txtPrinterModel").val($(this).data('service-printer-model'));
		$("#txtRemarks").val($(this).data('service-remarks'));
		$('.selectpicker').selectpicker('refresh');
		$("#btnUpdateService").attr('data-service-id',$(this).data('service-id')).show();
		var radios = $('input:radio[name=rdbstatus]');
		

		for(i=0 ; i< radios.length; i++){
			if(radios[i]['defaultValue'] === $(this).data('service-status') ){
				radios[i]['checked'] = true;
			}else{
				radios[i]['checked'] = false;
			}
		}
	   
		$("#btnSaveService").hide();
	});

	function update_service(){
		date = $("#txtDate").val();
		client_id = $("#cmbClient").val();
		printer_model = $("#txtPrinterModel").val();
		remarks = $("#txtRemarks").val();
		status = $("input:radio[name=rdbstatus]:checked").val();
		
		if(date.length <= 0 || printer_model.length <= 0 || remarks.length <= 0){
			notify_user('danger',"Please fill up empty fields");
		}else if(client_id.length <= 0 ){
			notify_user('danger',"Please select a Client");
		}else{
			data ={
				'date':date,
				'client_id':client_id,
				'printer_model':printer_model,
				'remarks':remarks,
				'status': status
			}

			
			url = home_url+'/service/update_service';
			client_data  = {'data':data,'id':$("#btnUpdateService").data('service-id')}

			$.post(home_url+'/service/update_service',client_data,function(response){
                    if(response !=''){
                    	$("#serviceList").html("").html(response);
                        notify_user('info',"Service Report was updated!");
                        clear_service();
                    }
                     
             });			
		}
	}
	function save_service() {
		date = $("#txtDate").val();
		client_id = $("#cmbClient").val();
		printer_model = $("#txtPrinterModel").val();
		remarks = $("#txtRemarks").val();
		status = $("input:radio[name=rdbstatus]:checked").val();
		
		if(date.length <= 0 || printer_model.length <= 0 || remarks.length <= 0){
			notify_user('danger',"Please fill up empty fields");
		}else if(client_id.length <= 0 ){
			notify_user('danger',"Please select a Client");
		}else{
			data ={
				'date':date,
				'client_id':client_id,
				'printer_model':printer_model,
				'remarks':remarks,
				'status': status
			}

			client_data = {'data':data}
			url = home_url+'/service/save_service';
			$.post(url,client_data,function(response){
                    if(response !=''){
                    	$("#serviceList").html("").html(response);
                        notify_user('info',"Service Report was created!");
                        clear_service();
                    }
                     
             });  
			
		}
	}

	function clear_service() {
		$("#txtDate").val($("#header").attr('data-date-today'));
		$("#cmbClient").val("");
		$("#txtPrinterModel").val("");
		$("#txtRemarks").val("");
		$('.selectpicker').selectpicker('refresh');
		$("#btnUpdateService").hide();
		$("#btnSaveService").show();
	}
});