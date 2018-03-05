<?php if( $url_path[2] != 'index.php' ){ ?>
<!--<div id = 'footer-banner' style = 'background-image: url("public/slicing/general/banner.jpg");'>
     <img src="public/slicing/general/banner.jpg" class = 'img-responsive'> 
    <h1 class = 'text-center first' >CAN'T FIND WHAT YOUR'RE LOOKING FOR?</h1>
    <div class = 'hr-white'></div>
    <h1 class = 'second'>DROP A MESSAGE</h1>
    <a href="contact.php"><button class = 'btn btn-contact btn-yellow margin-top-md'>CONTACT US</button></a>
</div>-->
<?php } ?>

<footer id = "footer" style = 'background-image:url("public/slicing/general/bg.jpg")'>
        <!--<div >-->
            <a class="contactUsFloatBtn" href="contact.php"><img src="public/slicing/general/search2.png"><br>
            Can't Find What <br>
            You're Looking For ?
            </a>
        <!--</div>-->
    <div class="container">
        <div class="copyrights text-left" style = 'display:inline-block;'>
            <strong>&copy; <?= date('Y');?>  <a href="<?= webroot?>" title = "mycasino188">Sea Hydraulic Engineering Pte. Ltd. </a>.</strong> All rights reserved.
        </div>
        <div  style = 'display:inline-block;float:right'>
        		<ul class = 'list-unstyled right-information' >
        			<li><a href="terms.php">T & C</a></li>
        			<span style = 'margin:0 12px'> | </span>
        			<li><a href="privacy.php">Privacy policy</a></li>
        		</ul>
        </div>
    </div>
</footer>
<?php //debug($_SESSION); ?>