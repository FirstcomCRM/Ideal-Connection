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
class Forgot_password {

    public function Forgot_password(){
    

    }
    public function forgotProcess(){
        //check email exist in system
        $exist = getDataCountBySql('db_partner', "WHERE partner_email = '".$this->email."' AND partner_status = 1");
//        debug($this->login_email);
//        debug($exist);
        if($exist > 0){
//            debug('asda');
            //set the new password 
            $this->login_password_raw = generateRandomString(5);
            $this->login_password = md5("@#~x?\$" . $this->login_password_raw . "?\$");
            $table_field = array('partner_login_password');
            $table_value = array($this->login_password);
            
            //send email
            $htmlBody = "<p>
            Your new password has been reset to the following:
            </p><br>
            <b>$this->login_password_raw</b><br>
            <p>Please <a href = '".webroot."login.php'>login<a/>, and go to My Account to change your password again. </p><br>
            <i>This is an auto-generated mail from www.hydraulic-engineer.net</i>";
            sendEmail(array(
              'to'=> $this->email,
              'body'=>$htmlBody,
              'subject'=>'Password Reset',
              'html'=> true,
              'noreply'=>true
            ));
            
            //get user id
            $id = getDataCodeBySql('partner_id', 'db_partner', "WHERE partner_email = '".$this->email."'", '');
            $remark = "Update Partner with password for ID : {$id}";
            if($this->save->UpdateData($table_field, $table_value, 'db_partner', 'partner_id', $remark,$id)){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        global $session_expiry_time;
        $this->login_password = md5("@#~x?\$" . $this->login_password . "?\$");
//        if($this->login_type == 'EMPLOYEE'){
//            $sql = "SELECT COUNT(*) as total,empl.*,outl.outl_code
//                   FROM db_empl empl
//                   LEFT JOIN db_outl outl ON outl.outl_id = empl.empl_outlet
//                   WHERE empl.empl_login_email = '$this->login_email'
//                   AND empl.empl_login_password = '$this->login_password' AND empl.empl_status = '1' ";
//            $_SESSION['empl_type'] = $this->login_type;
//        }else if($this->login_type == 'SUBCON'){
            $sql = "SELECT COUNT(*) as total,partner_sales_person,partner_group,partner_first_name,partner_last_name, partner_login_password,partner_email,partner_id,db_country.country_currency
                   FROM db_partner LEFT JOIN db_country
                   ON db_country.country_id = db_partner.partner_country
                   WHERE partner_email = '$this->login_email' 
                   AND  partner_login_password = '$this->login_password' AND partner_status = '1' AND partner_approval = '1'";
            // $sql = "SELECT COUNT(*) as total,partner_sales_person,partner_first_name,partner_last_name, partner_login_password,partner_email,partner_id,currency_id
            //        FROM db_partner LEFT JOIN db_country
            //        ON db_country.country_id = db_partner_id.partner_country
            //        WHERE partner_email = '$this->login_email'
            //        AND partner_login_password = '$this->login_password' AND partner_status = '1' AND partner_approval = '1' ";
           
//        }
           // echo $sql;
           // die;
        $query = mysql_query($sql);
        if($row = mysql_fetch_array($query)){
            $total = $row['total'];
            if($total > 0){
                $ip = get_client_ip();
                $table_field = array('logininfo_empl_id','logininfo_ip');
                $table_value = array($row['partner_id'],$ip);
                $remark = system_datetime . " : Insert Customer login record ";
                $this->save->SaveData($table_field,$table_value,'login_record','login_record_id',$remark);
//                echo $row['empl_group'];die;
//                session_start();
                $_SESSION['partner_id'] = $row['partner_id'];
                $_SESSION['partner_name'] = $row['partner_first_name'].' '.$row['partner_last_name'];
                $_SESSION['partner_email'] = $row['partner_email'];
                $_SESSION['partner_group'] = $row['partner_group'];
                $_SESSION['partner_sales_person_id'] = $row['partner_sales_person'];
                $_SESSION['partner_currency_id'] = $row['country_currency'];
//                $_SESSION['empl_code'] = $row['empl_code'];
                $_SESSION["partner_login_expiry"] = $session_expiry_time;
//                $_SESSION['empl_group'] = $row['empl_group'];
//                $_SESSION['empl_department'] = $row['empl_department'];
//                $_SESSION['empl_outlet'] = $row['empl_outlet'];
//                $_SESSION['empl_outlet_code'] = $row['outl_code'];
//                $_SESSION['empl_login_email'] = $row['empl_login_email'];
                
            }
        }else{
            $total = 0;
        }
//        if($this->login_email == 'webmaster' && $this->login_password == '97a357060e5db69521a8f45be1675dcd'){
//            $total = 1;
//            $_SESSION['empl_id'] = 10000;
//            $_SESSION['empl_name'] = "Webmaster";
//            $_SESSION['empl_code'] = "Webmaster";
//            $_SESSION["empl_login_expiry"] = $session_expiry_time;
//            $_SESSION['empl_group'] = -1;
//            $_SESSION['empl_department'] = -1;
//            $_SESSION['empl_outlet'] = -1;
//            $_SESSION['empl_outlet_code'] = "-";
//            $_SESSION['empl_login_email'] = "webmaster";
//        }
        if($total == 1){
            
//            $sql = "SELECT COUNT(*) as total_menu,menuprm_menu_id
//                    FROM db_menuprm WHERE menuprm_group_id = '{$_SESSION['empl_group']}' AND menuprm_prmcode = 'access'";
//            $query = mysql_query($sql);
//            if($row = mysql_fetch_array($query)){
//                $total_menu = $row['total_menu'];
//                $menuprm_menu_id = $row['menuprm_menu_id'];
//            }else{
//                $total_menu = 0;
//            }
//            if($total_menu > 0){
//                $this->menu_path = getDataCodeBySql("menu_path","db_menu"," WHERE menu_id = '$menuprm_menu_id'", "");
//                $this->msg = "";
//            }else{
//                $this->msg = "Please get your admin asign access right to you.";
//            }
//            if(($_SESSION['empl_group'] == 1) || ($_SESSION['empl_group'] == -1)){
                $this->menu_path = 'index.php';
                $this->msg = "";
//            }
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
    <title>SEA HYDRAULIC ENGINEERING | Forgot Password</title>
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
          <div class="col-sm-offset-4 col-sm-4 divider-container-left">
            <div class = 'customer-login-container row'>
                <div class = 'col-md-offset-1 col-md-9'>
                  <form id = 'login_form' method="post" onsubmit = "return login(this)">
                      <input type="hidden" name="login_type" value = "customer">
                      <h3 class = 'page-secondary-header-common margin-top-lg margin-bottom-md'>Forgot Password</h3>
                      <div>Please enter your login email, a new password will send to you via email.
                      </div><br>
                      <div class = 'form-group'>
                          <input type="text" name="email" id="login_email" class = 'form-control' placeholder = "Email">
                      </div>
                      <button class = 'btn btn-red margin-top-md submit margin-bottom-lg'>Submit</button>
                      <button class = 'btn btn-red margin-top-md pull-right' go = "login.php">Back</button>
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

         if($('#login_email').val() == ""){
             alert('Please fill in the email');
             return false;
         }
         var data = "action=forgot&" + $('#login_form').serialize();
            $.ajax({
                url:'forgot_password.php',
                type:'POST',
                data:data,
                cache:false,
                beforeSend: function() {

                    $(element).find('.submit').text("Sending...");
                    $(element).find('.submit').attr("disabled",true);
                },
                error: function(xhr) {
                    alert("Login Fail");
                    $(element).find('.submit').attr("disabled",false);
                    $(element).find('.submit').text("Sign In");
                },
                success:function(xml){
                                  console.log(xml);
                    jsonObj = eval('('+ xml +')');
                    $(element).find('.btn').attr("disabled",false);
                    $(element).find('btn').text("Sign In");
                    if(jsonObj.status == 1){
                        location.reload();
                    }else{
                        alert("Email not found");
                        $(element).find('.submit').attr("disabled",false);
                        $(element).find('.submit').text("Sign In");
                        $('#login_email').focus();
                    }
                }
            });
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
