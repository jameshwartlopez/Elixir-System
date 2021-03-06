<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo home_url(); ?>/public/img/logo.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo home_url(); ?>/public/img/logo.ico" type="image/x-icon" />
        <title>Elixir Industrial Equipment Inc.</title>
        
        <!-- Vendor CSS -->
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
            
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
        <style type="text/css">
            .system-text{ 
                position: absolute;
            }
            
            .system-text h2{ 
              color: white;
              font-weight: bolder;
              left: 0%;
              font-size: 33px;
              position: relative;
              bottom: 50px;
            }
            
        </style>
    </head>
    
    <body class="login-content">
            <div class=" col-sm-12 system-text">
                <h2>Assisted Credit Sales Monitoring with Stockpile Itemization</h2> 
            </div>
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
            <div class="input-group m-b-10 col-sm-12">
               <img style="width:100%;height:100%;" src="<?php echo home_url()?>/public/img/bgwhite.png">
            </div>
            <div class="input-group m-b-20" id="unameContainer">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" id="txtUsername" class="form-control" placeholder="Username">
                </div>
            </div>
            
            <div class="input-group m-b-20" id="pwordContainer">
                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                <div class="fg-line">
                    <input type="password" id="txtPassword" class="form-control" placeholder="Password">
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="form-group has-error">
                <label id="loginError" style="color: red;">
                  
                </label>
            </div>
            
            <div class="col-sm-6"> 
                <button class="btn bgm-lightblue waves-effect" id="btnLogin"> Login</button>                
                <button class="btn bgm-gray waves-effect" id="btnCancel">  Clear</button>    
            </div>
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
        <script src="<?php echo home_url(); ?>/public/js/jquery.maskMoney.min.js"></script>
        <script src="js/functions.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
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
                        //notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut,'Username is empty','Login Error! ');
                        $("#loginError").html("").html("Login Error! Username is empty");
                        $("#unameContainer").addClass('has-error');
                        $("#pwordContainer").removeClass('has-error');
                    }else if(pword.length <= 0){

                        nType = 'danger';
                        //notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut,'Password is empty','Login Error! ');
                        $("#loginError").html("").html("Login Error! Password is empty");
                        $("#unameContainer").removeClass('has-error');
                        $("#pwordContainer").addClass('has-error');
                    }else{
                        $.post('<?php echo home_url();?>/home/user_login',user_credentials,function(response){
                            console.log(response);

                            if(response == 1){
                                window.location.reload();
                            }else if(response == 0){
                               
                                nType = 'danger';
                                //notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut,'Invalid Username and Password','Login Error! ');
                                $("#loginError").html("").html("Login Error! Invalid Username and Password ");
                                $("#unameContainer").addClass('has-error');
                                $("#pwordContainer").addClass('has-error');
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

                $("#btnCancel").on('click',function(){
                   $('#txtUsername').val("");
                   $('#txtPassword').val("");
                   $("#unameContainer").removeClass('has-error');
                   $("#pwordContainer").removeClass('has-error');
                   $("#loginError").html("");
                });
            });
        </script>

    </body>
</html>