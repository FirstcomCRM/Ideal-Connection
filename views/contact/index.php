<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | <?=$this->title;?></title>
    <?php 
      include_once 'header.php';
    ?>
  </head>
  <body class="hold-transition" id = "page-contact">
      <div class="container container-common margin-bottom-lg">
            <div class = 'row margin-bottom-lg'> 
                <div class = 'col-md-12'>
                      <?=html_entity_decode($this->google_map);?>
                </div>
            </div>
            <div class = 'row'>
                <?php if( $this->hasFlash() ){ ?>
                    <div class = 'alert alert-success'>
                        <?=$this->getFlash(); ?>
                    </div>
                <?php } ?>
                <div class = 'alert alert-danger' style = 'display:none;'>
                        
                </div>
                <div class = 'col-md-4 col-sm-6 col-xs-12 text-center-xs'>
                    <div class="page-header-hr-red"></div>
                    <h2 class="page-header-common margin-bottom-lg"><?=$this->system_name;?></h2>
                    <div class = 'row'>
                        <div class = 'col-md-12'>
                            <?php echo html_entity_decode($this->outlets); ?>
                            <?php foreach ($this->outlets as $key => $outlet) { 
                                // debug($outlet);
                                ?>
<!--                                <h4 class = 'title-roboto-bold-gray'>////<?=$outlet['country_desc'];?></h4>
                                <ul class = 'list-unstyled contact-outlet-ul'>
                                    <li class = 'outlet-address'><img style = 'margin-right:6px' src="public/slicing/contact/location.png">Address: ////<?php echo nl2br($outlet['outl_addr']);?></li>
                                    <li class = 'margin-bottom-lg'><img style = 'margin-right:6px' src="public/slicing/contact/contact.png">Tel: ////<?php echo $outlet['outl_tel'];?></li>
                                </ul>-->
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class = 'col-md-8 col-sm-6 col-xs-12 text-center-xs'>
                    <div class="page-header-hr-red"></div>
                    <h2 class="page-header-common margin-bottom-lg">Leave us a message</h2>
                    <form id = "form-enquiry" method = "POST" action = "<?=$this->action_enquiry;?>" >
                        <div class = 'form-group'>
                            <input value = "<?=$this->customer_name;?>" type="text" name="customer_name" class = 'form-control' placeholder = 'Name'>
                        </div>
                        <div class = 'form-group'>
                            <input value = "<?=$this->customer_email;?>" type="text" name="customer_email" class = 'form-control' placeholder = 'Email'>
                        </div> 
                        <div class = 'form-group'>
                            <input value = "<?=$this->customer_contact;?>"  type="text" name="customer_contact" class = 'form-control' placeholder = 'Contact number'>
                        </div>
                        <div class = 'form-group'>
                            <select name = "customer_country" class = 'form-control'>
                                <?=$this->countries;?>
                            </select>
                        </div> 
                        <div class = 'form-group'>
                            <textarea rows = "5" class = 'form-control' name="customer_message" class = 'form-control' placeholder = 'Message'><?=$this->customer_message;?></textarea>
                        </div>  
                        <button class = 'btn btn-red'>SUBMIT</button>
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
    $('[name="customer_country"]').select2();

    $('#form-enquiry').submit(function(){
        var result = true;
        $.each($(this).serializeArray(),function(i, field){
            if( field.value == "" ) {
                result = false;
            }
        });
        if( !result ){
          $('.alert-danger').fadeOut(0);
          $('.alert-danger').fadeIn();
          $('.alert-danger').html("Please fill in all field to submit");
        }
        return result;
    })
  });

</script>