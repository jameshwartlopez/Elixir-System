<section id="content">

    <div class="container invoice">

        <div class="">
            <div class=" card hide-in-print">
                 <div  class="card-header  text-center hide-in-print">
                    <div class="">
                                    
                        <div class="lvh-search " style="display: block;" >
                             <input type="text"  placeholder="Search here..." class="txtSearchReport lvhs-input">
                        </div>
                       <br/>
                    </div> 
                 </div>
                 <div class="card-body card-padding">
                    <div class="row report-view-container">
                        <div  class="col-sm-3">     
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Date From </strong></span>
                                <div class="dtp-container fg-line">
                                    <input type="text" id="txtDateFrom" class="form-control date-picker" value="2015-09-30" placeholder="Click here...">
                                </div>
                            </div>
                        </div>
                        <div  class="col-sm-3">     
                            <div class="input-group">
                                <span class="input-group-addon"><strong>Date To</strong> </span>
                                <div class="dtp-container fg-line">
                                    <input type="text" id="txtDateTo" class="form-control date-picker" value="2015-09-30" placeholder="Click here...">
                                </div>
                            </div>
                        </div>
                        <div  class=""> 
                            <div class="input-group">
                                <div class="dtp-container fg-line">
                                    <button class="btn bgm-lightblue waves-effect waves-effect btnViewStockOut"> VIEW</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                 </div> 
            </div>
           
        </div>
        <div class="card">
            <div class="card-header  text-center">
                <img  src="<?php echo home_url()?>/public/img/bgwhite.png" alt="">
                <h6 class="csm_address" style="margin-top: -22px;margin-bottom: 15px;">Door A NPBC M.C. Briones St.<br/> Highway Maguikay, Mandaue City</h6>
            </div>
            
            <div class="card-body card-padding">
                <div class="row m-b-25">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h3 class="report-title">Stockout Report</h3>

                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="clearfix"></div>
                <table class="table i-table m-t-25 m-b-25">
                    <thead class="t-uppercase">
                        <th class="c-gray"><strong>TRANSACTION NO</strong></th>
                        <th class="c-gray"><strong>ITEM DESCRIPTION</strong></th>
                        <th class="c-gray"><strong>CLIENT</strong></th>
                        <th class="c-gray"><strong>PRICE</strong></th>
                        <th class="c-gray"><strong>QUANTITY</strong></th>
                        <th class="c-gray"><strong>DISCOUNT</strong></th>
                        <th class="c-gray"><strong>TOTAL</strong></th>
                        <th class="c-gray"><strong>DATE</strong></th>
                        <th class="c-gray"><strong>USER</strong></th>
                        <th class="c-gray"><strong>&nbsp;</th>
                    </thead>
                    
                    <tbody>
                        <thead id="reportList">
                            <?php
                                foreach ($transaction_data as $transaction) {
                                    $status_t = '';
                                    foreach ($stockoutList as $stockout) {
                                       
                                        
                                        if($stockout['transaction_no'] == $transaction['No']){
                                             $status_t = $stockout['status'];
                                             //clients
                                                $items_unit ='';
                                                foreach ($itemUnit as $key) {
                                                        if($key['id'] == $stockout['item_unit'])
                                                            $items_unit = $key['name'];
                                                }
                                                
                                               ?>
                                                <tr>

                                                   <td><?php echo $stockout['transaction_no']; ?></td>
                                                   <td><?php 
                                                        echo '<strong>'.$stockout['name'].'</strong> ('.$items_unit.')<br/>'; 
                                                        foreach ($category as $key) {
                                                            if($key['id'] == $stockout['category']){
                                                                echo $key['name'];
                                                            }
                                                        }
                                                   ?></td>
                                                   <td>
                                                       <?php 
                                                        foreach ($clients as $client) {
                                                            if($stockout['c_id']== $client['id']){
                                                                echo $client['name'];
                                                                break;
                                                            }
                                                        }
                                                       ?>
                                                   </td>
                                                   <td><?php echo $stockout['selling_price'];?></td>
                                                   <td><?php echo $stockout['quantity'];?></td>
                                                   <td><?php echo $stockout['discount']; ?></td>
                                                   <td><?php echo $stockout['total']; ?></td>
                                                   <td><?php echo $stockout['date'];?></td>
                                                   <td><?php echo $stockout['Firstname']." ".$stockout['LastName'];?></td>
                                                   <td>
                                                      
                                                   </td>
                                                </tr>
                                               <?php
                                            
                                        }
                                    }?>
                                    <tr>
                                        <td colspan="8">
                                            <?php 
                                                if($status_t == 'unpaid'){
                                                    ?>
                                                        <button class="btn btn-danger waves-effect waves-effect btnStockOutStatus" data-client-id='<?php echo $transaction['client_id'];?>' data-transaction-no="<?php echo $transaction['No'];?>" ><?php echo ucfirst($status_t);?></button>
                                                    <?php 
                                                }else if($status_t != 'unpaid' || $status_t != 'hold'){
                                                    echo '<strong style="color:red;">'.ucfirst($status_t).'</strong>';
                                                }else{
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php     
                                }
                            ?>
                        </thead> 
                    </tbody>
                </table>
                
            </div>
            
            <footer class="m-t-15 p-20">
                <ul class="list-inline text-center list-unstyled">
                    <li class="m-l-5 m-r-5"><small>Email: elixir_support@elixirphil.com  </small></li>
                    <li class="m-l-5 m-r-5"><small>Tel1: +632 442 6687 </small></li>
                    <li class="m-l-5 m-r-5"><small>Tel2: +632 442 6661</small></li>
                </ul>
            </footer>
        </div>
        
    </div>
    
    <button class="btn btn-float bgm-red m-btn" data-action="print"><i class="zmdi zmdi-print"></i></button>


</section>