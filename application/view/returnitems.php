<section id="content">

    <div class="container invoice">

        <div class="card">
            <div class="card-body card-padding">
                <div class="row m-b-25">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h3 class="report-title">Stockout Items</h3>

                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="clearfix"></div>
                <table class="table i-table m-t-25 m-b-25">
                    <thead class="t-uppercase">
                        <th class="c-gray"><strong>TRANSACTION NO</strong></th>
                        <th class="c-gray"><strong>ITEM DESCRIPTION</strong></th>
                        <th class="c-gray"><strong>PRICE</strong></th>
                        <th class="c-gray"><strong>QUANTITY</strong></th>
                        <th class="c-gray"><strong>TOTAL</strong></th>
                        <th class="c-gray"><strong>DATE</strong></th>
                        <th class="c-gray"><strong>STATUS</strong></th>
                        <th class="c-gray"><strong>USER</strong></th>
                        <th class="c-gray"><strong>&nbsp;</th>
                    </thead>
                    
                    <tbody>
                        <thead id="reportList">
                            <?php
                            
                             foreach ($stockoutList as $stockout) {
                            
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
                                           <td><?php echo $stockout['selling_price'];?></td>
                                           <td><?php echo $stockout['quantity'];?></td>
                                           <td><?php echo $stockout['total']; ?></td>
                                           <td><?php echo $stockout['date'];?></td>
                                           <td><?php echo $stockout['status'];?></td>
                                           <td><?php echo $stockout['Firstname']." ".$stockout['LastName'];?></td>
                                           <td>
                                              <button class="btn btn-danger waves-effect waves-effect btnReturnItems" 
                                                      data-client-id='<?php echo $stockout['c_id'];?>'
                                                      data-transaction-no='<?php echo $stockout['transaction_no'];?>' 
                                                      data-stockout-id='<?php echo $stockout['so_id']; ?>'>Return</button>
                                           </td>
                                        </tr>
                                       <?php
                                    
                                
                            }?>
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
    
   


</section>