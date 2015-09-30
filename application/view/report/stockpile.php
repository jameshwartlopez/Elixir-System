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
                                    <button class="btn bgm-lightblue waves-effect waves-effect btnViewStockin"> VIEW</button>
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
            </div>
            
            <div class="card-body card-padding">
                <div class="row m-b-25">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h3 class="report-title">Service Report</h3>

                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="clearfix"></div>
                
                <table class="table i-table m-t-25 m-b-25">
                    <thead class="t-uppercase">
                        <th class="c-gray"><strong>ITEM DESCRIPTION</strong></th>
                        <th class="c-gray"><strong>QUANTITY</strong></th>
                        <th class="c-gray"><strong>DATE</strong></th>
                        <th class="c-gray"><strong>USER</strong></th>
                    </thead>
                    
                    <tbody>
                        <thead id="reportList">
                            <?php
                                foreach ($stockin_data as $stockin) {
                                   ?>
                                    <tr>
                                        <td width="50%">
                                            <p class="text-muted c-gray"><?php echo $stockin['name'];?></p>
                                            <h5 class="t-uppercase f-400"><?php echo $stockin['name'].'( '.$stockin['item_unit'].' )'; ?> </h5>
                                        </td>
                                        <td><?php echo $stockin['quantity']; ?></td>
                                        <td ><?php echo $stockin['stockinDate']; ?></td>
                                        <td><?php echo $stockin['Firstname'].' '.$stockin['LastName']; ?></td>
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