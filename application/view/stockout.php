            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                       <div class="lv-header-alt clearfix m-b-5">
                            
                            <div class="lvh-search" style="display: block;" >
                                <input type="text" id="txtSearchService" placeholder="Search here..." class="lvhs-input">
                            </div>
                            
                        </div>
                       
                      <!--   <pre>
                            <?php print_r($services);?>
                        </pre> -->
                        <div class="card-body card-padding">
                            <!--Start service Entry -->
                            <div class="row product_entry">
                                 <div class="card-header">
                                    <h2>Stock Out</h2>
                                </div>
                                <div class="col-sm-4">                       
                                    
                                         
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="dtp-container fg-line">
                                            <input type="text" id="txtDate" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>" placeholder="Click here...">
                                        </div>
                                    </div>
                                    
                                    
                                    <br>
                                    <div class="col-sm-12 m-b-25" style="padding-left: 20px;">
                                        <select class="selectpicker" data-live-search="true" id="cmbClient">
                                            <option value="">Client Name</option>
                                            <?php 
                                                foreach ($clients as $client) {
                                                    echo '<option value="'.$client['id'].'" >'.$client['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <input type="text" id="txtPrinterModel"  class="form-control" placeholder="Printer Model">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <div class="fg-line">
                                            <textarea class="form-control" id="txtRemarks" rows="5" placeholder="Add your remarks here"></textarea>
                                        </div>
                                    </div>
            
                                        <br>
                                    <div class="input-group" style="padding-left: 20px;">
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="rdbstatus" checked value="Machine operating satisfactorily">
                                                <i class="input-helper"></i>
                                                Mchine operating satisfactorily
                                            </label>
                                        </div>
                                        
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="rdbstatus" value="For in house repair">
                                                <i class="input-helper"></i>
                                                For in house repair
                                            </label>
                                        </div>
                                        <div class="radio m-b-15">
                                            <label>
                                                <input type="radio" name="rdbstatus" value="Work not completed">
                                                <i class="input-helper"></i>
                                                Work not completed
                                            </label>
                                        </div>
                                    </div>
                                    

                                    <div class="btn-demo col-sm-12">
                                        <p class="f-500 c-black m-b-20"> &nbsp; </p>
                                        <button class="btn bgm-lightblue waves-effect" id="btnSaveService"><i class="zmdi zmdi-plus-circle zmdi-hc-fw"></i> Save &nbsp;&nbsp;</button>
                                        <button class="btn bgm-lightblue waves-effect" id="btnUpdateService"><i class="zmdi zmdi-edit"></i> Update</button>
                                        <button class="btn bgm-gray waves-effect" id="btnClearService"> <i class="zmdi zmdi-tag-close"></i> Clear &nbsp;&nbsp;</button>    
                                    </div>

                                </div>
                                
                                <div class="col-sm-8">                       
                                     <div class="table-responsive" tabindex="2" style="overflow: hidden; outline: none;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Client</th>
                                                    <th>Printer Model</th>
                                                    <th>Remarks</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="serviceList">
                                                <?php 
                                                    foreach ($services as $service) {
                                                        $clientName ='';
                                                         foreach ($clients as $client) {
                                                            if($client['id'] == $service['client_id']){
                                                                $clientName = $client['name'];
                                                            }
                                                         }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $service['date']; ?></td>
                                                        <td><?php echo $clientName;?></td>
                                                        <td><?php echo $service['printer_model']; ?></td>
                                                        <td><?php echo $service['remarks']; ?></td>
                                                        <td><?php echo $service['status']; ?></td>
                                                        <td>
                                                            <button class="btn btn-danger waves-effect btnEditService" 
                                                                    data-service-date='<?php echo $service['date'];?>' 
                                                                    data-service-client-id='<?php echo $service['client_id']; ?>' 
                                                                    data-service-printer-model='<?php echo $service['printer_model']; ?>' 
                                                                    data-service-remarks='<?php echo $service['remarks']; ?>' 
                                                                    data-service-status='<?php echo $service['status']; ?>'  
                                                                    data-service-id='<?php echo $service['id']; ?>'><i class="zmdi zmdi-edit"></i> Edit</button></td> 
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
                            <!--End service Entry -->
                           
                            <br>
                        </div>
                        
                        <br>
                    </div>
                        <!-- end Page Content here -->
                    </div>
                </div>
            </section><!--end main body-->
       