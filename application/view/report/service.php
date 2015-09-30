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
                                    <button class="btn bgm-lightblue waves-effect waves-effect btnViewService"> VIEW</button>
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
                        <th class="c-gray"><strong>CLIENT</strong></th>
                        <th class="c-gray"><strong>PRINTER MODEL</strong></th>
                        <th class="c-gray"><strong>REMARKS</strong></th>
                        <th class="c-gray"><strong>STATUS</strong></th>
                        <th class="c-gray"><strong>USER</strong></th>
                        <th class="c-gray"><strong>DATE</strong></th>
                    </thead>
                    
                    <tbody>
                        <thead id="reportList">
                            <?php
                                foreach ($services as $service) {
                                   ?>
                                    <tr>
                                        <td width="30%">
                                            <h5 class="t-uppercase f-400"><?php echo $service['name']; ?> </h5>
                                            <p class="text-muted c-gray">Address: <?php echo $service['address'];?></p>
                                            <p class="text-muted c-gray">Tel#: <?php echo $service['telphone_number'];?></p>
                                        </td>
                                        <td><?php echo $service['printer_model']; ?></td>
                                        <td><?php echo $service['remarks']; ?></td>
                                        <td><?php echo $service['status']; ?></td>
                                        <td><?php echo $service['Firstname'].' '.$service['LastName']; ?></td>
                                        <td><?php echo $service['date']; ?></td>
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