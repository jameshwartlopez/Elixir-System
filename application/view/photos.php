            <!--main body-->
            <section id="content">
                <div class="container">
                    
                    
                    <div class="row">
                        <!-- add Page Content here -->
                       <div class="card">
                        <div class="card-body card-padding">
                            <!--Start Photos-->
                            <div class="lightbox photos">
                                
                                <?php 
                                    foreach ($products as $product) {
                                    ?>
                                    <div data-src="<?php echo 'img/products/'.$product['image_url'];?>>" class="col-md-2 col-sm-4 col-xs-6">
                                         <div class="lightbox-item p-item">
                                             <img src="<?php echo 'img/products/'.$product['image_url'];?>" alt="" />
                                         </div>
                                     </div>
                    
                                    <?php
                                    }
                                ?>
                                 
                            </div>
                           
                            <!--End Phtos-->
                           <div class="clearfix"></div>
                        </div>
                        
                        <br>
                    </div>
                        <!-- end Page Content here -->
                    </div>
                </div>
            </section><!--end main body-->
       