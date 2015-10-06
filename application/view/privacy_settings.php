            <!--main body-->
            <section id="content">
                <div class="container">
                    <div class="row"><!-- add Page Content here -->
                       
                            <div class="card" id="profile-main">
                                <div class="pm-overview c-overflow">
                                    <div class="profile-menu">
                                        <a href="#">
                                            <div class="profile-pic">
                                                <img src="<?php echo $current_user['avatar'];?>" alt="">
                                            </div>

                                            <div class="profile-info">
                                                <?php echo $current_user['Firstname'].' '.$current_user['LastName'];?>
                                                <i class="zmdi zmdi-arrow-drop-down"></i>
                                            </div>
                                        </a>

                                        <ul class="main-menu profile-avatar" style="background-color: #edecec;">
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/1.jpg" alt=""> Simply Beautiful
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/2.jpg" alt=""> Okay Man
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/3.jpg" alt=""> Shy Girl
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/4.jpg" alt=""> Good Boy
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/5.jpg" alt=""> Inlove Woman
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/7.jpg" alt=""> Brown Hair
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/8.jpg" alt=""> Blue Polo
                                            </li>
                                            <li>
                                                <img src="<?php echo home_url();?>/public/img/profile-pics/9.jpg" alt=""> Pink Shirt
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class="pmo-block pmo-contact hidden-xs">
                                        <h2>Contact</h2>
                                        
                                        <ul>
                                            <li><i class="zmdi zmdi-phone"></i><?php echo $current_user['Contact'];?></li>
                                            <li><i class="zmdi zmdi-email"></i><?php echo $current_user['Email'];?></li>
                                        </ul>
                                    </div>
                                    
                                
                                </div>
                                
                                <div class="pm-body clearfix">
                                    <ul class="tab-nav tn-justified">
                                        <li class="waves-effect"><a href="<?php echo home_url();?>/user/profile">Profile</a></li>
                                        <li class="active waves-effect"><a href="<?php echo home_url();?>/user/settings">Settings</a></li>
                                    </ul>
                                    
                                    <div class="pmb-block">
                                        <div class="pmbb-header">
                                            <h2><i class="zmdi zmdi-account m-r-5"></i> Login Credentials</h2>
                                            
                                            <ul class="actions">
                                                <li class="dropdown">
                                                    <a href="#" data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a data-pmb-action="edit" href="#">Edit</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pmbb-body p-l-30">
                                            <div class="pmbb-view">
                                                <dl class="dl-horizontal">
                                                    <dt>Username</dt>
                                                    <dd><?php echo $current_user['username'];?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Password</dt>
                                                    <dd>********</dd>
                                                </dl>
                                            </div>
                                            
                                            <div class="pmbb-edit">
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Username</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" id="txtCUsername" value="<?php echo $current_user['username'];?>" class="form-control" placeholder="Enter your first name here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Old Password</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="password" id="txtCOldpassword" class="form-control" placeholder="Enter your Old password here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">New Password</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="password" id="txtCNewpassword" class="form-control" placeholder="Enter your New password here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Confirm Password</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="password" id="txtCConfirmpassword" class="form-control" placeholder="Enter your New password here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                
                                                <div class="m-t-30">
                                                    <button class="btn btn-primary btn-sm" id="btnSaveLoginCredentials">Save</button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                    <div class="errors csm"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div><!-- end Page Content here -->
                </div>
            </section><!--end main body-->
       