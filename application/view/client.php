            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            
                            <div class="lvh-search" style="display: block;" >
                                <input type="text" placeholder="Search Client here..." class="lvhs-input">
                            </div>
                            
                        </div>
                       
                        
                        <div class="card-body card-padding">
                            <!--Start Product Entry -->
                            <div class="row product_entry">
                                 <div class="card-header">
                                    <h2>Clients Profile</h2>
                                </div>
                                <div class="col-sm-4">                       
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtClientName" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtClientAddress"  class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    
                                    <br>


                                     <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtClientTelNo"  class="form-control" placeholder="Tel. Number">
                                        </div>
                                    </div>
                                    
                                    <br>
                                     <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtClientFaxNo"  class="form-control" placeholder="Fax Number">
                                        </div>
                                    </div>
                                    
                                    <br>

                                     <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtClientEmail"  class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    
                                    <br>
                                     <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtClientContactPerson" class="form-control" placeholder="Contact Person">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="btn-demo col-sm-12">
                                        <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                        <button class="btn bgm-lightblue waves-effect"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save &nbsp;&nbsp;</button>
                                        <button class="btn bgm-gray waves-effect"> <i class="zmdi zmdi-tag-close"></i> Clear &nbsp;&nbsp;</button>    
                                    </div>

                                </div>
                                
                                <div class="col-sm-8">                       
                                     <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Tel. No</th>
                                                    <th>Fax</th>
                                                    <th>Email</th>
                                                    <th>Contact Person</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="clientList">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Tel. No</th>
                                                    <th>Fax</th>
                                                    <th>Email</th>
                                                    <th>Contact Person</th>
                                                    <th>
                                                        <button class="btn btn-danger waves-effect btnEditClient" 
                                                                data-client-name='' 
                                                                data-client-address='' 
                                                                data-client-telno='' 
                                                                data-client-faxno='' 
                                                                data-client-email='' 
                                                                data-client-contactperson=''  
                                                                data-client-id=""><i class="zmdi zmdi-edit"></i> Edit</button></td> 
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
       