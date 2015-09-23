            <!--main body-->
            <section id="content">
                <div class="container">
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                        <div class="lv-header-alt clearfix m-b-5">
                            
                            <div class="lvh-search" style="display: block;" >
                                 <input type="text" id="txtSearchItemUnit" placeholder="Start Item Unit here..." class="lvhs-input">
                            </div>

                        </div>
                        
                        <div class="card-body card-padding">
                            <!--Start Category Entry -->
                            <div class="row product_entry">
                                 <div class="card-header">
                                    <h2>Item Unit</h2>
                                </div>
                                <div class="col-sm-6">                       
                                    
                                    <br>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtItemUnit" class="form-control" placeholder="Unit Name">
                                        </div>
                                    </div>

                                    <div class="btn-demo col-sm-12">
                                        <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                        <button class="btn bgm-lightblue waves-effect" id="btnSaveItemUnit"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save &nbsp;&nbsp;</button>
                                        <button class="btn bgm-lightblue waves-effect" id="btnUpdateItemUnit"><i class="zmdi zmdi-edit"></i> Update &nbsp;&nbsp;</button>
                                        <button class="btn bgm-gray waves-effect" id="btnClearItemUnit"> <i class="zmdi zmdi-tag-close"></i> Clear &nbsp;&nbsp;</button>    
                                    </div>
                                    
                                    <br>
                                </div>
                                
                                <div class="col-sm-6">                       
                                     <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Unit Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemUnitList">
                                                <?php foreach ($itemUnits as $itemUnit) {
                                                   ?>
                                                    <tr>
                                                        <td><?php echo $itemUnit['name']; ?></td>
                                                        <td>
                                                            <button class="btn btn-danger waves-effect btnEditItemUnit" data-itemunit-name='<?php echo $itemUnit['name']; ?>' data-itemunit-id="<?php echo $itemUnit['id']; ?>"><i class="zmdi zmdi-edit"></i> Edit</button></td>
                                                    </tr>
                                                   <?php 
                                                }?>
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--End Categoy Entry -->
                            <br>
                        </div>
                        
                        <br>
                    </div>
                        <!-- end Page Content here -->
                    </div>
                </div>
            </section><!--end main body-->
       