<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Register.php'; 
    include_once 'admin/class/SavehandlerApi.php';
    include_once 'admin/class/GeneralFunction.php';
    include_once 'admin/class/SelectControl.php';
    include_once 'class/Notifications.php';
    include_once 'admin/class/Empl.php';


    $o->select = new SelectControl();
    $o = new Register();
    $o->emp = new Empl();
    $o->notification = new Notifications();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;
    $action = escape($_REQUEST['action']);
    $o->partner_id = escape($_REQUEST['partner_id']);
    
    if($action == 'update'){
        $o->fetchPartnerDetail(" AND partner_id = '$o->partner_id'","","",1);
        $o->partner_oldpassword = $o->partner_login_password;
    }
    
    $o->partner_first_name = escape($_POST['partner_first_name']);
    $o->partner_last_name = escape($_POST['partner_last_name']);
    $o->partner_tel = escape($_POST['partner_tel']);
    $o->partner_email = escape($_POST['partner_email']);



    $o->current_tab = escape($_REQUEST['current_tab']);

    
    $o->partner_company_name = escape($_POST['partner_company_name']);
    $o->partner_company_inv_addr = escape($_POST['partner_company_inv_addr']);
    $o->partner_company_del_addr = escape($_POST['partner_company_del_addr']);
    $o->partner_company_country = escape($_POST['partner_company_country']);
    $o->partner_company_tel = escape($_POST['partner_company_tel']);
    $o->partner_company_email = escape($_POST['partner_company_email']);
    $o->partner_company_website = escape($_POST['partner_company_website']);
    $o->partner_company_registration_no = escape($_POST['partner_company_registration_no']);
    

    $o->partner_login_password = escape($_POST['partner_login_password']);
    $o->partner_login_name = escape($_POST['partner_login_name']);


  
    switch ($action) {
        case "create":  
            if($o->create()){
                 // $_SESSION["success_msg"] = "<font color = 'green' >Register Successful. Please login</font>";
                 $_SESSION["success_msg"] = "<font color = 'green' >Please wait for admin approval to make this account available.</font>";
                rediectUrl("login.php");
            }else{
                $_SESSION["error_msg"] = "<font color = 'red' >Register failed. Please contact administrator.</font>";
                rediectUrl("register.php");
            }
            exit();
            break;
        case "createForm":
                $o->getInputForm('create');
            exit();
            break;
        case "validate_name":
            $t = $gf->checkDuplicate("db_partner",'partner_login_name',$o->partner_login_name,'partner_id',$o->partner_id);
            if($t > 0){
                echo "false";
            }else{
                echo "true";
            }
            exit();
            break; 
        default: 
            $o->getInputForm('create');
            exit();
            break;
    }


