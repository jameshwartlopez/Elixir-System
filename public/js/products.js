$(document).ready(function(){
   
    /*
        Transaction 
     */
        $("#txtSOdiscout").on('keypress input',function(){
            //$("#stockOutDiscount").html($(this).val());
            current_StockOutList();
        });
        //return items event handler
        $(document).on('click','.btnReturnItems',function(){
            data = {
                'client_id':$(this).data('client-id'),
                'transaction_no':$(this).data('transaction-no'),
                'stockout_id':$(this).data('stockout-id')
            }
            $.post(home_url+'/product/save_return',{'data':data},function(response){
                console.log(response);
                if(response == 1){
                    window.location.reload();
                }
            });
        });

        //paid handler
        $(document).on('click','.btnStockOutStatus',function(){
            data = {'transaction_no':$(this).data('transaction-no'),'client_id':$(this).data('client-id')};

            p = confirm("Is this client already paid?");
            console.log(p);
            if(p){
                $.post(home_url+'/product/so_paid_save',data,function(response){
                    console.log(response);
                    if(response == 1){
                        window.location.reload();
                    }
                });
            }
            
        });

        $(document).on('click','.btnAddQty',function(){
            stockinQty = $('#txtQty'+$(this).attr('data-product-id'));
            date = $("#txtDate").val();
            data = {
                'product_id':$(this).attr('data-product-id'),
                'quantity':stockinQty.val(),
                'date':date             
            }
            if(stockinQty.length <= 0 || stockinQty.val().length <= 0){
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

        $(document).on('keypress','.txtStockOutQty',function(){
            if(e.which == 13){

            }
        });

        $("#btnSaveStockOutList").on('click',function(){
           
            var sList = JSON.parse(localStorage.getItem('stockOut'));
            discount = $.trim($("#txtSOdiscout").val());
            
            if(discount.length <= 0){
                discount = 0.00;
            }else if(typeof discount === 'undefined'){
                discount = 0.00;
            }

            data = {
                    'data':sList,
                    'terms':$("#cmbTerms").val(),
                    'client_id':$("#cmbClient").val(),
                    'date':$("#txtDate").val(),
                    'discount':discount
            }
            if($("#cmbClient").val().length <= 0){
                notify_user("danger","Please select a customer for this transaction");
            }else if($("#cmbTerms").val().length <= 0){
                notify_user("danger","Please select the terms in days");
            }else{

                $.post(home_url+'/product/save_stockOutList',data,function(response){
                    
                   

                    //clear the stockout list 
                    if(response == 'hashold'){
                         console.log(response);
                         notify_user("danger","Stockout cannot proceed because the client selected has a hold order.");
                    }else{
                        $("#lblDate").text($("#txtDate").val());
                        $("#lblClient").text($("#cmbClient option[value='"+$("#cmbClient").val()+"']").html());
                    
                        $("#lblTerm").text($("#cmbTerms option[value='"+$("#cmbTerms").val()+"']").html());
                        $(".stock-out-card-header,.clientDateContainer").show();
                        
                        window.print();
                        window.location.reload();
                        localStorage.removeItem('stockOut');
                        $("#stockGrandTotal,#stockVatTotal ,#stockOutList").html("");
                        $(".stock-out-card-header,.clientDateContainer").hide();         
                    }
                    
                });   
            }
        });
        
        $("#btnClearService").on('click',function(){
            localStorage.removeItem('stockOut');
            $("#stockGrandTotal,#stockVatTotal ,#stockOutList").html("");
            window.location.reload();
        });

        $("#txtStockOutSearchProduct").on('input',function(){
            table_search("pList",$(this).val());
        });

        $(document).on('click','.bntRemoveStockOutRow',function(){
            remove_stockOutData($(this).data('p-id'));
            current_StockOutList();
            
        });

        $(document).on('keypress','.txtQty_so',function(e){
            if(e.which == 13){
                 quantity = $(this).val();

                newqty = $(this).data('product-quantity') - quantity;
        
                client_id = $("#cmbClient").val();
                product_id = $(this).data('product-id');
                
                product_name = $(this).data('product-name');
                product_itemUnit = $(this).attr('data-product-ritemunit');

                price = $(this).data('product-selling-price');
                categoryName = $(this).data('product-category-name');

                total = quantity * price;
                total = total.toFixed(2);


                if(quantity > $(this).data('product-quantity')){
                    notify_user('danger','Quantity Entered is greater than the available Quantity. Available quantity is '+ $(this).data('product-quantity'));
                }else{
                    
                    stockOut_data = {
                        'product_id':product_id,
                        'quantity':quantity,
                        'price':price,
                        'total':total,
                        'product_name':product_name,
                        'product_itemUnit':product_itemUnit,
                        'categoryName':categoryName
                    }
                   
                    stockOutlist = []
                    stockOutlist.push(stockOut_data);
                    
                    if(localStorage.getItem('stockOut') !== null){
                       
                       slist = JSON.parse(localStorage.getItem('stockOut'));
                      
                      
                       if(stockOutChecker(product_id) != null){
                            rowStockList = stockOutChecker(product_id);
                            //get remaining quantity here after the summation
                            quantity = parseInt(quantity) + parseInt(rowStockList.quantity);
                            
                            $.post(home_url+'/product/getProductInfo',{'id':product_id},function(response){
                              
                                if(response != ''){
                                    result = JSON.parse(response);
                                    console.log(result.quantity+" "+quantity);

                                    qty = result.quantity
                                    if(quantity > qty){
                                        notify_user('danger','Quantity('+qty+') Entered is greater than the available Quantity. Available quantity is '+ result.quantity);
                                    }else if(quantity <= qty){
                                        total = quantity * price;
                                        total = total.toFixed(2);

                                        stockOut_data = {
                                            'product_id':product_id,
                                            'quantity':quantity,
                                            'price':price,
                                            'total':total,
                                            'product_name':product_name,
                                            'product_itemUnit':product_itemUnit,
                                            'categoryName':categoryName
                                        }
                                        
                                        remove_stockOutData(product_id);

                                        k = JSON.parse(localStorage.getItem('stockOut'));
                                        k.push(stockOut_data);
                                        localStorage.setItem('stockOut',JSON.stringify(k));
                                    }
                                }
                            });
                            

                       }else{
                             slist.push(stockOut_data);
                             localStorage.setItem('stockOut',JSON.stringify(slist));
                       }

                       

                    }else if(localStorage.getItem('stockOut') === null){
                        localStorage.setItem('stockOut',JSON.stringify(stockOutlist));
                    }

                    current_StockOutList();
                }
            }
        })

        $(document).on('click','.btnStockOutProduct',function(){
            quantity = $("#txtQty"+$(this).data('product-id')).val()

            newqty = $(this).data('product-quantity') - quantity;
    
            client_id = $("#cmbClient").val();
            product_id = $(this).data('product-id');
            
            product_name = $(this).data('product-name');
            product_itemUnit = $(this).attr('data-product-ritemunit');

            price = $(this).data('product-selling-price');
            categoryName = $(this).data('product-category-name');

            total = quantity * price;
            total = total.toFixed(2);

            vat = 0;
            console.log($(this).attr('data-vatype'));
            if($(this).data('vatype') == 'Vatable'){
                vat = total * 0.12;
                console.log(vat);
            }
            vat = vat.toFixed(2);

            if(quantity > $(this).data('product-quantity')){
                notify_user('danger','Quantity Entered is greater than the available Quantity. Available quantity is '+ $(this).data('product-quantity'));
            }else{
                
                stockOut_data = {
                    'product_id':product_id,
                    'quantity':quantity,
                    'price':price,
                    'total':total,
                    'product_name':product_name,
                    'product_itemUnit':product_itemUnit,
                    'categoryName':categoryName,
                    'vatsubtot':vat
                }
               
                stockOutlist = []
                stockOutlist.push(stockOut_data);
                
                if(localStorage.getItem('stockOut') !== null){
                   
                   slist = JSON.parse(localStorage.getItem('stockOut'));
                  
                  
                   if(stockOutChecker(product_id) != null){
                        rowStockList = stockOutChecker(product_id);
                        //get remaining quantity here after the summation
                        quantity = parseInt(quantity) + parseInt(rowStockList.quantity);
                        
                        $.post(home_url+'/product/getProductInfo',{'id':product_id},function(response){
                          
                            if(response != ''){
                                result = JSON.parse(response);
                                // console.log(result.quantity+" "+quantity);

                                qty = result.quantity
                                if(quantity > qty){
                                    notify_user('danger','Quantity('+qty+') Entered is greater than the available Quantity. Available quantity is '+ result.quantity);
                                }else if(quantity <= qty){
                                    total = quantity * price;
                                    total = total.toFixed(2);

                                     vat = 0;
                                    
                                    if(result.vat_type == 'Vatable'){
                                        vat = total * 0.12;
                                        console.log(vat);
                                    }
                                    vat = vat.toFixed(2);
                                    stockOut_data = {
                                        'product_id':product_id,
                                        'quantity':quantity,
                                        'price':price,
                                        'total':total,
                                        'product_name':product_name,
                                        'product_itemUnit':product_itemUnit,
                                        'categoryName':categoryName,
                                        'vatsubtot':vat
                                    }
                                    
                                    remove_stockOutData(product_id);

                                    k = JSON.parse(localStorage.getItem('stockOut'));
                                    k.push(stockOut_data);
                                    localStorage.setItem('stockOut',JSON.stringify(k));
                                }
                            }
                        });
                        

                   }else{
                         slist.push(stockOut_data);
                         localStorage.setItem('stockOut',JSON.stringify(slist));
                   }

                   

                }else if(localStorage.getItem('stockOut') === null){
                    localStorage.setItem('stockOut',JSON.stringify(stockOutlist));
                }

                current_StockOutList();
            }
           
        });

        current_StockOutList();

        function stockOutChecker(productId){
            
            var stockOutList;
            if(localStorage.getItem('stockOut') !== null){
                 stockOutList = JSON.parse(localStorage.getItem('stockOut'));
            }
            var stockoutRowData = null;
            for(i = 0 ; i < stockOutList.length ; i++){
                if(stockOutList[i].product_id == productId){
                    stockoutRowData = stockOutList[i]; 
                }
            }
            return stockoutRowData;

        }

        function remove_stockOutData(productId){
              var stockOutList;
            if(localStorage.getItem('stockOut') !== null){
                 stockOutList = JSON.parse(localStorage.getItem('stockOut'));
            }
            var stockoutRowData = null;
            for(i = 0 ; i < stockOutList.length ; i++){
                if(stockOutList[i].product_id == productId){
                    stockOutList.splice(i,1);
                }
            }
            localStorage.setItem('stockOut',JSON.stringify(stockOutList));
            
        }
        function update_stockOutData(key,value){
             var stockOutList;
            if(localStorage.getItem('stockOut') !== null){
                 stockOutList = JSON.parse(localStorage.getItem('stockOut'));
            }
            var stockoutRowData = null;
            for(i = 0 ; i < stockOutList.length ; i++){
                if(i){

                }
            }
            return stockoutRowData;
        }

        function current_StockOutList(){
            var stockOutList;
            if(localStorage.getItem('stockOut') !== null){
                 stockOutList = JSON.parse(localStorage.getItem('stockOut'));

                $("#stockOutList").html("");
                if(stockOutList.length > 0){
                    htmlData= '';
                    grandTotal = 0.00;
                    vatTotal = 0.00;

                   

                    for(i = 0 ; i < stockOutList.length ; i++){
                        grandTotal += parseFloat(stockOutList[i].total);
                        vatTotal += parseFloat(stockOutList[i].vatsubtot);
                        htmlData +="<tr>"+
                                        "<td><strong>"+stockOutList[i].product_name+"</strong>("+stockOutList[i].product_itemUnit+")<br/>"+stockOutList[i].categoryName+"</td>"+
                                        "<td>"+stockOutList[i].quantity+"</td>"+
                                        "<td>"+stockOutList[i].price+"</td>"+
                                        "<td>"+stockOutList[i].total+"</td>"+
                                        "<td class='hide-in-print'>"+
                                        "    <button data-p-id='"+stockOutList[i].product_id+"' data-r-id='"+i+"'class='bntRemoveStockOutRow btn btn-danger btn-icon waves-effect waves-circle waves-float waves-effect waves-circle waves-float'>"+
                                        "        <i class='zmdi zmdi-close'></i>"+
                                        "    </button>"+
                                        "</td></tr>";
                      
                    }
                    grandTotal = grandTotal.toFixed(2);

                    discount = $("#txtSOdiscout").val();
                    if(typeof discount === 'undefined'){
                        discount = 0.00;
                    }

                    gTotal = grandTotal - discount;
                    gTotal.toFixed(2);

                    $("#stockOutDiscount").html("Php "+discount);
                    $("#stockGrandTotal").html("Php "+gTotal.toFixed(2));
                    $("#stockVatTotal").html("Php "+vatTotal.toFixed(2));
                    $("#stockOutList").html(htmlData);
                }
            }
        }
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
         pvatType = $("input:radio[name=rdbVat]:checked").val()
         data = {
            'code':pcode,
            'name':pname,
            'category':pcategory,
            'item_unit':pitemUnit,
            'unit_price':punitPrice,
            'selling_price':pSellingPrice,
            'quantity':pQuantity,
            'date':pDate,
            'vat_type':pvatType
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