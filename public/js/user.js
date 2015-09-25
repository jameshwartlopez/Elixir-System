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

/*
	Users Code
*/
	clear_userFields();
	 $("#gotoCreateUser").on('click',function(){
        $(".user_list").hide();
        $(".create_user").fadeIn();
    });

    $("#gotUserList").on('click',function(){
        $(".create_user").hide();
        $(".user_list").fadeIn();
    });

    $(document).on('click','.btnEditUser',function(){

    });

    $("#btnSaveUser").on('click',function(){
    	save_or_update_user();
    });

    $("#btnUpdateuser").on('click',function(){
    	save_or_update_user();
    });

    $("#btnClearUser").on('click',function(){
    	clear_userFields();
    });



    function save_or_update_user(flag){

    	userName = $.trim($("#txtUsername").val());
    	uPassword = $.trim($("#txtPassword").val());
    	uEmail = $.trim($("#txtEmail").val());
    	uGender = $.trim($("#cmbGender").val());
    	uFirstName = $.trim($("#txtFirstName").val());
    	uLastName =$.trim($("#txtLastName").val());
    	uContact = $.trim($("#txtContact").val());
    	userType = $.trim($("#cmbUserType").val());
    	data = {
            'username':userName,
            'password':uPassword,
            'Email':uEmail,
            'Firstname':uFirstName,
            'LastName':uLastName,
            'Contact':uContact,
            'avatar': (uGender == 'Male')? 'public/img/profile-pics/2.jpg':'public/img/profile-pics/1.jpg',
            'user_type':userType,
        }

    	if(userName.length <= 0 || uPassword.length <= 0 || uEmail.length <= 0  || uFirstName.length <= 0 || uLastName.length <= 0 || uContact.length <= 0){
    		 notify_user('danger','Please fill in all fields!');
    	}else if(uGender.length <= 0){
    		notify_user('danger','Please select the users gender!');
    	}else if(userType.length <= 0){
    		notify_user('danger','Please select user type!');
    	}else{
    		user_data ={
    			'data':data
    		}

    		url = 'user/save_user';

    		if(flag == 'update'){
    			user_data ={
    				'id':$("#btnUpdateuser").attr('data-user-id'),
	    			'data':data
	    		}

	    		url = 'user/update_user';
    		}
    		$.post(url,product_data,function(response){
                    console.log(response);
                    if(response != ''){
                        notify_user('info','Products successfully saved!','');
                        $("#userList").html("");
                        $("#userList").html(response)
                        clear_product();        
                    }
            });
    	}
    	  	 
    }

    function clear_userFields(){
    	$("#txtUsername").val("");
    	$("#txtPassword").val("");
    	$("#txtEmail").val("");
    	$("#cmbGender").val("");
    	$("#txtFirstName").val("");
    	$("#txtLastName").val("");
    	$("#txtContact").val("");
    	$("#cmbUserType").val("");
    	$("#btnUpdateuser").removeAttr('data-user-id');
    	$("#btnSaveUser").show();
    	$("#btnUpdateuser").hide();
    }
/*
	End Users code
 */

/*
	Clients Code
*/
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
                        notify_user('info','Client information successfully saved!','');
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
/*
	End Clients Code
*/
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