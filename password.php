<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Base.php';
    include_once 'class/Password.php'; 
    include_once 'admin/class/SavehandlerApi.php';
    include_once 'admin/class/Partner.php';
    include_once 'admin/class/SelectControl.php';
    // include_once 'admin/class/Setting.php';

    
    $module = new Password();
    $module->partner = new Partner();
    $s = new SavehandlerApi();
    $select = new SelectControl();
    $module->savehandlerApi = $s;
    $module->title = "Update your password";
    $action = isset($_REQUEST['action']) ? escape($_REQUEST['action']) : "";
    

    
    // debug( $module->partner );
    $module->partner_id = $_SESSION['partner_id'];
    $module->partner_login_password = $_POST['partner_login_password'];
    // debug($module);
    switch ($action) {
        case 'checkpassword':
            $module->partner_login_password = $_POST['old_password'];
            $module->checkPassword();
            break;
        case 'update':

            if( $module->update() ){
                $module->setFlash("You have successfully updated your password.");
                echo json_encode(array(
                    "success"=>1
                ));
                // die;
            }else {
                 echo json_encode(array(
                    "success"=>0
                ));
            }
            // header('Location:' . webroot . "password.php");
            break;
        default: 
            $module->index();
            exit();
            break;
    }
?>

