<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>

        <!-- Vendor CSS -->
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/summernote/dist/summernote.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/farbtastic/farbtastic.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/vendors/chosen_v1.4.2/chosen.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="<?php echo home_url(); ?>/public/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/css/app.min.2.css" rel="stylesheet">
        <link href="<?php echo home_url(); ?>/public/css/style.css" rel="stylesheet">    
        <script type="text/javascript">
            var home_url = '<?php echo home_url();?>';
        </script>
    </head>
    <body>
        <header id="header" data-date-today="<?php echo date('Y-m-d'); ?>">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="<?php echo home_url();?>"><?php echo $companyName;?> </a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                   
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-notification" href="index.html"><i class="tmn-counts">9</i></a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview" id="notifications">
                                <div class="lv-header">
                                    Notification
                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="index.html" data-clear="notification">
                                                <i class="zmdi zmdi-check-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lv-body">
                                    <a class="lv-item" href="index.html">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo home_url();?>/public/img/profile-pics/1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">David Belle</div>
                                                <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="index.html">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo home_url();?>/public/img/profile-pics/2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Jonathan Morris</div>
                                                <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                            </div>
                                        </div>
                                    </a> 
                                </div>
                    
                                <a class="lv-footer" href="<?php echo home_url()?>/user/profile">View Previous</a>
                            </div>
                    
                        </div>
                    </li>
                    
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-task" href="#"></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li>
                                <a href="<?php echo home_url()?>/user/profile"><i class="zmdi zmdi-account"></i> View Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url()?>/user/settings"><i class="zmdi zmdi-settings"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url();?>/user/logout"><i class="zmdi zmdi-storage "></i> Backup and Restore</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url();?>/user/logout"><i class="zmdi zmdi-power"></i> Log out</a>
                            </li>
                        </ul>
                    </li>
                    
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>
        
        <section id="main">
            <aside id="sidebar">
                <div class="sidebar-inner c-overflow">
                    <div class="profile-menu">
                        <a href="index.html">
                            <div class="profile-pic">
                                <img src="<?php echo $current_user['avatar'];?>" alt="">
                            </div>

                            <div class="profile-info">
                                <?php echo $current_user['Firstname'].' '.$current_user['LastName'];?>
                                <i class="zmdi zmdi-arrow-drop-down"></i>
                            </div>
                        </a>

                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo home_url()?>/user/profile"><i class="zmdi zmdi-account"></i> View Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url()?>/user/settings"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                            </li>
                            
                        </ul>
                    </div>

                    <ul class="main-menu">
                        <li class="active"><a href="<?php home_url();?>"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-assignment"></i> Products </a>

                            <ul>
                                <li>
                                    <a class="active" href="<?php echo home_url()?>/product">
                                        Products Profile
                                    </a>
                                </li>

                                <li><a href="<?php echo home_url();?>/product/itemUnit">Item Unit</a></li>
                                <li><a  href="<?php echo home_url()?>/product/category">Category</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-rotate-cw"></i> Transaction </a>

                            <ul>
                                <li><a href="<?php echo home_url(); ?>/product/stockIn"></i> Stock In Items</a></li>
                                <li><a href="<?php echo home_url(); ?>/product/stockOut">Stock Out Items</a></li>
                                <li><a href="<?php echo home_url(); ?>/product/returnedItems">Returned Items</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-widgets"></i> Reports </a>

                            <ul>
                                <li><a href="<?php echo home_url(); ?>/report/stockPile"></i> Stockpile </a></li>
                                <li><a href="<?php echo home_url();?>/report/stockIn">Stock In Items</a></li>
                                <li><a href="<?php echo home_url(); ?>/report/stockOut">Stock Out Items</a></li>
                                <li><a href="<?php echo home_url();?>/report/service">Service Report</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo home_url();?>/service"><i class="zmdi zmdi-truck"></i> Service Report</a></li>
                        <li><a href="<?php echo home_url();?>/client"><i class="zmdi zmdi-account-add"></i> Clients Profile</a></li>
                        <li><a href="<?php echo home_url();?>/user/all"><i class="zmdi zmdi-assignment-account"></i> System Users</a></li>
                
                    </ul>
                </div>
            </aside>
            
           