            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">19,453 Records</h2>
                            
                            <div class="lvh-search" style="display: none;">
                                <input type="text" placeholder="Start typing..." class="lvhs-input">
                                
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
                                            <input type="text" class="form-control date-picker" placeholder="Click here...">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="Product Code">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="Product Name ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group"> 
                                        <span  class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <select class="selectpicker">
                                                <option>Category</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                            
                                    </div>
                                   
                                    <br/>
                                    
                                    <div class="input-group"> 
                                        <span  class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <select class="selectpicker">
                                                    <option>Supplier Name</option>
                                                    <option>Ketchup</option>
                                                    <option>Relish</option>
                                            </select>
                                        </div>
                                            
                                    </div>

                                </div>
                                
                                <div class="col-sm-6">                       
                                     <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="Product Description ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="Base Unit ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="Unit Price ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" placeholder="Selling Price ">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">    
                                            <input type="text" class="form-control" placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-demo col-sm-6">
                                    <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                    <button class="btn bgm-lightblue waves-effect"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save &nbsp;&nbsp;</button>
                                    <button class="btn bgm-gray waves-effect"> <i class="zmdi zmdi-tag-close"></i> Clear &nbsp;&nbsp;</button>    
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
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Base Unit</th>
                                                <th>Unit Price</th>
                                                <th>Selling Price</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>6</td>
                                                <td>Benjamin</td>
                                                <td>Parnell</td>
                                                <td>@wayne234</td>
                                                <td>Pokie</td>
                                                <td>6</td>
                                                <td>Benjamin</td>
                                                <td>Parnell</td>
                                                <td>@wayne234</td>
                                                <td><button class="btn btn-danger waves-effect btnEditProduct" data-product-id="1"><i class="zmdi zmdi-edit"></i> Edit</button></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Benjamin</td>
                                                <td>Parnell</td>
                                                <td>@wayne234</td>
                                                <td>Pokie</td>
                                                <td>6</td>
                                                <td>Benjamin</td>
                                                <td>Parnell</td>
                                                <td>@wayne234</td>
                                                <td><button class="btn btn-danger waves-effect btnEditProduct" data-product-id="1"><i class="zmdi zmdi-edit"></i> Edit</button></td>
                                            </tr>
                                           
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
       