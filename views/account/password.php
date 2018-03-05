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
          <?php if( $this->hasFlash() ){ ?>
            <div class = 'alert alert-success'>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?=$this->getFlash(); ?>
            </div>
          <?php } ?>
          <div class = 'alert alert-danger' style = 'display:none'>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </div>
          <div class = 'row margin-bottom-lg'>
              <div class = 'col-md-offset-3 col-md-6'>
                  <form id = "form_password" class = 'form-horizontal' method = "POST" action = "<?=$this->action_update;?>">
                        <!-- <input type="hidden" name="partner_id" value = "<?=$this->partner_id;?>"> -->
                       <div class = 'form-group'>
                          <label class = 'col-md-4 text-right'>Old password</label>
                          <div class = 'col-md-8'>
                              <input type="password" name="partner_old_password" class = 'form-control' placeholder="Old password">
                          </div>
                       </div>
                       <div class = 'form-group'>
                          <label class = 'col-md-4 text-right'>New password</label>
                          <div class = 'col-md-8'>
                              <input type="password" name="partner_new_password" class = 'form-control' placeholder="New password">
                          </div>
                       </div> 
                       <div class = 'form-group'>
                          <label class = 'col-md-4 text-right'>Confirm password</label>
                          <div class = 'col-md-8'>
                              <input type="password" name="partner_confirm" class = 'form-control' placeholder="Confirm password">
                          </div>
                       </div>
                      <a class = 'btn btn-red pull-left' href="my_account.php">Back</a>
                      <button class = 'btn btn-red pull-right'>Save</button>
                </form>
             </div>
          </div>
      </div>
  </body>

<?php 
include_once 'js.php';
include_once 'footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){

      $('#form_password').submit(function( event  ){
          event.preventDefault();
          const button = $('.btn-red');
          const inputs = $(this).serializeArray();
          const old_password = inputs[0].value;
          const new_password = inputs[1].value;
          const confirm_password = inputs[2].value;
          // const partner_id = inputs[0].value;
          // console.log('test?');
          // console.log(inputs);
          if( old_password == '' ){
            // console.log('checking'); 
            errorMessage('Please provide your old password');
            return false; 
          }
          if( new_password == '' ){
            errorMessage('Please provide your new password');
            return false;
          }
          if( confirm_password == '' ){
            errorMessage('Please provide your new password');
            return false;
          }
           
           
          $.ajax({
            url:'password.php?action=checkpassword',
            method:'POST',
            data:{
              old_password:old_password,
            },
            dataType:'json',
            beforeSend:function(){
              button.text('Loading...');
            },
            success:function(response){
                if ( response.success == 1 ){
                  if( new_password == confirm_password ){
                       changePassword(new_password);
                  } else {
                    errorMessage('Your password and confirm password are not equal');
                  }
                } else {
                  // console.log('testerrerr');
                  errorMessage('Your old password seems incorrect.');
                }
                button.text('SAVE');
            }
          });


          return false;
      });
    });
    function errorMessage(message){
      const alert = $('.alert-danger');
      alert.fadeOut();
      alert.fadeIn();
      alert.html('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+message);
//      alert.text(message);
    }
    function successMessage(message){
      const alert = $('.alert-danger');
      alert.fadeOut();
      alert.fadeIn();
      alert.text(message);
    }
    function changePassword(password){
      const button = $('.btn-red');
      $.ajax({
            url:'password.php?action=update',
            method:'POST',
            data:{
              partner_login_password:password,
            },
            cache:false,
            dataType:'json',
            beforeSend:function(){
               button.text('Loading...');
            },
            success:function(response){
                  // console.log(response);
                 if ( response.success == 1 ){
                    window.location.reload();
                 }
                  // console.log('test : ',response);
            }
      });
    }
</script>