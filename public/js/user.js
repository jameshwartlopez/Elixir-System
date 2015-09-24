(function($) {
	$(document).ready(function(){

		/*
                 * Notifications
                 */
                function notify_user(type,msg,title){
                    $.growl({
                        title: title,
                        message: msg,
                    },{
                            element: 'body',
                            type: type,
                            allow_dismiss: true,
                            offset: {
                                x: 20,
                                y: 85
                            },
                            spacing: 10,
                            z_index: 1031,
                            delay: 2500,
                            timer: 1000,
                            url_target: '_blank',
                            mouse_over: false,
                            icon_type: 'class',
                            template: '<div data-growl="container" class="alert" role="alert">' +
                                            '<button type="button" class="close" data-growl="dismiss">' +
                                                '<span aria-hidden="true">&times;</span>' +
                                                '<span class="sr-only">Close</span>' +
                                            '</button>' +
                                            '<span data-growl="icon"></span>' +
                                            '<span data-growl="title"></span>' +
                                            '<span data-growl="message"></span>' +
                                            '<a href="notification-dialog.html#" data-growl="url"></a>' +
                                        '</div>'
                    });
                };

        clear_clientFields();

        $(document).on('click','.btnEditClient',function(){
        	$("#btnUpdateClient").attr('data-client-id',$(this).attr('data-client-id'));
        	$("#btnUpdateClient").show();
			$("#btnSaveClient").hide();

			$("#txtClientName").val($(this).attr('data-client-name'));
			$("#txtClientAddress").val($(this).attr('data-client-address'));
			$("#txtClientTelNo").val($(this).attr('data-client-telno'));
			$("#txtClientFaxNo").val($(this).attr('data-client-faxno'));
			$("#txtClientEmail").val($(this).attr('data-client-email'));
			$("#txtClientContactPerson").val($(this).attr('data-client-contactperson'));
        });

        $("#txtSearchClient").on('input',function(){
        	table_search("clientList",$(this).val());
        });

        $("#txtClientName, #txtClientAddress , #txtClientTelNo ,#txtClientFaxNo ,#txtClientEmail,#txtClientContactPerson ").on('keypress',function(e){
        	if(e.which == 13){
	            var attr = $("#btnUpdateClient").attr("data-client-id");
	            if(typeof attr != typeof undefined && attr !== false){
	                 save_or_update_client("update");
	            }else{
	                save_or_update_client("save");
	            }
	            
	        }
        });
		$("#btnSaveClient").on('click',function(){
			save_or_update_client("save");
		});

		$("#btnUpdateClient").on('click',function(){
			save_or_update_client("update");
		});
		$("#btnClearClient").on('click',function(){
			clear_clientFields();
		});

		function save_or_update_client(flag){

			cname  = $.trim($("#txtClientName").val());
			caddres = $.trim($("#txtClientAddress").val());
			ctelno = $.trim($("#txtClientTelNo").val());
			cfaxno = $.trim($("#txtClientFaxNo").val());
			cemail = $.trim($("#txtClientEmail").val());
			ccontact = $.trim($("#txtClientContactPerson").val());

			if(cname.length <= 0 || caddres.length <= 0 || ctelno.length <= 0 || cfaxno.length <= 0 || cemail.length <= 0 || ccontact.length <= 0){
 			
 				notify_user('danger','Please fill up all the empty fields','Saving Error! ');
			
			}else{
				data = {
					'name':cname,
					'address':caddres,
					'telphone_number':ctelno,
					'fax_number':cfaxno,
					'email':cemail,
					'contact_person':ccontact,
				}

				client_data ={
					'data':data
				}

				url = '/client/save_client';
				
				if(flag == 'update'){
					client_data ={
						'id':$("#btnUpdateClient").attr('data-client-id'),
						'data':data
					}
					url = '/client/update_client';	
				}
				

				$.post(url,client_data,function(response){
					console.log(response);
                    if(response != ''){
                        notify_user('info','Products successfully saved!','');
                        $("#clientList").html("");
                        $("#clientList").html(response)
                        clear_clientFields();        
                    }
				});
			}
		}

		function clear_clientFields(){
			$("#btnUpdateClient").hide();
			$("#btnUpdateClient").removeAttr('data-client-id');

			$("#btnSaveClient").show();
			$("#txtClientName").val("");
			$("#txtClientAddress").val("");
			$("#txtClientTelNo").val("");
			$("#txtClientFaxNo").val("");
			$("#txtClientEmail").val("");
			$("#txtClientContactPerson").val("");
		}
		function table_search(tblSelector,value){
	        var rows = $('#'+tblSelector+' tr');
	       
	        var val = $.trim(value).replace(/ +/g, ' ').toLowerCase();
	            
	        rows.show().filter(function() {
	                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
	                return !~text.indexOf(val);
	        }).hide();
	       
	    }

	});
})(jQuery);