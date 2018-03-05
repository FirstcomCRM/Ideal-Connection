<?php
/*
 * To change this tpartnerate, choose Tools | Tpartnerates
 * and open the tpartnerate in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class Register {

    public function Register(){
        include_once 'admin/class/SelectControl.php';
        include_once 'admin/class/Empl.php';
        $this->select = new SelectControl();
        

    }
   
    public function sendMailToAdmins(){
        //go to setting to get related emails
        $emails = getDataCodeBySql('setting_register_email', 'db_setting', '', '');
//        debug($emails);
        $email_array = explode(',', $emails);
//        foreach
        $htmlBody = "<p>
        {$this->partner_last_name} {$this->partner_first_name} from {$this->partner_company_name} have registered for an account. <br>Please <a href = '".webroot."admin/partner.php'>login<a/>  to approve registration.
        </p><br><i>This is an auto-generated mail from www.hydraulic-engineer.net</i>";
        sendEmail(array(
          'to'=> $email_array,
          'body'=>$htmlBody,
          'html'=> true,
          'noreply'=>true
        ));
    }
    public function create(){
    
        $this->partner_login_password = md5("@#~x?\$" . $this->partner_login_password . "?\$");

        
        $this->partner_status = 1; 

        $table_field = array('partner_first_name', 'partner_iscustomer', 'partner_last_name', 'partner_tel',
                             'partner_email', 'partner_status', 'partner_login_password', 'partner_login_name',
                             'partner_company_name', 'partner_company_inv_addr', 'partner_company_del_addr', 'partner_company_country',
                             'partner_company_tel', 'partner_company_email', 'partner_company_website', 'partner_company_registration_no');
        $table_value = array($this->partner_first_name, 1, $this->partner_last_name, $this->partner_tel,
                             $this->partner_email, 1, $this->partner_login_password, $this->partner_login_name,
                             $this->partner_company_name, $this->partner_company_inv_addr, $this->partner_company_del_addr, $this->partner_company_country,
                             $this->partner_company_tel, $this->partner_company_email, $this->partner_company_website, $this->partner_company_registration_no);
        $remark = "Insert Partner.";

        // 'send to all sales employee';

        
        // die('success mail sent');
        // debug( $table_value ) ;

        
        if(!$this->save->SaveData($table_field,$table_value,'db_partner','partner_id',$remark)){

           return false;
        }else{
          // die('BUM');
            $this->partner_id = $this->save->lastInsert_id;
            $customer_fname = getDataCodeBySql('partner_first_name', 'db_partner', "WHERE partner_id = '".$this->partner_id."'", $orderby);
            $customer_lname = getDataCodeBySql('partner_last_name', 'db_partner', "WHERE partner_id = '".$this->partner_id."'", $orderby);
            $emailContent = "<p>
            {$this->partner_last_name} {$this->partner_first_name} from {$this->partner_company_name} have registered for an account. <br>Please <a href = '".webroot."admin/partner.php'>login<a/>  to approve registration.
            </p><br><i>This is an auto-generated mail from www.hydraulic-engineer.net</i>";
            insertNotification("New customer registered : $customer_fname $customer_lname", 'register', $this->partner_id ,'', 'register', $emailContent, $this->save);
//            $this->sendMailToAdmins();
//            $this->notification->save();

           return true;
        }
    }

    public function getInputForm($action){
        global $mandatory;
        if($action == 'create'){
            $this->partner_seqno = 10;
            
            $this->partner_status = 1;
        }

        $this->countryCrtl = $this->select->getCountrySelectCtrl($this->partner_outlet,'','','all');
        
        $label_col_sm = "col-sm-2";
        $field_col_sm = "col-sm-3";

    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Registration</title>
    <?php
    include_once 'css.php';
    
    ?>    
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body>
      <!-- include header-->
      <?php include_once 'header.php';?>
      <!-- Full Width Column -->
      <div class="container container-common">
        <?php if(isset($_SESSION["error_msg"]) && $_SESSION["error_msg"]!= "" ){ ?>
            <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
             <?= $_SESSION["error_msg"]; ?>
            </div>
        <?php  } ?>
        <div class="content-wrapper margin-bottom-lg">
            <!-- <h2 class="page-header">Account Registration</h2> -->
            <div class = 'text-center'>
                <div class="page-header-hr-red"></div>
                <h2 class="page-header-common margin-bottom-lg">Account Registration</h2>
            </div>
        
          <!-- Main content -->
            <div class="box box-success">
                <form id = 'register_form' class="form-horizontal" action = 'register.php?action=create' method = "POST">
                    <input type ='hidden' name = 'current_tab' id = 'current_tab' value = "<?php echo $this->current_tab?>"/>

                        <div class="form-group">
                            <label for="partner_first_name" class="<?php echo $label_col_sm;?> control-label">First Name <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_first_name" name="partner_first_name" value = "<?php echo $this->partner_first_name;?>" placeholder="First Name">
                            </div>
                            <label for="partner_company_name" class="<?php echo $label_col_sm;?> control-label">Company Name <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_company_name" name="partner_company_name" value = "<?php echo $this->partner_company_name;?>" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="partner_last_name" class="<?php echo $label_col_sm;?> control-label">Last Name <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_last_name" name="partner_last_name" value = "<?php echo $this->partner_last_name;?>" placeholder="Last Name">
                            </div>
                            <label for="partner_company_inv_addr" class="<?php echo $label_col_sm;?> control-label">Company Address <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                                  <textarea class="form-control" rows="3" id="partner_company_inv_addr" name="partner_company_inv_addr" placeholder="Company Address"><?php echo $this->partner_company_inv_addr;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="partner_email" class="<?php echo $label_col_sm;?> control-label">Email <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_email" name="partner_email" value = "<?php echo $this->partner_email;?>" placeholder="Email">
                            </div>
                            <label for="partner_company_del_addr" class="<?php echo $label_col_sm;?> control-label">Company Delivery Address <br>(if different from above)</label>
                            <div class="col-sm-3">
                                  <textarea class="form-control" rows="3" id="partner_company_del_addr" name="partner_company_del_addr" placeholder="Company Delivery Address"><?php echo $this->partner_company_del_addr;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="partner_tel" class="<?php echo $label_col_sm;?> control-label">Mobile No.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_tel" name="partner_tel" value = "<?php echo $this->partner_tel;?>" placeholder="Mobile No.">
                            </div>
                            <label for="partner_company_tel" class="<?php echo $label_col_sm;?> control-label">Company Telephone <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_company_tel" name="partner_company_tel" value = "<?php echo $this->partner_company_tel;?>" placeholder="Company Telephone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="partner_login_name" class="<?php echo $label_col_sm;?> control-label">Login Username <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_login_name" name="partner_login_name" value = "<?php echo $this->partner_login_name;?>" placeholder="Login Username">
                            </div>
                            <label for="partner_company_website" class="<?php echo $label_col_sm;?> control-label">Company Website</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_company_website" name="partner_company_website" value = "<?php echo $this->partner_company_website;?>" placeholder="Company Website">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="partner_login_password" class="col-sm-2 control-label" >Password <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="password" class="form-control" id="partner_login_password" name="partner_login_password" value = "<?php echo $this->partner_login_password;?>" placeholder="Password">
                            </div>
                            <label for="partner_company_registration_no" class="<?php echo $label_col_sm;?> control-label">Company Registration No.</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_company_registration_no" name="partner_company_registration_no" value = "<?php echo $this->partner_company_registration_no;?>" placeholder="Company Registration No">
                            </div>
                        </div>
                        <div class="form-group">
                              <label for="partner_login_password_cm" class="col-sm-2 control-label" >Confirm Password <?php echo $mandatory;?></label>
                              <div class="col-sm-3">
                                <input type="password" class="form-control" id="partner_login_password_cm" name="partner_login_password_cm" value = "<?php echo $this->partner_login_password;?>" placeholder="Confirm Password">
                              </div>
                              <label for="partner_company_country" class="col-sm-2 control-label" >Company Country <?php echo $mandatory;?></label>
                              <div class="col-sm-3">

                                  <select class="form-control select2" id="partner_company_country" name="partner_company_country" style = 'width:100%'>

                                  
                                    <?php echo $this->countryCrtl;?>

                                  </select>

                              </div>
                        </div>



                 
              </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer text-center margin-top-04" style = 'clear:both'>
                    <button type="button" class="btn btn-default btn-lg" onclick = "history.go(-1)">CANCEL</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->partner_id;?>" name = "partner_id" id = "partner_id"/>
                    <button type = "submit" class="btn btn-red">Register</button>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
            <div class = 'margin-bottom-lg'></div>
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once 'footer.php';?>
    </div><!-- ./wrapper -->
    <?php
    include_once 'js.php';
    
    ?>

    <script>
    $(document).ready(function() {
//        console.log('ready');
        $('label').each(function(index, element){
            $(element).removeClass('control-label');
            $(element).addClass('text-right');
        });
        $('.select2').select2();
        $("#register_form").validate({
                  rules: 
                  {
                      partner_login_name:
                      {
                          required: true, 
                          remote: {
                                  url: "register.php?action=validate_name",
                                  type: "post",
                                  data: 
                                        {
                                            partner_id: function()
                                            {
                                                return $("#partner_id").val();
                                            }
                                        }
                              }
                      },
                      partner_first_name:
                      {
                          required: true,        
                      },
                      partner_last_name:
                      {
                          required: true,        
                      },
                      partner_email:
                      {
                          required: true,
                          email: true
                          
                      },
                      partner_login_password:
                      {
                        required: true,
                      },
                      partner_login_password_cm:
                      {
                        required: true,
                        minlength : 5,
                        equalTo : "#partner_login_password"
                      },
                      partner_company_name:
                      {
                         required: true
                      },
                      partner_company_inv_addr:
                      {
                         required: true
                      },
                      partner_company_country:
                      {
                         required: true
                      },
                      partner_company_tel:
                      {
                         required: true
                      }
                  },
                  messages:
                  {
                      partner_login_name:{
                          remote:'Duplicate Username',
                      }
                  }
              });
    
});

    </script>
  </body>
</html>
        <?php
        
    }
    

}
?>
