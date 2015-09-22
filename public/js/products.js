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

    $("#gotoProductEntry").on('click',function(){
        $(".product_list").hide();
        $(".product_entry").fadeIn();
    });

    $("#gotoProductList").on('click',function(){
        $(".product_entry").hide();
        $(".product_list").fadeIn();
    });

    $(document).on('click','.btnEditProduct',function(){
        $(".product_list").hide();
        $(".product_entry").fadeIn();
        $(this).attr("data-product-id");
    });

/*
    Category Events
*/
    
    clear_category();

    $(document).on('click','.btnEditCategory',function(){
        $("#btnUpdateCategory").attr('data-cat-id',$(this).attr("data-category-id"));
        $("#txtCategoryName").val($(this).attr('data-category-name'));
        $("#btnUpdateCategory").show();
        $("#btnSaveCategory").hide();
    });

    $("#btnUpdateCategory").on('click',function(){
       update_category();
    });

    $("#txtCategoryName").on('keypress',function(e){
        if(e.which == 13){
            var attr = $("#btnUpdateCategory").attr("data-category-id");
            if(typeof attr != typeof undefined && attr !== false){
                 update_category();
            }else{
                save_category();
            }
            
        }
    });

    $("#txtCategorySearch").on('input',function(){
        search_category();
    });

    $("#btnSaveCategory").on('click',function(){
        save_category();
    });

    $("#btnClearCategory").on('click',function(){
       clear_category();
    });

    function search_category(){
          $.post('/product/search_category',{'catName':$("#txtCategorySearch").val()},function(response){
                console.log(response);
                if(response != ''){
                    $("#categoryList").html("");
                    $("#categoryList").html(response)
                    clear_category();        
                }
            });   
    }

    function save_category(){
        var value = $.trim($("#txtCategoryName").val());
        if( value.length <= 0){

             notify_user('danger','Please Enter Category Name','Saving Error ');

        }else{
            $.post('/product/save_category',{'catName':$("#txtCategoryName").val()},function(response){
                if(response != ''){
                    notify_user('info','Successfully Saved!','');
                    $("#categoryList").append(response)
                    clear_category();        
                }
            });    
        }
    }
    function update_category(){
        var value = $.trim($("#txtCategoryName").val());
        if( value.length <= 0){

             notify_user('danger','Please Enter Category Name','Saving Error ');

        }else{
            $.post('/product/update_category',{'id':$("#btnUpdateCategory").attr('data-cat-id'),'catName':$("#txtCategoryName").val()},function(response){
              
                if(response != ''){
                    notify_user('info','Successfully Updated!','');
                    $("#categoryList").html("");
                    $("#categoryList").html(response)
                    clear_category();        
                }
            });    
        }
    }
    function clear_category(){
        $("#txtCategoryName").val("");
        $("#btnSaveCategory").removeAttr('data-cat-id');
        $("#btnUpdateCategory").hide();
        $("#btnSaveCategory").show();
    }
/*
    End Category Events
 */


/*
    Item units Events
 */
    //initialize html 
    clear_itemUnit();

    $(document).on('click','.btnEditItemUnit',function(){
        $("#txtItemUnit").val($(this).attr('data-itemunit-name'));
        $("#btnUpdateItemUnit").attr('data-itemunit-id',$(this).attr("data-itemunit-id"));
        $("#btnUpdateItemUnit").show();
        $("#btnSaveItemUnit").hide();
    });

    $("#btnSaveItemUnit").on('click',function(){
        save_itemUnit();
    });

    $("#btnUpdateItemUnit").on('click',function(){
        update_itemUnit();
    });
    
    $("#btnClearItemUnit").on('click',function(){
        clear_itemUnit();
    });

    $("#txtItemUnit").on('keypress',function(e){
        if(e.which == 13){
            var attr = $("#btnUpdateItemUnit").attr("data-itemunit-id");
            if(typeof attr != typeof undefined && attr !== false){
                 update_itemUnit();
            }else{
                save_itemUnit();
            }
            
        }
    });
   
    $('#txtSearchItemUnit').on("input",function(){
        search_itemUnit();
    });

    function save_itemUnit(){
        var value = $.trim($("#txtItemUnit").val());
        if( value.length <= 0){

             notify_user('danger','Please Enter Item Unit','Saving Error ');

        }else{
            $.post('/product/save_itemUnit',{'itemUnit':value},function(response){
              
                if(response != ''){
                    notify_user('info','Successfully Saved!','');
                    $("#itemUnitList").append(response)
                    clear_itemUnit();        
                }
            });    
        }
    }

    function update_itemUnit(){
        var value = $.trim($("#txtItemUnit").val());
        if( value.length <= 0){

             notify_user('danger','Please Enter Category Name','Saving Error ');

        }else{
            $.post('/product/update_itemUnit',{'id':$("#btnUpdateItemUnit").attr('data-itemunit-id'),'itemName':$("#txtItemUnit").val()},function(response){
                console.log(response);
                if(response != ''){
                    notify_user('info','Successfully Updated!','');
                    $("#itemUnitList").html("");
                    $("#itemUnitList").html(response)
                    clear_itemUnit();        
                }
            });    
        }
    }

    function search_itemUnit(){
         $.post('/product/search_itemUnit',{'itemUnitName':$("#txtSearchItemUnit").val()},function(response){
                console.log(response);
                if(response != ''){
                    $("#itemUnitList").html("");
                    $("#itemUnitList").html(response)
                    clear_itemUnit();        
                }
            });   
    }

    function clear_itemUnit(){
        $("#btnUpdateItemUnit").hide();
        $("#btnSaveItemUnit").show();
        $("#txtItemUnit").val("")
        $("#btnUpdateItemUnit").removeAttr('data-itemunit-id');
    }
/*
    End Item units Events
 */
})