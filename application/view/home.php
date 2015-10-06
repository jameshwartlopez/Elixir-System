            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">Search Product</h2>
                            
                            <div class="lvh-search" style="display: none;">
                                <input type="text" id="txtSearchProduct" placeholder="Start typing..." class="lvhs-input">
                                
                                <i class="lvh-search-close">×</i>
                            </div>

                            <ul class="lv-actions actions">
                                <li>
                                    <a href="contacts.html" class="lvh-search-trigger">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown" =""="" aria-expanded="false" aria-haspopup="true">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#" id="gotoProductEntry">Product Entry</a>
                                        </li>
                                        <li>
                                            <a href="#" id="gotoProductList">Product List</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                       
                        
                        <div class="card-body card-padding">
                            <!--Start Product Entry -->
                            <div class="row product_entry">
                                 <div class="card-header">
                                    <h2>Product Entry</h2>
                                 </div>
                                <div class="col-sm-6">                       
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="dtp-container fg-line">
                                            <input type="text" id="txtDate" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>" placeholder="Click here...">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtPCode" class="form-control" placeholder="Product Code">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtPName" class="form-control" placeholder="Product Name ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group"> 
                                        <span  class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <select class="selectpicker" id="cmbPcategory">
                                                <option value="">Category</option>
                                                <?php 
                                                    foreach ($category as $value) {
                                                       ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option><?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                            
                                    </div>
                                   
                                    <br/>
                                    
                                    

                                </div>
                                
                                <div class="col-sm-6">                       
                                     
                                   <div class="input-group"> 
                                        <span  class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <select class="selectpicker" id="cmbPItemUnit">
                                                <option value="">Item Unit</option>
                                                <?php 
                                                    foreach ($itemUnit as $value) {
                                                       ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option><?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                            
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group <?php echo ($usertype != 0)?'csm':'';?>" style="<?php echo ($usertype != 0)?'display:none':'';?>">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" style="<?php echo ($usertype != 0)?'display:none':'';?>" id="txtPUnitPrice" class="form-control money" placeholder="Unit Price ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="input-group <?php echo ($usertype != 0)?'csm':'';?>" style="<?php echo ($usertype != 0)?'display:none':'';?>">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" style="<?php echo ($usertype != 0)?'display:none':'';?>"  id="txtPSellingPrice" class="form-control money" placeholder="Selling Price ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group <?php echo ($usertype != 0)?'csm':'';?>" style="<?php echo ($usertype != 0)?'display:none':'';?>">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">    
                                            <input type="text" style="<?php echo ($usertype != 0)?'display:none':'';?>" id="txtPQuantity" class="form-control number" placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <br/>
                                        <div class="col-sm-12 hide-in-print">
                                            <div class="col-sm-6 " style="padding-left: 20px;">
                                                <div class="radio m-b-15">
                                                    <label>
                                                        <input type="radio" name="rdbVat" checked value="Vatable">
                                                        <i class="input-helper"></i>
                                                        Vatable
                                                    </label>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6 " style="padding-left: 20px;">
                                                <div class="radio m-b-15">
                                                    <label>
                                                        <input type="radio" name="rdbVat"  value="None Vatable">
                                                        <i class="input-helper"></i>
                                                        None Vatable
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                    <button class="btn bgm-lightblue waves-effect" id="btnSaveProduct"><i class="zmdi zmdi-plus-circle"></i> Save</button>
                                    <button class="btn bgm-lightblue waves-effect" id="btnUpdateProduct"><i class="zmdi zmdi-edit"></i> Update</button>
                                    <button class="btn bgm-gray waves-effect" id="btnClearProduct"> <i class="zmdi zmdi-tag-close"></i> Clear</button>    
                                </div>
                            </div>
                            <!--End Product Entry -->
                            <!-- Product List -->
                            <div class="row product_list">
                                 <div class="card-header">
                                    <h2>Product List</h2>
                                </div>

                                <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Item Unit</th>
                                                <th>Unit Price</th>
                                                <th>Selling Price</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productList">
                                            <?php 
                                            foreach ($products as $product) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $product['code']; ?></td>
                                                    <td><?php echo $product['name']; ?></td>
                                                    <td><?php  
                                                            foreach ($category as $key) {
                                                                if($key['id'] == $product['category'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php 
                                                            foreach ($itemUnit as $key) {
                                                                if($key['id'] == $product['item_unit'])
                                                                    echo $key['name'];
                                                            }
                                                    ?></td>
                                                    <td><?php echo $product['unit_price']; ?></td>
                                                    <td><?php echo $product['selling_price']; ?></td>
                                                    <td><?php echo $product['quantity']; ?></td>
                                                    <td><?php echo $product['date']; ?></td>
                                                    <td><?php echo $product['vat_type']; ?></td>
                                                    <td>
                                                        <button class='btn btn-danger waves-effect btnEditProduct' 
                                                                data-product-code='<?php echo $product['code']; ?>' 
                                                                data-product-name='<?php echo $product['name']; ?>' 
                                                                data-product-category='<?php echo $product['category']; ?>' 
                                                                data-product-item-unit='<?php echo $product['item_unit']; ?>'
                                                                data-product-unit-price='<?php echo $product['unit_price']; ?>'
                                                                data-product-selling-price='<?php echo $product['selling_price']; ?>'
                                                                data-product-quantity='<?php echo $product['quantity']; ?>' 
                                                                data-product-date='<?php echo $product['date']; ?>' 
                                                                data-product-id='<?php echo $product['id']; ?>'  >
                                                            <i class="zmdi zmdi-edit"></i> Edit
                                                        </button>
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
       