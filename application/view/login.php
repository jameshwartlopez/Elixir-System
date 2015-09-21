<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>
        
        <!-- Vendor CSS -->
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
            
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
    </head>
    
    <body class="login-content">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" id="txtUsername" class="form-control" placeholder="Username">
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                <div class="fg-line">
                    <input type="password" id="txtPassword" class="form-control" placeholder="Password">
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Keep me signed in
                </label>
            </div>
            
            <p href="#" id="btnLogin" class="btn btn-login btn-danger btn-float">
                <i class="zmdi zmdi-arrow-forward"></i>
            </p>
            
           <!--  <ul class="login-navigation">
                <li data-block="#l-register" class="bgm-red">Register</li>
                <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
            </ul> -->
        </div>
        
        
        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="js/functions.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                /*
                 * Notifications
                 */
                function notify(from, align, icon, type, animIn, animOut,msg,title){
                    $.growl({
                        icon: icon,
                        title: title,
                        message: msg,
                        url: ''
                    },{
                            element: 'body',
                            type: type,
                            allow_dismiss: true,
                            placement: {
                                    from: from,
                                    align: align
                            },
                            offset: {
                                x: 20,
                                y: 85
                            },
                            spacing: 10,
                            z_index: 1031,
                            delay: 2500,
                            timer: 1000,
                            url_target: '_blank',
                            mouse_over: false,
                            animate: {
                                    enter: animIn,
                                    exit: animOut
                            },
                            icon_type: 'class',
                            template: '<div data-growl="container" class="alert" role="alert">' +
                                            '<button type="button" class="close" data-growl="dismiss">' +
                                                '<span aria-hidden="true">&times;</span>' +
                                                '<span class="sr-only">Close</span>' +
                                            '</button>' +
                                            '<span data-growl="icon"></span>' +
                                            '<span data-growl="title"></span>' +
                                            '<span data-growl="message"></span>' +
                                            '<a href="notification-dialog.html#" data-growl="url"></a>' +
                                        '</div>'
                    });
                };

                function login(){
                    var uname = $('#txtUsername').val();
                    var pword = $('#txtPassword').val();
                    var user_credentials = {
                        'userName':uname,
                        'password':pword
                    }

                    var nFrom = $(this).attr('data-from');
                    var nAlign = $(this).attr('data-align');
                    var nIcons = $(this).attr('data-icon');
                    var nType = $(this).attr('data-type');
                    var nAnimIn = $(this).attr('data-animation-in');
                    var nAnimOut = $(this).attr('data-animation-out');
                
            
                    if(uname.length <= 0){
                        nType = 'danger';
                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut,'Username is empty','Login Error! ');

                    }else if(pword.length <= 0){

                        nType = 'danger';
                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut,'Password is empty','Login Error! ');

                    }else{
                        $.post('<?php echo home_url();?>/home/user_login',user_credentials,function(response){
                            console.log(response);

                            if(response == 1){
                                window.location.reload();
                            }else if(response == 0){
                               
                                nType = 'danger';
                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut,'Invalid Username and Password','Login Error! ');

                            }
                        });    
                    }
                }

                $('#btnLogin').on('click',function(e){
                    e.preventDefault();
                    login();
                });

                $('#txtUsername').on('keydown',function(e){
                    var keycode = (e.keyCode ? e.keyCode: e.which);
                    if(keycode=='13'){
                        login();
                    }
                });

                $('#txtPassword').on('keydown',function(e){
                    var keycode = (e.keyCode ? e.keyCode: e.which);
                    if(keycode=='13'){
                        login();
                    }
                });
            });
        </script>

    </body>
</html>