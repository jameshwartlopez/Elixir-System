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
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/1.jpg">
                                                    <img  src="<?php echo home_url();?>/public/img/profile-pics/1.jpg" alt=""> Simply Beautiful
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/2.jpg">
                                                    <img class="" src="<?php echo home_url();?>/public/img/profile-pics/2.jpg" alt=""> Okay Man</a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/3.jpg">
                                                    <img class="" src="<?php echo home_url();?>/public/img/profile-pics/3.jpg" alt=""> Shy Girl</a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/4.jpg">
                                                    <img class="" src="<?php echo home_url();?>/public/img/profile-pics/4.jpg" alt=""> Good Boy</a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/5.jpg">
                                                    <img class="" src="<?php echo home_url();?>/public/img/profile-pics/5.jpg" alt=""> Inlove Woman</a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/7.jpg">
                                                <img class="" src="<?php echo home_url();?>/public/img/profile-pics/7.jpg" alt=""> Brown Hair</a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/8.jpg">
                                                    <img class="" src="<?php echo home_url();?>/public/img/profile-pics/8.jpg" alt=""> Blue Polo</a>
                                            </li>
                                            <li>
                                                <a href="#" class="user_avatar" data-user-avatar="<?php echo home_url();?>/public/img/profile-pics/9.jpg">
                                                    <img src="<?php echo home_url();?>/public/img/profile-pics/9.jpg" alt=""> Pink Shirt</a>
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
                                        <li class="active waves-effect"><a href="<?php echo home_url();?>/user/profile">Profile</a></li>
                                        <li class="waves-effect"><a href="<?php echo home_url();?>/user/settings">Settings</a></li>
                                    </ul>
                                    
                                    <div class="pmb-block">
                                        <div class="pmbb-header">
                                            <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                                            
                                            <ul class="actions">
                                                <li class="dropdown">
                                                    <a href="profile-about.html" data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a data-pmb-action="edit" href="profile-about.html">Edit</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pmbb-body p-l-30">
                                            <div class="pmbb-view">
                                                <dl class="dl-horizontal">
                                                    <dt>Full Name</dt>
                                                    <dd><?php echo $current_user['Firstname'].' '.$current_user['LastName'];?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Gender</dt>
                                                    <dd><?php echo $current_user['gender'];?></dd>
                                                </dl>
                                            </div>
                                            
                                            <div class="pmbb-edit">
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">First Name</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" id="txtCFname" value="<?php echo $current_user['Firstname'];?>" class="form-control" placeholder="Enter your first name here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Last Name</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" id="txtCLname" value="<?php echo $current_user['LastName'];?>" class="form-control" placeholder="Enter your last name here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Gender</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <select class="form-control" id="cmbCgender">
                                                                <option value="">Gender</option>
                                                                <option value="Male" <?php echo ($current_user['gender']=='Male')?'selected':'';?>>Male</option>
                                                                <option value="Female" <?php echo ($current_user['gender']=='Male')?'':'selected';?>>Female</option>
                                                            </select>
                                                        </div>
                                                    </dd>
                                                </dl>
                                                
                                                <div class="m-t-30">
                                                    <button class="btn btn-primary btn-sm" id="btnSaveBasicInformation">Save</button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                
                                    <div class="pmb-block">
                                        <div class="pmbb-header">
                                            <h2><i class="zmdi zmdi-phone m-r-5"></i> Contact Information</h2>
                                            
                                            <ul class="actions">
                                                <li class="dropdown">
                                                    <a data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a data-pmb-action="edit" href="profile-about.html">Edit</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pmbb-body p-l-30">
                                            <div class="pmbb-view">
                                                <dl class="dl-horizontal">
                                                    <dt>Contact Number</dt>
                                                    <dd><?php echo $current_user['Contact'];?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Email Address</dt>
                                                    <dd><?php echo $current_user['Email'];?></dd>
                                                </dl>
                                            </div>
                                            
                                            <div class="pmbb-edit">
                                                
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Contact Number</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" id="txtCContact" value="<?php echo $current_user['Contact'];?>" class="form-control" placeholder="eg. 00971 12345678 9">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Email Address</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="email" id="txtCEmail" value="<?php echo $current_user['Email']; ?>" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                        </div>
                                                    </dd>
                                                </dl>
                                               
                                                
                                                <div class="m-t-30">
                                                    <button class="btn btn-primary btn-sm" id="btnSaveCContact">Save</button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end Page Content here -->
                </div>
            </section><!--end main body-->
       