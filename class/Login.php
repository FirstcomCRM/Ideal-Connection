<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class Login {

    public function Login(){
    

    }
    public function loginProcess(){
        global $session_expiry_time;
        $this->login_password = md5("@#~x?\$" . $this->login_password . "?\$");
            $sql = "SELECT COUNT(*) as total,partner_sales_person,partner_group,partner_first_name,partner_last_name,partner_outlet, partner_login_password,partner_email,partner_id,db_country.country_currency
                   FROM db_partner LEFT JOIN db_country
                   ON db_country.country_id = db_partner.partner_company_country
                   WHERE partner_email = '$this->login_email' 
                   AND  partner_login_password = '$this->login_password' 
                   AND  partner_login_name = '$this->login_name'
                   AND  partner_status = '1' AND partner_approval = '1'";
        $query = mysql_query($sql);
        if($row = mysql_fetch_array($query)){
            $total = $row['total'];
            if($total > 0){
                
                $ip = get_client_ip();
                $table_field = array('logininfo_empl_id','logininfo_ip');
                $table_value = array($row['partner_id'],$ip);
                $remark = system_datetime . " : Insert Customer login record ";
                $this->save->SaveData($table_field,$table_value,'db_logininfo','login_record_id',$remark);
                $_SESSION['partner_id'] = $row['partner_id'];
                $_SESSION['partner_name'] = $row['partner_first_name'].' '.$row['partner_last_name'];
                $_SESSION['partner_email'] = $row['partner_email'];
                $_SESSION['partner_group'] = $row['partner_group'];
                $_SESSION['partner_outlet'] = $row['partner_outlet'];
                $_SESSION['partner_sales_person_id'] = $row['partner_sales_person'];
                $_SESSION['partner_currency_id'] = $row['country_currency'];
                $_SESSION["partner_login_expiry"] = $session_expiry_time;
                
                
            }
        }else{
            $total = 0;
        }

//        }
        if($total == 1){

            $this->menu_path = 'index.php';
            $this->msg = "";
            return true;
        }else{
            return false;
        }
        
    }
    public function getInputForm(){
        global $language,$lang;
        
    ?>
    <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | Log in</title>
    <?php 
    include_once 'header.php';
    ?>

  </head>
  <body class="hold-transition login-page">
      <div class="container container-common">
       <?php if(isset($_SESSION["success_msg"]) && $_SESSION["success_msg"]!= "" ){ ?>
           <div class="alert alert-success fade in alert-dismissable">
               <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <?= $_SESSION["success_msg"]; ?>
          </div>
        <?php  
        unset($_SESSION["success_msg"]);
       } ?>
       <?php if(isset($_SESSION["error_msg"]) && $_SESSION["error_msg"]!= "" ){ ?>
           <div class="alert alert-danger fade in alert-dismissable">
               <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <?= $_SESSION["error_msg"]; ?>
          </div>
        <?php  
        unset($_SESSION["error_msg"]);
       } ?>
      <!--<div class = 'page-header-hr-red'></div>-->
      <!--<h2 class = 'page-header-common margin-bottom-lg'>USER LOGIN</h2>-->
      <div class = 'row margin-bottom-lg' id = "login">
          <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 divider-container-left">
            <div class = 'customer-login-container row'>
                <div class = 'col-md-offset-1 col-md-10'>
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
              <!-- <div class = 'staff-login-container row'> -->
                <!-- <div class = 'col-md-offset-1 col-md-9'> -->
                
                    <!-- <p class="login-box-msg">I am a returning customer</p> -->
                    <!--   <form id = 'login_form_staff' method="post" onsubmit = "return login(this)">
                        <input type="hidden" name="login_type" value = "customer">
                        <h3 class = 'page-secondary-header-common margin-top-lg margin-bottom-md'>STAFF LOGIN</h3>
                        <div class = 'form-group'>
                            <input type="text" name="email" class = 'form-control' placeholder = "Email">
                        </div>
                        <div class = 'form-group'>
                            <input type="password" name="password" class = 'form-control' placeholder = "Password">
                        </div>
                        <a href="" class = 'clearfix forgotten-text'>Forgotten Password</a>
                        <button class = 'btn btn-red margin-top-md margin-bottom-lg'>LOGIN</button>
                    </form> -->
                  <!-- </div> -->
                <!-- </div> -->
          </div>
      </div>
    </div>

    <?php 
    include_once 'js.php';
    include_once 'footer.php';
    
    ?>
    <script>
      $(document).ready(function(){
         
        // console.log( );
        $('[go]').each(function(index, button){
             const url = $(button).attr('go');
             $(button).click(function(event){
                  event.preventDefault();
                  window.location.href = url;
             })
        })
      });
      $(function () {
        $('#login_email').focus();
      });

      function login(element){
//
         var name = $('input[name=name]').val();
         var email = $('input[name=email]').val();
         var password = $('input[name=password]').val();

//         return false;
         if(name != '' && email != '' && password != ''){
             
            var data = "action=login&" + $('#login_form').serialize();
            $.ajax({
                url:'login.php',
                type:'POST',
                data:data,
                cache:false,
                beforeSend: function() {

                    $(element).find('.login').text("loading...");
                    $(element).find('.login').attr("disabled",true);
                },
                error: function(xhr) {
                    alert("Login Fail");
                    $(element).find('.login').attr("disabled",false);
                    $(element).find('.login').text("Login");
                },
                success:function(xml){
                                  console.log(xml);
                    jsonObj = eval('('+ xml +')');
                    $(element).find('.btn').attr("disabled",false);
                    $(element).find('btn').text("Sign In");
                    if(jsonObj.status == 1){
                        if(jsonObj.msg != ""){
                            alert(jsonObj.msg);
                        }else{
                            window.location.href = jsonObj.menu_path;
                        }

                    }else{
                        alert("Login Fail");
                        $(element).find('.login').attr("disabled",false);
                        $(element).find('.login').text("Login");
                        $('#login_email').focus();
                    }
                }
            });
        } else {
            alert("Please fill in all the field.");
        }
         return false;
      }
    </script>
  </body>
</html>  
        <?php
//        session_destroy();
    }


}
?>
