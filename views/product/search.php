<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | Search</title>
    <?php 
      include_once 'header.php';
    ?>
    
  </head>
  <body class="hold-transition" id = "page-search">
      <div class="container container-common margin-bottom-lg" style = 'min-height: 600px'>
          <div class = 'alert alert-success' style = 'display:none;'></div>
          <h1 class = 'page-header-common'>You are searching for : <?=$this->search_value;?></h1>
          <h3 class = 'page-secondary-header-common margin-bottom-md'>Total of product shown: <?=$this->total_item_searched;?></h3>
          <?php if( $this->total_item_searched != 0 ){ ?>
            <div class = 'row' id = "product-list">
                <?php foreach ($this->searchedProducts as $key => $product) { ?>

                  <?php
                  $image = file_exists("./admin/dist/images/product/".$product['product_id'].".png") ? "./admin/dist/images/product/".$product['product_id'].".png" : 'admin/dist/img/no_image.png';
                  ?>
                    
                      <div class = 'col-sm-2 text-center margin-bottom-sm product-col'>
                          <div class = 'product-container'>
                            <a style = 'text-decoration:none' href="<?=webroot?>product_inner.php?product_id=<?=$product['product_id'];?>">
                              <img src="<?=$image; ?>" class = 'product-img img-thumbnail img-responsive'>
                              <h4 class = 'page-secondary-header-common product-name' ><?=$product['product_code'];?></h4>
                              <h5 class = 'page-secondary-header-common product-specification-title'>Specification</h5>
                              <p class = 'product-specification-text'><?=$product['product_short_desc'];?></p>
                              <?php if( isset($_SESSION['partner_id']) ){ ?>
                              <h5 class = 'page-secondary-header-common product-specification-title'>Country Description</h5>
                              <p class = 'product-country-text'><?=$product['description'];?></p>
                              <?php } ?>
                            </a>
                            <button class = 'btn btn-red btn-enquiry' onclick = addCart("<?=$product['product_id'];?>","<?=$product['product_code'];?>",this) >Enquiry cart</button>
                          </div>
                      </div>
                   
                  
                  <?php } ?>
                </div>

            <?php } else { ?>
                <h4 class = 'margin-top-md title-roboto'> No result for : <?=$this->search_value;?> </h4>
            <?php } ?>
      </div>
  </body>

<?php 
include_once 'js.php';
include_once 'footer.php';
?>
 <script>
  $(document).ready(function() {
    $('#search').val( '<?=$this->search_value;?>' );
  });

  function goBack() {
      window.history.back();
  }

  function addCart(id,product_code,element){
      var thisButton = $(element);
//        console.log(id);
// console.log(element);
      // $('#cart .dropdown-toggle').trigger("click");
      $.ajax({
          url: "cart.php?action=add_cart",
          type: "POST",
          data:{pid:id,qty:1},
          beforeSend:function(){
              thisButton.addClass("disabled");
              thisButton.html('Loading');
          },
          complete:function(){
              thisButton.removeClass('disabled');
              thisButton.html('Enquiry cart');
          },
          success:function(result){
              console.log(result);
              var ttl = JSON.parse(result);
              $('.alert-success').fadeOut(10);
              $('.alert-success').fadeIn();
              var redirectToCart = "<a href = '<?=webroot?>cart.php'>Click here to see you enquiry cart</a>"
              $('.alert-success').html('You have successfully added <strong>'+product_code+'</strong> to your enquiry cart<br>'+redirectToCart);
              // $('.alert-success').html('You have successfully added it to enquiry cart.');


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