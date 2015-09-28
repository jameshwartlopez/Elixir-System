            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">Search Product</h2>
                            
                            <div class="lvh-search" style="display: block;">
                                <input type="text" id="txtSearchProduct" placeholder="Start typing..." class="lvhs-input">
                                
                                <i class="lvh-search-close">×</i>
                            </div>

                        </div>
                       
                        
                        <div class="card-body card-padding">
                           
                            <!-- Product List -->
                            <div class="row ">
                                 <div class="card-header" style="padding-top: 0px;padding-bottom: 30px;">
                                    <div class="col-sm-2" style="margin-right: -59px;margin-top: 10px;">       
                                        <h2>Stock In Date</h2>
                                    </div>
                                    <div class="col-sm-3" style="padding-left: -1px;">       
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="dtp-container fg-line">
                                                <input type="text" id="txtDate" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>" placeholder="Click here...">
                                            </div>
                                        </div>
                                    </div>
                                    <span>&nbsp;</span>
                                    
                                </div>

                                <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Product Information</th>
                                                <th>Selling Price</th>
                                                <th>Action</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productList">
                                            <?php 
                                            foreach ($products as $product) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $product['code']; ?></td>
                                                    <td><?php 
                                                        $items_unit ='';
                                                        foreach ($itemUnit as $key) {
                                                                if($key['id'] == $product['item_unit'])
                                                                    $items_unit = $key['name'];
                                                        }

                                                        echo '<strong>'.$product['name'].'</strong> ('.$items_unit.')<br/>'; 
                                                            foreach ($category as $key) {
                                                                if($key['id'] == $product['category'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php echo $product['selling_price']; ?></td>
                                                    <td>
                                                        <button class='btn btn-info waves-effect btnAddQty' 
                                                                data-product-code='<?php echo $product['code']; ?>' 
                                                                data-product-name='<?php echo $product['name']; ?>' 
                                                                data-product-category='<?php echo $product['category']; ?>' 
                                                                data-product-item-unit='<?php echo $product['item_unit']; ?>'
                                                                data-product-unit-price='<?php echo $product['unit_price']; ?>'
                                                                data-product-selling-price='<?php echo $product['selling_price']; ?>'
                                                                data-product-quantity='<?php echo $product['quantity']; ?>' 
                                                                data-product-date='<?php echo $product['date']; ?>' 
                                                                data-product-id='<?php echo $product['id']; ?>'  >
                                                            <i class="zmdi zmdi-plus"></i> Add
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="txtQty<?php echo $product['id']; ?>" class="number" value="1" />
                                                    </td>
                                                    
                                                </tr>
                                                <?php
                                            } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Product List -->
                            <br>
                        </div>
                        
                        <br>
                    </div>
                        <!-- end Page Content here -->
                    </div>
                </div>
            </section><!--end main body-->
       