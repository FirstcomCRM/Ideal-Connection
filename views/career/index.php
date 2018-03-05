<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | <?=$this->title;?></title>
    <?php 
      include_once 'header.php';
    ?>
  </head>
  <body class="hold-transition" id = "page-career">
      <div class="container container-common margin-bottom-lg">
            <div class = 'row margin-bottom-lg'>
                <?php if( $this->hasFlash() ){ ?>
                    <div class = 'alert alert-success'>
                        <?=$this->getFlash(); ?>
                    </div>
                <?php } ?>
                <div class = 'alert alert-danger' style = 'display:none;'>
                        
                </div>
              
                <div class = 'col-md-7'>
                    <?= html_entity_decode($this->setting_career_content); ?>

<!--                    <div class = 'row margin-top-md'>
                        <div class = 'col-md-12'> 
                            <div class="panel-group margin-bottom-lg" id="accordion">
                                    <div class="panel">
                                        <div class="panel-heading">
                                          <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsee<?php echo $key; ?>">
                                                Position One
                                                <span class = 'icon glyphicon glyphicon-menu-down pull-right'
                                                ></span>
                                            </a>
                                          </h4>
                                        </div>
                                        <div id="collapsee<?php echo $key; ?>" class="panel-collapse collapse">
                                          <div class="panel-body">
                                                <h5 class = 'title-roboto-bold'>- Resposibilities</h5>
                                                <div class = 'text-common'>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </div>
                                                <h5 class = 'title-roboto-bold'>- Requirements</h5>
                                                <div class = 'text-common'>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </div>
                                          </div>
                                        </div>
                                  </div>
    
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class = 'col-md-5 career-container'>
                    <h2 class="page-header-common margin-bottom-md">Apply NOW</h2>
                    <form id = "form-apply"  enctype="multipart/form-data" method = "POST" action = "<?=$this->action_apply;?>" >
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
                            <select id = "customer_position" name = "customer_position" class = 'form-control'>
                                <?=$this->countries;?>
                                <?php foreach ($this->positions as $key => $position) { ?>
                                    <option value = "<?=$position['text']?>"><?=$position['text'];?></option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class = 'form-group'>
                            <textarea rows = "5" class = 'form-control' name="customer_message" class = 'form-control' placeholder = 'Message'><?=$this->customer_message;?></textarea>
                        </div>

                        <p>Attach Resume(.doc, docx, or PDF file only)</p>  
                        <div class = 'form-group'>
                            <input type="file" name="customer_cv">
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
    $('[name="customer_position"]').select2();

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