<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | <?=$this->title;?></title>
    <?php 
      include_once 'header.php';
    ?>
  </head>
  <body class="hold-transition" id = "page-about">
      <div class="container container-common">
          <div class = 'text-center margin-bottom-lg'>
            <div class="page-header-hr-red"></div>
            <h2 class="page-header-common"><?=$this->title;?></h2>
          </div>
          <?php 
          global $mandatory;
            if( $this->hasFlash() ){ ?>
            <div class = 'alert alert-success fade in alert-dismissable'>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?=$this->getFlash(); ?>
            </div>
          <?php } ?>

          <div class = 'row margin-bottom-lg'>
              <div class = 'col-md-12'>
                  <form class = 'form-horizontal' method = "POST" action = "<?=$this->action_update;?>" id="editInfo">
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                               <label class = 'col-md-3 text-right'>First name <?= $mandatory?></label>
                                <div class = 'col-md-9'>
                                    <input  value = "<?=$this->partner_first_name; ?>"  type="text" name="partner_first_name" class = 'form-control'>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                               <label class = 'col-md-3 text-right'>Company Name</label>
                                <div class = 'col-md-9'>
                                    <input  value = "<?=$this->partner_company_name; ?>"  type="text" name="partner_company_name" class = 'form-control' disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Last name <?= $mandatory?></label>
                                <div class = 'col-md-9'>
                                    <input  value = "<?=$this->partner_last_name; ?>" type="text" name="partner_last_name" class = 'form-control'>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                               <label class = 'col-md-3 text-right'>Company Address</label>
                                <div class = 'col-md-9'>
                                  <textarea class="form-control" rows="3" id="partner_company_inv_addr" name="partner_company_inv_addr" placeholder="Company Address" disabled><?php echo $this->partner_company_inv_addr;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Email <?= $mandatory?></label>
                                <div class = 'col-md-9'>
                                    <input  value = "<?=$this->partner_email; ?>"  type="text" name="partner_email" class = 'form-control'>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                               <label class = 'col-md-3 text-right'>Company Delivery Address</label>
                                <div class = 'col-md-9'>
                                  <textarea class="form-control" rows="3" id="partner_company_del_addr" name="partner_company_del_addr" placeholder="Company Address" disabled><?php echo $this->partner_company_del_addr;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Mobile No.</label>
                                <div class = 'col-md-9'>
                                    <input value = "<?=$this->partner_telephone; ?>" type="text" name="partner_telephone" class = 'form-control'>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Company Telephone</label>
                                 <div class = 'col-md-9'>
                                     <input  value = "<?=$this->partner_company_tel; ?>"  type="text" name="partner_company_tel" class = 'form-control' disabled>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Login Username <?= $mandatory?></label>
                                 <div class = 'col-md-9'>
                                     <input  value = "<?=$this->partner_login_name; ?>"  type="text" name="partner_login_name" class = 'form-control'>
                                 </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Company Website</label>
                                 <div class = 'col-md-9'>
                                     <input  value = "<?=$this->partner_company_website; ?>"  type="text" name="partner_company_website" class = 'form-control' disabled>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'></label>
                                <div class = 'col-md-9'>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Company Registration No.</label>
                                 <div class = 'col-md-9'>
                                     <input  value = "<?=$this->partner_company_registration_no; ?>"  type="text" name="partner_company_registration_no" class = 'form-control' disabled>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'></label>
                                <div class = 'col-md-9'>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = 'form-group'>
                                <label class = 'col-md-3 text-right'>Company Country</label>
                                 <div class = 'col-md-9'>
                                     <input  value = "<?=$this->partner_company_country; ?>"  type="text" name="partner_company_country" class = 'form-control' disabled>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <input type = "hidden" value = "<?php echo $this->partner_id;?>" name = "partner_id" id = "partner_id"/>
                    <a class = 'btn btn-red pull-left' href="my_account.php">Back</a>
                    <button class = 'btn btn-red pull-right' type="submit">Save</button>
                 </div>
              </form>
          </div>
      </div>
  </body>

<?php 
include_once 'js.php';
include_once 'footer.php';
?>
<script type="text/javascript">
    $("#editInfo").validate({
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
                
            }
        },
        messages:
        {
            partner_login_name:{
                remote:'Duplicate Username',
            }
        }
    });
</script>