            <!--main body-->
            <section id="content">
                <div class="container">
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs">Search Categories</h2>
                            
                            <div class="lvh-search" style="display: none;">
                                <input type="text" id="txtCategorySearch" placeholder="Start typing..." class="lvhs-input">
                                
                                <i class="lvh-search-close">×</i>
                            </div>

                            <ul class="lv-actions actions">
                                <li>
                                    <a href="contacts.html" class="lvh-search-trigger">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                       
                        
                        <div class="card-body card-padding">
                            <!--Start Category Entry -->
                            <div class="row product_entry">
                                 <div class="card-header">
                                    <h2>Category Management</h2>
                                </div>
                                <div class="col-sm-6">                       
                                    
                                    <br>
            
                                        <div class="input-group">
                                            <span class="input-group-addon"></span>
                                            <div class="fg-line">
                                                <input type="text" id="txtCategoryName" class="form-control" placeholder="Category Name">
                                            </div>
                                        </div>

                                        <div class="btn-demo col-sm-12">
                                            <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                            <button class="btn bgm-lightblue waves-effect" id="btnSaveCategory"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save &nbsp;&nbsp;</button>
                                            <button class="btn bgm-lightblue waves-effect" id="btnUpdateCategory"><i class="zmdi zmdi-edit"></i> Update &nbsp;&nbsp;</button>
                                            <button class="btn bgm-gray waves-effect" id="btnClearCategory"> <i class="zmdi zmdi-tag-close"></i> Cancel &nbsp;&nbsp;</button>    
                                        </div>   
                                    <br>
                                </div>
                                
                                <div class="col-sm-6">                       
                                     <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="categoryList">
                                            <?php
                                                foreach ($categories as  $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value['name'];?></td>
                                                        <td>
                                                            <button class="btn btn-danger waves-effect btnEditCategory" data-category-name='<?php echo $value['name'];?>' data-category-id="<?php echo $value['id'];?>"><i class="zmdi zmdi-edit"></i> Edit</button>
                                                         </td>
                                                    </tr>
                                                    <?php 
                                                }
                                            ?>
                                               
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
       