<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Login.php'; 
    include_once 'admin/class/SavehandlerApi.php';
    
    $o = new Login();
    $s = new SavehandlerApi();
    $o->save = $s;
    $action = escape($_REQUEST['action']);
    $o->login_email = escape($_POST['email']);
    $o->login_password = escape($_POST['password']);
    $o->login_type = escape($_POST['login_type']);
    $o->login_name = escape($_POST['name']);

    // define('CURRENT_FILE',basename(__FILE__, '.php'));
    // debug($url_path);
    // debug(BASE_DIR);
//    debug($_SESSION);
    switch ($action) {
        case "login":
            if($o->loginProcess()){
                if(isset($_SESSION['send_enquiry'])){
                    echo json_encode(array('status'=>1,'menu_path'=>'cart.php?action=saveCartToDB','msg'=>$o->msg));
                } else {
                    echo json_encode(array('status'=>1,'menu_path'=>'index.php','msg'=>$o->msg));
                }
            }else{
                echo json_encode(array('status'=>0,'msg'=>$o->msg));
            }
            exit();
            break;
        case "logout":
            //remove upload files
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
//            unset($_SESSION['empl_group']);
//            unset($_SESSION['empl_department']);
//            unset($_SESSION['empl_outlet']);  
//            unset($_SESSION['empl_outlet_code']);  
//            unset($_SESSION['outl_gst']); 
            $_SESSION["success_msg"] = "<font color = 'green' >Success Logout.</font>";
            
            header ("Location: " . webroot . "login.php");
//             echo '<script>window.location="login.php"</script>';
            exit();
            break;   
        default: 
            $o->getInputForm();
            exit();
            break;
    }
?>

