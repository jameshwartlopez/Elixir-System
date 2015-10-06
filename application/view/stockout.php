            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="hide-in-print lv-header-alt clearfix m-b-5">
                            <h2>Stock Out</h2>
                            
                            
                        </div>
                       
                        <div class="card-body card-padding">
                            <!--Start service Entry -->
                            <div class="row product_entry">
                                 
                                <div class="col-sm-6">                       
                                    
                                         
                                    <div class="input-group hide-in-print">
                                        <span class="input-group-addon"></span>
                                        <div class="dtp-container fg-line">
                                            <input type="text" id="txtDate" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>" placeholder="Click here...">
                                        </div>
                                    </div>
                                    
                                    
                                    <br>
                                    <div class="hide-in-print col-sm-12 m-b-25" style="padding-left: 20px;">
                                        <select class="selectpicker" data-live-search="true" id="cmbClient">
                                            <option value="">Client Name</option>
                                            <?php 
                                                foreach ($clients as $client) {
                                                    echo '<option value="'.$client['id'].'" >'.$client['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="input-group hide-in-print">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtStockOutSearchProduct"  class="form-control" placeholder="Search Product Here">
                                        </div>
                                    </div>
                                    <div class="input-group hide-in-print">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                        <br/>
                                           <div class=" fg-line table-responsive" tabindex="3" style="overflow: hidden; outline: none;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th >Product Description</th>
                                                            <th >Price</th>
                                                            <th >Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="pList">
                                                        <?php  foreach ($products as $product) {?>
                                                            <tr>
                                                                <td><?php 
                                                                    $items_unit ='';
                                                                    foreach ($itemUnit as $key) {
                                                                            if($key['id'] == $product['item_unit'])
                                                                                $items_unit = $key['name'];
                                                                    }
                                                                        $category_name = '';
                                                                    echo '<strong>'.$product['name'].'</strong> ('.$items_unit.')<br/>'; 
                                                                        foreach ($category as $key) {
                                                                            if($key['id'] == $product['category']){
                                                                                $category_name = $key['name'];
                                                                                echo $key['name'];
                                                                            }
                                                                        }
                                                                ?></td>
                                                                <td><?php echo $product['selling_price']; ?></td>
                                                                <td>
                                                                    <div class="btn-demo">
                                                                        <input type="text" id="txtQty<?php echo $product['id']; ?>" class="txtQty_so number" style="width: 56px;margin-right: 12px" value="1"
                                                                                data-vatype= '<?php echo $product['vat_type'];?>'
                                                                                data-product-code='<?php echo $product['code']; ?>' 
                                                                                data-product-name='<?php echo $product['name']; ?>' 
                                                                                data-product-category='<?php echo $product['category']; ?>' 
                                                                                data-product-category-name = '<?php echo $category_name;?>'
                                                                                data-product-item-unit='<?php echo $product['item_unit']; ?>'
                                                                                data-product-rItemUnit ='<?php echo $items_unit;?>'
                                                                                data-product-unit-price='<?php echo $product['unit_price']; ?>'
                                                                                data-product-selling-price='<?php echo $product['selling_price']; ?>'
                                                                                data-product-quantity='<?php echo $product['quantity']; ?>' 
                                                                                data-product-date='<?php echo $product['date']; ?>' 
                                                                                data-product-id='<?php echo $product['id']; ?>'>
                                                                        <button class="btnStockOutProduct btn btn-primary btn-icon waves-effect waves-circle waves-float"
                                                                                data-vatype= '<?php echo $product['vat_type'];?>'
                                                                                data-product-code='<?php echo $product['code']; ?>' 
                                                                                data-product-name='<?php echo $product['name']; ?>' 
                                                                                data-product-category='<?php echo $product['category']; ?>' 
                                                                                data-product-category-name = '<?php echo $category_name;?>'
                                                                                data-product-item-unit='<?php echo $product['item_unit']; ?>'
                                                                                data-product-rItemUnit ='<?php echo $items_unit;?>'
                                                                                data-product-unit-price='<?php echo $product['unit_price']; ?>'
                                                                                data-product-selling-price='<?php echo $product['selling_price']; ?>'
                                                                                data-product-quantity='<?php echo $product['quantity']; ?>' 
                                                                                data-product-date='<?php echo $product['date']; ?>' 
                                                                                data-product-id='<?php echo $product['id']; ?>'>
                                                                            <i class="zmdi zmdi-arrow-forward"></i>
                                                                        </button> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <br>
                                
                                </div>
                                
                                <div class="col-sm-6"> 
                                    <div class="stock-out-card-header text-center">
                                        <img  src="<?php echo home_url()?>/public/img/bgwhite.png" alt="">
                                        <div class="col-sm-12">
                                            
                                            <h2>Stock Out List</h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <div class="input-group hide-in-print">
                                                <span class="input-group-addon"></span>
                                                <div class="fg-line">
                                                   <?php 
                                                        if($usertype== 0){
                                                            ?><input type="text" id="txtSOdiscout"  class="money form-control" placeholder="Discount"><?php
                                                        }
                                                   ?> 
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group hide-in-print">
                                                <br/>
                                                <span class="input-group-addon"></span>
                                                <div class="fg-line">
                                                <h2><?php echo "Transaction No. ".$newtransaction; ?> </h2>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 clientDateContainer">
                                            <table class="">
                                                <tr>
                                                    <td><h4>Date:</h4></td>
                                                    <td><h4 id="lblDate">date</h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>Transaction No:</h4></td>
                                                    <td><h4 ><?php echo $newtransaction;?></h4></td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        
                                         
                                    </div> 
                                    <div class="col-sm-12">
                                        <br/>
                                        <div class="col-sm-12">
                                            <div class="stockoutList table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Description</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th colspan="2">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="stockOutList">
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <button class=" hide-in-print btn btn-danger btn-icon waves-effect waves-circle waves-float">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr style="<?php echo ($usertype != 0)?'display:none':'';?>">
                                                            <td colspan="3">Discount</td>
                                                            <td colspan="3" id="stockOutDiscount"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Grand Total</td>
                                                            <td colspan="3" id="stockGrandTotal"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Vat Total</td>
                                                            <td colspan="3" id="stockVatTotal"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <br/>
                                            <div class="input-group hide-in-print"> 
                                                <span  class="input-group-addon"></span>
                                                <div class="fg-line">
                                                    <select class="selectpicker" id="cmbTerms">
                                                        <option value="">Terms In Days</option>
                                                        <option value="30">30</option>
                                                        <option value="60">60</option>
                                                        <option value="90">90</option>
                                                    </select>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                        <div class="col-sm-12 clientDateContainer">
                                            <table class="">
                                                <tr>
                                                    <td><h4>Terms In Days:</h4></td>
                                                    <td><h4 id="lblTerm">date</h4></td>
                                                </tr>
                                                <tr>
                                                    <td><h4>Client: </h4></td>
                                                    <td><h4 id="lblClient">adf</h4></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 hide-in-print">
                                             <div class="btn-demo col-sm-12">
                                                <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                                <button class="btn bgm-lightblue waves-effect" id="btnSaveStockOutList"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save StockOut &nbsp;&nbsp;</button>
                                                <button class="btn bgm-gray waves-effect" id="btnClearService"> <i class="zmdi zmdi-tag-close"></i> Clear &nbsp;&nbsp;</button>    
                                            </div>
                                        </div>
                                        
                                    </div>                     
                                     
                                </div>
                                
                                
                            </div>
                            <!--End service Entry -->
                           
                            <br>
                        </div>
                        
                        <br>
                    </div>
                        <!-- end Page Content here -->
                    </div>
                </div>
            </section><!--end main body-->
       