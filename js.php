    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jQuery/jquery.blockUI.js"></script>
    <!-- <script src="plugins/pagination/jquery.simplePagination.js"></script> -->
    <!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>-->
    <script src="admin/plugins/jqueryvalidation/jquery.validate.1.17.js"></script>
    <script src="admin/plugins/select2/select2.full.js"></script>
    <script>
        $(document).ready(function(){
        var url = window.location;
        
        
//        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        
        $('ul.nav a').filter(function() {
//            console.log(url);
//            console.log(this.href);
            console.log(url.pathname.indexOf('cart.php'));
            if(url.pathname.indexOf('product_inner.php')>0 || url.pathname.indexOf('product.php')>0){
                $('ul.nav a[href=\'product.php\']').parent().addClass('active');
            }
            if(url.pathname.indexOf('cart.php')>0){
                $('.contactUsFloatBtn').hide();
            }
             return this.href == url;
        }).parent().addClass('active');
            
            $('#cart button').on('click',function(){
                   $('#cart > ul').load('cart.php?action=get_cart',function(){

                   });

            });
        });



        // @QUOTATION CONFIRM
        $(document).ready(function(){
            const button = $('button[data-order-confirm]');
            const askingText = "Are you sure you want to confirm this order?";
            button.click(function(){
                let result = confirm(askingText);
                if( result ){
                    let order_id = button.attr('data-order-confirm');

                    // console.log(  );
                    window.location.href = "enquiry.php?action=confirm_order&id="+order_id;
                    //execute the command
                }
            })
        }); 
        // @QUOTATION CONFIRM
    </script>