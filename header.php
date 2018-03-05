<?php
//$sub = explode("/", $_SERVER["REQUEST_URI"])[1];
include_once 'connect.php';
include_once 'config.php';
include_once 'include_function.php';
//include_once 'admin/class/SelectControl.php';
include_once 'js.php';
include_once 'css.php';
//include_once 'admin/class/Setting.php';
//$module->setting = new Setting();
//$settings = $module->setting->getSetting();
//$contact = $settings['setting_contact'];

// debug($_SESSION);


?>
<header>
<div class="container">
    <!--<div style = 'clear:both'></div>-->
    <div class="col-sm-4 remove_padding">
        <nav class="navbar navbar-fixed">
          <div class="row">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">Booking</a></li>
                  <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
          </div>          
        </nav>
    </div>
    <div class="col-sm-4">
        <div class="">
            <a class="navbar-brand remove_padding" href="<?=webroot?>">
                <img src="public/slicing/general/logoc.png" class = 'center_image'>
            </a>
        </div>
    </div>
    <div class="col-sm-4 remove_padding">
          <nav class="navbar navbar-fixed-top">
          <div class="row">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="about.php">Sign In</a></li>
                  <li><a href="about.php">Register</a></li>
                </ul>
            </div>
          </div>          
        </nav>
    </div>
</div>

</header>
<script type="text/javascript">
  // $(window).scroll(function (event) {
  //     var scroll = $(window).scrollTop();
  //     if (scroll > 170) { // you can adjust the variables here
  //     $('.navbar').css('position', 'fixed');
  //   } else {
  //     $('.navbar').css('position', 'relative');
  //   }
  // });

      $('#search').keyup(function(event){
        const keycode = event.keyCode;
        const value   = $(this).val();
        if( keycode == 13 ){ // enter
            searchFunction( value );
        }
      });
      $('.img-search').click(function(){
          searchFunction( $('#search').val() );
      })
      function searchFunction(value){
          var url = 'product.php?action=search&s='+value;
          window.location.href = url;
          // var url = 'product.php?action=search&s='+value;
          // $.ajax({
          //   url:url,
          //   method:'GET',
          //   dataType:'json',
          //   success:function(response){
          //       console.log(response);
          //   }
          // })
      }
      
</script>
