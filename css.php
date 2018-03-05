
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" name="viewport">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="plugins/pagination/css/simplePagination.css"> -->
    <link rel="stylesheet" href="admin/plugins/select2/select2.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
<style>
/*body {
          padding-top: 50px;
          position: relative;
      }*/
      
      pre {
          tab-size: 8;
      }
      input.error, textarea.error, select.error {
        border: 1px solid red !important;
    }
    label.error{
        color:red;
    }
    .main-footer{
        margin-top: 30px;
    }
    .signin{
        width: 260px;
        text-transform: uppercase;
        padding: 10px;
        letter-spacing: 1px;
    }
    .signUpBox {
        margin-top: 128px;
    }
    .noPaddingLeft{
        padding-left: 0;
    }
    .noPaddingRight{
        padding-right: 0;
    }
    .margin-top-01{
        margin-top: 5px;
    }
    .margin-top-02{
        margin-top: 15px;
    }
    .margin-top-03{
        margin-top: 25px;
    }
    .margin-top-04{
        margin-top: 35px;
    }
    .margin-top-05{
        margin-top: 45px;
    }
    .navbar .container,header .container{
        min-height: 0;
        background-color: #f8f8f8;
    }
    
    .product_list_container {
        margin-top: 40px;
    }
    
    .product_list_container .image img{
        margin: 0 auto;
        max-height: 250px;
    }

    .product_list_container .image, .product_list_container .product_info{
        width:228px;
        margin: 0 auto;
        text-align: center;
        height: 250px;
    }
    .product_info{
        min-height: 100px;
    }
    .product-layout{
        display: inline-block;
        margin-bottom: 15px;
         /*background-color: #eeeeee;*/
    }
    .product_desc{
        max-height: 60px;
        overflow: hidden;
        height: 60px;
    }
    .product_title p {
        color: #a1a1a1;
    }
    .product_desc{
        color: #a1a1a1;
        margin-bottom: 20px;
    }
    .product_price p{
        font-weight: 500;
        font-size: 1.2em;
    }
    .page-header{
        text-align: center;
    }
    .product_title h3{
        font-size: 1.4em;
        height: 42px;
        overflow: hidden;
        color: black;
       
    }
    #cart > .btn {
        font-size: 12px;
        line-height: 18px;
        color: #FFF;
        background-color:#ff0000;
        /*min-width: 150px;*/
        /*margin: 8px;*/
        display:inline-block;
        padding:13px 0px;
    }
    #cart .dropdown-menu {
        /*min-width: 100px;*/
        position: absolute;;
        width:280px;
        top: 45px;
    }
    #cart .dropdown-menu {
        background: #fff;
        z-index: 10001;
    }
    .dropdown-menu.pull-right {
        right: 0;
        left: auto;
    }
    .product-layout a,.product-layout a:hover,.product-layout a:active,.product-layout a:focus{
        cursor: pointer;
        text-decoration: none;
    }
    .inner_product_info_list li {
        margin: 25px 0px;
    }
    .product_inner_btn_container {
        margin-top: 30px;
    }
    .product_inner_qty {
        display: inline-block;
        width: 100px;
        text-align: center;
    }
    .product_inner_btn{
        width: 145px;
        text-transform: UPPERCASE;
        letter-spacing: 1px;
        padding: 10px;
    }
    
    .cart_empty{
        min-height: 200px;
        padding-top: 50px;
    }
    .btn-group{
        min-width: 100px;
    }
    .removeCartBtn,.updateCartBtn{
        /*float:left;*/
        width: 50px;
        display: inline-block;
    }
    .cart_btn_group{
            /*display: flex;*/
    }
    .vmiddle{
        vertical-align: middle!important;
    }
    .vtop{
        vertical-align: top!important;
    }
    table.cart_table tr td{
        padding: 20px;
        background-color: white;
    }
    .cart_table img{
        width: 225px;
        float: left;
        width: 20%;
    }
    .cart_table img.delete_icon{
        width: 225px;
        float: left;
        width: 32%;
    }
    .cart_table .cart_prodt_info{
        float: left;
        display: inline-block;
        width: 70%;
        padding-left: 25px;
    }
    .cart_table .cart_prodt_name{
        font-weight: 600;
        font-size: 1.2em;
    }
    .cart_table .cart_prodt_name:hover{
        cursor: pointer;
    }
    .cart_table .cart_prodt_desc{
        font-size: 1em;
        color: #a0a0a0;
    }
    .cart_table_mini{
        font-size: 1em;
        width: 88%;
        margin: 15px auto;
    }
    .cart_table_mini tr td{
        padding: 10px!important;
    }
    #page-promotion .cart_table_mini img{
        width: 225px!important;
        float: left!important;
        width: 25%!important;
        height: auto!important;
    }
    .cart_table_mini img{
        width: 225px!important;
        float: left!important;
        width: 25%!important;
    }
    .cart_table_mini .cart_prodt_name{
        font-weight: 600;
        font-size: 1em;
    }
    .cart_table_mini .cart_prodt_desc{
        font-size: .8em;
        color: #a0a0a0;
        padding-top: 2px;
        max-height: 62px;
        overflow: hidden;
    }
    .cart_table_mini .cart_prodt_desc:hover{
        cursor: pointer;
    }
    .cart_table_mini .cart_prodt_info{
        float: left;
        display: inline-block;
        width: 75%;
        padding-left: 25px;
    }
    .loading{
        opacity: 0.4;
        pointer-events: none;
        user-select:none;
    }
    #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 150px;
      height: 150px;
      margin: -75px 0 0 -75px;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 1s linear infinite;
      animation: spin 1s linear infinite;
      display: none;
    }
    
    .myAccUL {
        margin-top: 20px;
    }
    
    .myAccHeading {
        font-size: 1.4em;
        color: #253858;
        font-weight: 600;
    }
    
    .myAccUL {
        margin-top: 20px;
    }
    .myAccUL li {
        margin-bottom: 15px;
    }
    .myAccLeftCol {
        padding-left: 8%;
    }
    
    .myAccRightCol {
        padding-left: 15%;
        border-left: 1px solid #cbcbcb;
        padding-bottom: 110px;
    }
    
    .control-label{
        text-align: left!important;
    }
    tr.lineTop{
        border-top: 2px solid #a8a8a8;
    }
    
    .sort_number h4{
        float:right;
        margin-right: 20px;
    }
    .sort_number .dropdown{
        float:right;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 1s;
      animation-name: animatebottom;
      animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
      from { bottom:-100px; opacity:0 } 
      to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom { 
      from{ bottom:-100px; opacity:0 } 
      to{ bottom:0; opacity:1 }
    }
    /*  Bootstrap Clearfix */

    /*  Tablet  */
  
      
      @media screen and (max-width: 768px) {
          .side-collapse-container{
              width:100%;
              position:relative;
              left:0;
              transition:left .4s;
          }
          .side-collapse-container.out{
              left:200px;
          }
          .side-collapse {
              top:50px;
              bottom:0;
              left:0;
              width:200px;
              position:fixed;
              overflow:hidden;
              transition:width .4s;
          }
          .side-collapse.in {
              width:0;
          }
          .text-center-xs{
              text-align: center;
          }
      }
      
</style>

<link rel="stylesheet" type="text/css" href="public/css/style.css">