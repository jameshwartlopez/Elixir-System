            <!--main body-->
            <section id="content">
                <div class="container">
                    <div class="row"><!-- add Page Content here -->
                       
                            <div class="card" id="profile-main">
                                <div class="pm-overview c-overflow">
                                    <div class="profile-menu">
                                        <a href="index.html">
                                            <div class="profile-pic">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/1.jpg" alt="">
                                            </div>

                                            <div class="profile-info">
                                                Malinda Hollaway
                                                <i class="zmdi zmdi-arrow-drop-down"></i>
                                            </div>
                                        </a>

                                        <ul class="main-menu profile-avatar" style="background-color: #edecec;">
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/1.jpg" alt=""> Simply Beautiful</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/2.jpg" alt=""> Okay Man</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/3.jpg" alt=""> Shy Girl</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/4.jpg" alt=""> Good Boy</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/5.jpg" alt=""> Inlove Woman</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/7.jpg" alt=""> Brown Hair</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/8.jpg" alt=""> Blue Polo</a>
                                            </li>
                                            <li>
                                                 <a href="http://localhost/csm/user/settings">
                                                <img src="<?php echo home_url();?>public/img/profile-pics/9.jpg" alt=""> Pink Shirt</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class="pmo-block pmo-contact hidden-xs">
                                        <h2>Contact</h2>
                                        
                                        <ul>
                                            <li><i class="zmdi zmdi-phone"></i> 00971 12345678 9</li>
                                            <li><i class="zmdi zmdi-email"></i> malinda-h@gmail.com</li>
                                            <li>
                                                <i class="zmdi zmdi-pin"></i>
                                                <address class="m-b-0">
                                                    10098 ABC Towers, 
                                                    Dubai Silicon Oasis, Dubai, 
                                                    United Arab Emirates
                                                </address>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                
                                </div>
                                
                                <div class="pm-body clearfix">
                                    <ul class="tab-nav tn-justified">
                                        <li class="active waves-effect"><a href="<?php echo home_url();?>user/profile">Profile</a></li>
                                        <li class="waves-effect"><a href="<?php echo home_url();?>user/settings">Settings</a></li>
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
                                                    <dd>Mallinda Hollaway</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Gender</dt>
                                                    <dd>Female</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Birthday</dt>
                                                    <dd>June 23, 1990</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Martial Status</dt>
                                                    <dd>Single</dd>
                                                </dl>
                                            </div>
                                            
                                            <div class="pmbb-edit">
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">First Name</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="Enter your first name here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Last Name</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="Enter your last name here">
                                                        </div>
                                                        
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Gender</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <select class="form-control">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Birthday</dt>
                                                    <dd>
                                                        <div class="dtp-container dropdown fg-line">
                                                            <input type='text' class="form-control date-picker" data-toggle="dropdown" placeholder="Click here...">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Martial Status</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <select class="form-control">
                                                                <option>Single</option>
                                                                <option>Married</option>
                                                                <option>Other</option>
                                                            </select>
                                                        </div>
                                                    </dd>
                                                </dl>
                                                
                                                <div class="m-t-30">
                                                    <button class="btn btn-primary btn-sm">Save</button>
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
                                                    <dt>Address</dt>
                                                    <dd>address here st.</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Mobile Phone</dt>
                                                    <dd>00971 12345678 9</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Email Address</dt>
                                                    <dd>malinda.h@gmail.com</dd>
                                                </dl>
                                            </div>
                                            
                                            <div class="pmbb-edit">
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Address</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Mobile Phone</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" placeholder="eg. 00971 12345678 9">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-t-10">Email Address</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="email" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                        </div>
                                                    </dd>
                                                </dl>
                                               
                                                
                                                <div class="m-t-30">
                                                    <button class="btn btn-primary btn-sm">Save</button>
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
       