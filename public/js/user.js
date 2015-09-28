(function($) {
	$(document).ready(function(){

    /*
        Current User
    */
        //users avatar 
        $(".user_avatar").on("click",function(){
            user_avatar = $(this).attr("data-user-avatar");

            $.post(home_url+'/user/update_user_avatar',{'avatar':user_avatar},function(response){
                if(response){
                    $(".profile-pic img").attr('src',user_avatar);
                }
            });
        });

        //basic Information
        $("#btnSaveBasicInformation").on('click',function(){
            save_basic_information();
        });

        $("#txtCFname, #txtCLname , #cmbCgender").on('keypress',function(e){
            if(e.which == 13){
                save_basic_information();
            }
        });

        function save_basic_information(){
            uFName = $.trim($("#txtCFname").val());
            uLName =$.trim($("#txtCLname").val());
            uGender = $.trim($("#cmbCgender").val());

            data={
                'Firstname':uFName,
                'LastName':uLName,
                'gender':uGender
            }

            if(uFName.length <= 0 || uLName.length <= 0){
                notify_user('danger',"Please fill up empty fields!","Saving Error! ");
            }else if(uGender.length <= 0){
                notify_user('danger',"Please select a gender","Saving Error! ");
            }else{
                $.post(home_url+'/user/update_current_user',{'data':data},function(response){
                    if(response == 1){
                        alert("User information successfully saved!\n System will reload!");
                        window.location.reload();
                    }
                });    
            } 
        }
        //end basic information

        //Contact Information
        $("#btnSaveCContact").on('click',function(){
            save_contact_information();
        });

        $("#txtCContact, #txtCEmail").on('keypress',function(e){
            if(e.which == 13){
                save_contact_information();
            }
        });
        function save_contact_information(){
            cNumber = $("#txtCContact").val();
            cEmailAddress = $("#txtCEmail").val();

            if(cNumber.length <= 0 || cEmailAddress.length <= 0 ){
                notify_user('danger',"Please fill up empty fields!","Saving Error! ");
            }else{
                data={
                    'Contact':cNumber,
                    'Email':cEmailAddress
                }

                $.post(home_url+'/user/update_current_user',{'data':data},function(response){
                    if(response == 1){
                        alert("User information successfully saved!\n System will reload!");
                        window.location.reload();
                    }
                });    
            }
        }
        //End Contact Information

        //Login Credentials

        $("#btnSaveLoginCredentials").on('click',function(){
            save_login_credentials();
        });

        $("#txtCUsername, #txtCOldpassword, #txtCNewpassword, #txtCConfirmpassword").on('keypress',function(e){
            if(e.which == 13){
                save_login_credentials();
            }
        });

        function save_login_credentials(){
            userName = $.trim($("#txtCUsername").val());
            oldPassword =  $.trim($("#txtCOldpassword").val());
            newPassword = $.trim($("#txtCNewpassword").val());
            confirmPassword = $.trim($("#txtCConfirmpassword").val());

            if(userName.length <= 0 || oldPassword.length <= 0 || newPassword.length <=0 || confirmPassword.length <= 0){

               notify_user('danger',"Please fill up empty fields!","Saving Error! "); 

            }else if(confirmPassword != newPassword){
                notify_user('danger',"New password and confirm password dont match","Saving Error! ");
            }else{
               data={
                    'username':userName,
                    'oldPassword':oldPassword,
                    'password':newPassword
                }

                $.post(home_url+'/user/update_login_credential',{'data':data},function(response){
                    $(".errors").html("").html('<pre>'+response+'</pre>');
                    if(response == 3){
                        notify_user('danger','Your password is incorrect!');
                    }else if(response == 2){
                        notify_user('danger','Username is already in use!');
                    }else if(response == 1){
                        alert("User information successfully saved!\n System will reload!");
                        window.location.reload();
                    }

                });     
            }
        }
        //End Login Credentials
    /*
        End Current User
    */

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

    $("#txtUsername ,#txtPassword ,#txtEmail ,#cmbGender ,#txtFirstName ,#txtLastName ,#txtContact ,#cmbUserType ").on('keypress',function(e){
        if(e.which == 13){
            var attr = $("#btnUpdateuser").attr("data-user-id");
            if(typeof attr != typeof undefined && attr !== false){
                 save_or_update_user('update');
            }else{
                save_or_update_user();
            }
        }
    });

    $(document).on('click','.btnEditUser',function(){
       
        $("#txtUsername").val($(this).attr('data-username'));
        $("#txtPassword").val($(this).attr('data-password'));
        $("#txtEmail").val($(this).attr('data-Email'));
        $("#cmbGender").val($(this).attr('data-gender'));
        $("#txtFirstName").val($(this).attr('data-Firstname'));
        $("#txtLastName").val($(this).attr('data-LastName'));
        $("#txtContact").val($(this).attr('data-Contact'));
        $("#cmbUserType").val($(this).attr('data-user-type'));
        $("#btnUpdateuser").attr('data-user-id',$(this).attr('data-user-id'));
        $("#btnSaveUser,.user_list").hide();
        $("#btnUpdateuser,.create_user").fadeIn();
        $('.selectpicker').selectpicker('refresh');
    });

    $("#btnSaveUser").on('click',function(){
    	save_or_update_user();
    });

    $("#btnUpdateuser").on('click',function(){
    	save_or_update_user('update');
    });

    $("#btnClearUser").on('click',function(){
    	clear_userFields();
    });

    $("#txtSearchUser").on('input',function(){
        table_search('userList',$(this).val());
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
            'gender':uGender,
            'avatar': (uGender == 'Male')? home_url+'/public/img/profile-pics/2.jpg':home_url+'/public/img/profile-pics/1.jpg',
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

    		url = '/user/save_user';

    		if(flag == 'update'){
    			user_data ={
    				'id':$("#btnUpdateuser").attr('data-user-id'),
	    			'data':data
	    		}

	    		url = '/user/update_user';
    		}
    		$.post(home_url+url,user_data,function(response){
                    console.log(response);
                    if(response != ''){
                        notify_user('info','User successfully saved!','');
                        $("#userList").html("");
                        $("#userList").html(response)
                        clear_userFields();        
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
        $('.selectpicker').selectpicker('refresh');
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
				

				$.post(home_url+url,client_data,function(response){
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
	});
})(jQuery);