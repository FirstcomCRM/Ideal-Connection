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
class My_account {

    public function My_account(){

    }

    public function getMenu(){
        global $mandatory;

    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Account</title>
    <?php
    include_once 'css.php';
    ?>    
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body id = "account-page">
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
          <div class = 'text-center'>
              <div class = 'page-header-hr-red'></div>
              <h2 class = 'page-header-common margin-bottom-lg'> My Account</h2>
          </div>
          <div class = 'row margin-bottom-lg'>
              <div class = 'col-md-offset-2 col-md-8'>
                  <div class = 'row my-account-container'>
                      <div class = 'col-md-offset-2 col-md-4'>
                          <h3 class = 'title-roboto-bold margin-bottom-md'>My Account</h3> 
                          <ul class = 'list-unstyled account-menu'>
                              <li><a href="edit_information.php"> - Edit your account information</a></li>
                              <li><a href="password.php"> - Change password</a></li>
                          </ul>
                      </div>
                      <div class = 'col-md-offset-2 col-md-4'>
                          <h3 class = 'title-roboto-bold margin-bottom-md'>My Enquiry</h3>
                          <ul class = 'list-unstyled account-menu'>
                              <li><a href="<?php echo webroot.'enquiry.php?action=enquiry'?>"> - View your enquiry history</a></li>
                              <li><a href="<?php echo webroot.'enquiry.php?action=quotation'?>"> - View your quotation</a></li>
                              <!-- <li><a href="<?php echo webroot.'enquiry.php' ?>">-View your invoice</a></li> -->
                          </ul> 
                      </div>
                  </div>
              </div>
          </div>



            <div class="row" style = 'display:none'>
                <div class="col-sm-6 myAccLeftCol">
                    <h2 class="myAccHeading">My Account</h2>
                    <ul class="list-unstyled myAccUL">
                      <li><a href="<?php echo webroot .'edit_information.php'; ?>">Edit your account information</a></li>
                      <!-- <li><a href="<?php echo webroot?>">Change your password</a></li> -->
                      <li><a href="<?php echo webroot.'login.php?action=logout'?>">Logout</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 myAccRightCol">
                    <h2 class="myAccHeading">My Enquiry</h2>
                    <ul class="list-unstyled myAccUL">
                      <li><a href="<?php echo webroot.'enquiry.php?action=enquiry'?>">View your enquiry history</a></li>
                      <li><a href="<?php echo webroot.'enquiry.php?action=quotation'?>">View your quotation</a></li>
                      <li><a href="<?php echo webroot.'enquiry.php'?>">View your invoice</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.box -->
      <?php include_once 'footer.php';?>
    <?php
    include_once 'js.php';
    
    ?>

    <script>
    $(document).ready(function() {

    });
    function addCart(id){
//        console.log(id);
        $.ajax({
            url: "cart.php?action=add_cart",
            type: "POST",
            data:{pid:id,qty:1},
            beforeSend:function(){
                $('.addCart'+id).addClass("disabled");
                $('.addCart'+id).html('Loading');
            },
            complete:function(){
                $('.addCart'+id).removeClass('disabled');
                $('.addCart'+id).html('Enquiry');
            },
            success:function(result){

                var ttl = JSON.parse(result);

                setTimeout(function () {
                        $('#cart > button').html('<span class="glyphicon glyphicon-shopping-cart"></span> <span id="cart-total">'+ ttl.total +' item(s)</span>');
                }, 100);
                $('#cart').addClass('open');
                $('#cart > ul').load('cart.php?action=get_cart',function(){

                });
            }
        });
    }
    </script>
  </body>
</html>
        <?php
        
    }

}
?>
