<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/ServicesType.php'; 
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new ServicesType();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->servicestype_id = escape($_REQUEST['servicestype_id']);
    $o->servicestype_title = escape($_POST['servicestype_title']);
    $o->servicestype_time_start = escape($_POST['servicestype_time_start']);
    $o->servicestype_time_end = escape($_POST['servicestype_time_end']);
    $o->servicestype_duration = escape($_POST['servicestype_duration']);
    $o->servicestype_desc = escape($_POST['servicestype_desc']);
    $o->servicestype_seqno = escape($_POST['servicestype_seqno']);
    $o->servicestype_max = escape($_POST['servicestype_max']);
    $o->servicestype_location = escape($_POST['servicestype_location']);
    
    switch ($action) {
        case "create":
            if($o->create()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("servicestype.php?action=edit&servicestype_id=$o->servicestype_id",getSystemMsg(1,'Create data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("servicestype.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":
            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("servicestype.php?action=edit&servicestype_id=$o->servicestype_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("servicestype.php?action=edit&servicestype_id=$o->servicestype_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;  
        case "edit":
            if($o->fetchServicesDetail(" AND service_id = '$o->servicestype_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("servicestype.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;  
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("servicestype.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("servicestype.php",getSystemMsg(0,'Delete data fail'));
            }
            exit();
            break;   
        case "createForm":
            $o->getInputForm('create');
            exit();
            break;   
        case "validate_email":
            $t = $gf->checkDuplicate("servicestype",'servicestype_login_email',$o->servicestype_login_email,'servicestype_id',$o->servicestype_id);
            if($t > 0){
                echo "false";
            }else{
                echo "true";
            }
            exit();
            break;  
        default: 
            $o->getListing();
            exit();
            break;
    }


