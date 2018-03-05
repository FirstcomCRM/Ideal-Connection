<?php

//    include_once 'connect.php';
//    include_once 'config.php';
//    include_once 'include_function.php';
//    include_once 'class/Login.php'; 
//    include_once 'admin/class/SavehandlerApi.php';
//$select_ctrl = new SelectControl();
//$countryCrtl = $select_ctrl->getCountrySelectCtrl("",'N');
?>
<!DOCTYPE HTML SYSTEM>
<html lang="zh" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Search Engine content-->
        <meta name="title" content="<?php echo $aboutus_mt_title;?>">
        <meta name="description" content="<?php echo $aboutus_mt_desc;?>">
        <meta name="keywords" content="<?php echo $aboutus_mt_keyword;?>">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name="robot" content="All">
<style>

.animation_image {
    padding: 10px;
    width: 500px;
    margin-right: auto;
    margin-left: auto;
}
</style>
	
    <title>Ideal Connection</title>
    </head>
    <body class = "hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php include_once 'header.php';?>
            <div class="home_div">
                
                  <div class = 'row margin-bottom-lg' id = "login">
                      <div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 divider-container-left">
                        <div class = 'customer-login-container row'>
                            <div class = 'col-md-offset-1 col-md-5'>
                              <form id = 'login_form' method="post" onsubmit = "return login(this)">
                                  <input type="hidden" name="login_type" value = "customer">
                                  <h3 class = 'page-secondary-header-common margin-top-lg margin-bottom-md'>SIGN IN</h3>
                                  <div class = 'form-group'>
                                      <input type="text" name="email" class = 'form-control' placeholder = "Email">
                                  </div>
                                  <div class = 'form-group'>
                                      <input type="password" name="password" class = 'form-control' placeholder = "Password">
                                  </div>
                                  <a href="forgot_password.php" class = 'clearfix forgotten-text'>Forgotten Password</a>
                                  <button class = 'btn btn-red margin-top-md margin-bottom-lg login'>LOGIN</button>
                                  <button class = 'btn btn-red margin-top-md pull-right' go = "register.php">SIGN UP</button>
                              </form>
                            </div>
                            <div class = 'col-md-offset-1 col-md-5'>
                              <form id = 'login_form' method="post" onsubmit = "return login(this)">
                                  <input type="hidden" name="login_type" value = "customer">
                                  <h3 class = 'page-secondary-header-common margin-top-lg margin-bottom-md'>CUSTOMER LOGIN</h3>
                                  <div class = 'form-group'>
                                      <input type="text" name="name" class = 'form-control' placeholder = "Username">
                                  </div>
                                  <div class = 'form-group'>
                                      <input type="text" name="email" class = 'form-control' placeholder = "Email">
                                  </div>
                                  <div class = 'form-group'>
                                      <input type="password" name="password" class = 'form-control' placeholder = "Password">
                                  </div>
                                  <a href="forgot_password.php" class = 'clearfix forgotten-text'>Forgotten Password</a>
                                  <button class = 'btn btn-red margin-top-md margin-bottom-lg login'>LOGIN</button>
                                  <button class = 'btn btn-red margin-top-md pull-right' go = "register.php">SIGN UP</button>
                              </form>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6 divider-container-right">
                      </div>
                  </div>
                       
            </div>
            <div class="container">
                <!-- <p>test?</p> -->
                       <!-- <h1>TEST</h1> -->
                <?php // echo debug($_SESSION);?>
            </div>  
          <?php include_once 'footer.php';?>
      </div>   
        
        

    </body>
</html>
