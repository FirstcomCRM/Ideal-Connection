<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Forgot_password.php'; 
    include_once 'admin/class/SavehandlerApi.php';
    
    $o = new Forgot_password();
    $s = new SavehandlerApi();
    $o->save = $s;
    $action = escape($_REQUEST['action']);
    $o->email = escape($_POST['email']);

    // define('CURRENT_FILE',basename(__FILE__, '.php'));
    // debug($url_path);
    // debug(BASE_DIR);
//    debug($_SESSION);
    switch ($action) {
        case "forgot":
            if($o->forgotProcess()){
                $_SESSION["success_msg"] = "<font color = 'green' >A new password has been sent to ".$o->email.". Please check the email.</font>";
                echo json_encode(array('status'=>1,'msg'=>''));
            }else{
                echo json_encode(array('status'=>0,'msg'=>''));
            }
            exit();
            break; 
        default: 
            $o->getInputForm();
            exit();
            break;
    }
?>

