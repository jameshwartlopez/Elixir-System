$(document).ready(function(){
    /*
        number only input type will user the class number(.number)
     */
    $(".number").on('keypress',function(evt){
        return ja_isNumber(evt);
    });
    /*
        Transaction 
     */
        $(document).on('click','.btnAddQty',function(){
            stockinQty = $('#txtQty'+$(this).attr('data-product-id'));
           
            date = $("#txtDate").val();
            data = {
                'product_id':$(this).attr('data-product-id'),
                'quantity':stockinQty.val(),
                'date':date             
            }
            if(stockinQty.length <= 0 || stockinQty <= 0){
                notify_user("danger","Please enter a quantity to stockin!")
            }else{

                $.post(home_url+'/product/save_stockin',{'data':data},function(response){
                    if(response == 1){
                        stockinQty.val("1");
                        notify_user('info',"Stock in Successful!");
                    }
                     
                });   
            }
           
            
        });
    /*
        End Transaction
     */
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
            var attr = $("#btnUpdateCategory").attr("data-cat-id");
            if(typeof attr != typeof undefined && attr !== false){
                 update_category();
            }else{
                save_category();
            }
        }
    });

    $("#txtCategorySearch").on('input',function(){
        table_search('categoryList',$(this).val());
    });

    $("#btnSaveCategory").on('click',function(){
        save_category();
    });

    $("#btnClearCategory").on('click',function(){
       clear_category();
    });


    function save_category(){
        var value = $.trim($("#txtCategoryName").val());
        if( value.length <= 0){

             notify_user('danger','Please Enter Category Name','Saving Error ');

        }else{
            $.post(home_url+'/product/save_category',{'catName':$("#txtCategoryName").val()},function(response){
                if(response != ''){
                    notify_user('info','Successfully Saved!');
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
            $.post(home_url+'/product/update_category',{'id':$("#btnUpdateCategory").attr('data-cat-id'),'catName':$("#txtCategoryName").val()},function(response){
              
                if(response != ''){
                    notify_user('info','Successfully Updated!');
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
        table_search('itemUnitList',$(this).val());
    });

    function save_itemUnit(){
        var value = $.trim($("#txtItemUnit").val());
        if( value.length <= 0){

             notify_user('danger','Please Enter Item Unit','Saving Error ');

        }else{
            $.post(home_url+'/product/save_itemUnit',{'itemUnit':value},function(response){
              
                if(response != ''){
                    notify_user('info','Successfully Saved!');
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
            $.post(home_url+'/product/update_itemUnit',{'id':$("#btnUpdateItemUnit").attr('data-itemunit-id'),'itemName':$("#txtItemUnit").val()},function(response){
                console.log(response);
                if(response != ''){
                    notify_user('info','Successfully Updated!');
                    $("#itemUnitList").html("");
                    $("#itemUnitList").html(response)
                    clear_itemUnit();        
                }
            });    
        }
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

/*
    Product Entry
 */
    clear_product();
    $(document).on('click','.btnEditProduct',function(){
        $("#txtPCode").val($(this).attr('data-product-code'));
        $("#txtPName").val($(this).attr('data-product-name'));
        $("#cmbPcategory").val($(this).attr('data-product-category'));
        $("#cmbPItemUnit").val($(this).attr('data-product-item-unit'));
        $("#txtPUnitPrice").val($(this).attr('data-product-unit-price'));
        $("#txtPSellingPrice").val($(this).attr('data-product-selling-price'));
        $("#txtPQuantity").val($(this).attr('data-product-quantity'));
        $("#txtDate").val($(this).attr('data-product-date'));
        $("#btnUpdateProduct").attr("data-product-id",$(this).attr('data-product-id'));
        $("#btnUpdateProduct").show();
        $("#btnSaveProduct").hide();
        $('.selectpicker').selectpicker('refresh')
    });

    $("#txtPQuantity").on('keypress',function(evt){
        return ja_isNumber(evt);
    });

    $("#btnSaveProduct").on('click',function(){
        save_or_update_product();
    });

    $("#btnUpdateProduct").on('click',function(){
        save_or_update_product("update");
    });

    $("#btnClearProduct").on('click',function(){
        clear_product();
    });

     $("#txtPCode , #txtPName ,#txtPUnitPrice , #txtPSellingPrice , #txtPQuantity").on('keypress',function(e){
        if(e.which == 13){
            var attr = $("#btnUpdateProduct").attr("data-product-id");
            if(typeof attr != typeof undefined && attr !== false){
                 save_or_update_product("update");
            }else{
                save_or_update_product("save");
            }
            
        }
    });

    $("#txtSearchProduct").on('input',function(){

    });

    function save_or_update_product(flag){
         pcode = $.trim($("#txtPCode").val());
         pname = $.trim($("#txtPName").val());
         pcategory = $.trim($("#cmbPcategory").val());
         pitemUnit = $.trim($("#cmbPItemUnit").val());
         punitPrice = $.trim($("#txtPUnitPrice").val());
         pSellingPrice = $.trim($("#txtPSellingPrice").val());
         pQuantity = $.trim($("#txtPQuantity").val());
         pDate = $.trim($("#txtDate").val());
         data = {
            'code':pcode,
            'name':pname,
            'category':pcategory,
            'item_unit':pitemUnit,
            'unit_price':punitPrice,
            'selling_price':pSellingPrice,
            'quantity':pQuantity,
            'date':pDate
        }

        if(
            pDate.length <= 0 ||
            pcode.length <=0 || 
            pname.length <= 0 || 
            pcategory.length <= 0 || 
            pitemUnit.length <= 0 || 
            punitPrice.length <= 0 || 
            pSellingPrice.length <= 0 || 
            pQuantity.length <= 0){
            notify_user('danger','Please fill in all fields!');
        }else if(punitPrice == 0){
            notify_user('danger','Please Enter Unit Price!','');
        }else if(pSellingPrice == 0){
            notify_user('danger','Please Enter Selling Price!','');
        }else if(pQuantity == 0){
            notify_user('danger','Please Enter Quantity!','');
        }else{
            url = '/product/save_product';
            product_data = {
                'data':data
            }

            if(flag == 'update'){
                url = '/product/update_product';
                product_data = {
                    'id':$("#btnUpdateProduct").attr("data-product-id"),
                    'data':data
                }
            }

            $.post(home_url+url,product_data,function(response){
                    console.log(response);
                    if(response != ''){
                        notify_user('info','Products successfully saved!');
                        $("#productList").html("");
                        $("#productList").html(response)
                        clear_product();        
                    }
            });    
        }
    }

    function clear_product(){
         $("#txtPCode").val("");
         $("#txtPName").val("");
         $("#cmbPcategory").val("");
         $("#cmbPItemUnit").val("");
         $("#txtPUnitPrice").val("");
         $("#txtPSellingPrice").val("");
         $("#txtPQuantity").val("");
         $("#txtDate").val($("#header").attr('data-date-today'));
         $("#btnUpdateProduct").removeAttr('data-product-id');
         $("#btnUpdateProduct").hide();
         $("#btnSaveProduct").show();
         $('.selectpicker').selectpicker('refresh');
    }
    
    $("#txtSearchProduct").on('input',function(){
        table_search('productList',$(this).val());
    });

    
/*
    End Product Entry
 */
})