<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | <?=$this->title;?></title>
    <?php 
      include_once 'header.php';
    ?>
    
  </head>
  <body class="hold-transition" id = "page-promotion">
      <div class="container container-common margin-bottom-lg">
            <div class = 'row'>
                <?php 
//                debug(getcwd());
                foreach ($this->promotions as $key => $promotion) { 
                    if(file_exists("admin/dist/images/promotion/".$promotion['promotion_id'].".png")){
                            $img_url = "admin/dist/images/promotion/".$promotion['promotion_id'].".png";;
                        } else{
                            $img_url = "admin/dist/img/no_image.png";
                        }
                    ?>
                    <div class = 'col-md-6 margin-bottom-md promotion_box text-center-xs'>
                        <div class = 'img-container'>
                           <img src="<?=$img_url;?>" class = 'img img-responsive' alt = "Promotion image">
                        </div>
                        <h3 class = 'title margin-bottom-sm uppercase page-secondary-header-common'><?=$promotion['promotion_name'];?></h3>
                        <div class = 'content text-common'>
                            <?php echo nl2br($promotion['promotion_desc']);?>
                        </div>
                        <p class = 'margin-top-sm text-common'><strong>Date: </strong> <?php echo format_date($promotion['promotion_from']);?> - <?=format_date($promotion['promotion_to']);?></p>
                        <!--<p class = 'text-common'><strong>Location: </strong> <?=$promotion['address'];?></p>-->
                        <a href="<?=$promotion['promotion_link'];?>"><button class = 'btn btn-red margin-top-sm'>SHOP NOW</button></a>
                    </div>
                <?php }?>
                
            </div>
            
               
      </div>
  </body>

<?php 
include_once 'js.php';
include_once 'footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('[name="customer_country"]').select2();

    $('#form-apply').submit(function(){
        var result = true;
        $.each($(this).serializeArray(),function(i, field){
            if( field.value == "" ) {
                result = false;
            }
        });
        if( !result ){
          $('.alert-danger').fadeOut(0);
          $('.alert-danger').fadeIn();
          $('.alert-danger').html("All fields are required to enquire");
        }
        return result;
    })
  });

</script>