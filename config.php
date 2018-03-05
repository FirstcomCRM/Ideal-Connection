<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { die('Access denied'); };
$sql_debug = 0;
error_reporting(0);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$lang = 'en';
session_start();
date_default_timezone_set("Asia/Singapore"); 
//define('webroot',"http://j2websolution.com/crm/");

define('system_datetime',date('Y-m-d H:i:s'));
define('system_date',date('Y-m-d'));
define('system_gst_percent',7);

//Local Path
define('webroot',"http://localhost/crm/");

//Server Path
//define('webroot',"http://hydraulic-engineer.net/");


define('BASE_DIR', realpath(dirname(__FILE__)));
define('PDF_DOC', BASE_DIR . "/report/");

session_name('sea_hydraulic_frontend');
$_SERVER["PHP_SELF"] = htmlspecialchars($_SERVER["PHP_SELF"]);

$session_expiry_time = time() + (60 * 30); // 30mins expiry ;

$url_path = explode("/",$_SERVER['PHP_SELF']);
//echo 'HERE';
//if($url_path[2] != 'json_api.php'){
//
//if($_SESSION['partner_id'] > 0 && $url_path[3] != 'login.php'){
//    if($_SESSION["empl_login_expiry"] < time()){
//        unset($_SESSION['partner_id']);
//        $_SESSION["error_msg"] = "<font color = 'red' >Your session has expired.</font>";
//        header ("Location: " . webroot . "login.php");
//    }else{
//        if($_SESSION['empl_id'] <= 0 || $url_path[3] == 'index.php'){
//               
//            unset($_SESSION['empl_id']);
//            unset($_SESSION['empl_name']);
//            unset($_SESSION['empl_code']);
//            unset($_SESSION['empl_login_expiry']);  
//            unset($_SESSION['empl_group']);
//            unset($_SESSION['empl_department']);
//            unset($_SESSION['empl_outlet']);  
//            unset($_SESSION['empl_outlet_code']);
//            unset($_SESSION['outl_gst']);
//          $_SESSION["error_msg"] = "<font color = 'red' >Your session has expired.</font>";
////          header ("Location: " . webroot . "home.php");  
//        }
//         
//        $_SESSION["empl_login_expiry"] = $session_expiry_time;
//        unset($_SESSION['error_msg']);
//    }
//}else{
//    
//   unset($_SESSION['empl_id']);
//   
//echo $_SESSION["partner_login_expiry"].'<';
//echo time();
    // print_r( $url_path );
    // die;    

   if(basename($_SERVER['PHP_SELF']) != 'login.php' && isset($_SESSION["partner_login_expiry"]) ){

     if($_SESSION["partner_login_expiry"] < time()){
        $_SESSION["error_msg"] = "<font color = 'red' >Your session has expired. Please login again</font>";
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $cart){
                    if(isset($cart['files1']['name']) && $cart['files1']['name'] != ''){
                        unlink($cart['files1']['new_file_path']);
                    }
                    if(isset($cart['files2']['name']) && $cart['files2']['name'] != ''){
                        unlink($cart['files2']['new_file_path']);
                    }
                    if(isset($cart['files3']['name']) && $cart['files3']['name'] != ''){
                        unlink($cart['files3']['new_file_path']);
                    }
                }
            }
            unset($_SESSION['partner_id']);
            unset($_SESSION['partner_name']);
            unset($_SESSION['partner_email']);
            unset($_SESSION['partner_login_expiry']);  
            unset($_SESSION['partner_group']);  
            unset($_SESSION['partner_outlet']);  
            unset($_SESSION['partner_sales_person_id']);  
            unset($_SESSION['partner_currency_id']);  
            unset($_SESSION['cart']);  
            unset($_SESSION['send_enquiry']);  
            unset($_SESSION['cart_qty_ttl']); 
        header ("Location: " . webroot . "login.php");
     }  
   } else {
        // if( $url_path[2] !=  'login.php' ){
        //     header ("Location: " . webroot . "login.php");
        // }

        
    // echo "Here";
        // header ("Location: " . webroot . "login.php");
        // echo "here?";
        // echo $_SESSION["partner_login_expiry"];
        // die('ficl her?');
   }
//   
//        unset($_SESSION['empl_id']);
//        unset($_SESSION['empl_name']);
//        unset($_SESSION['empl_code']);   
//        unset($_SESSION['empl_login_expiry']);
//        unset($_SESSION['empl_group']);
//        unset($_SESSION['empl_department']);
//        unset($_SESSION['empl_outlet']);  
//        unset($_SESSION['empl_outlet_code']); 
//        unset($_SESSION['outl_gst']);
//}
//}