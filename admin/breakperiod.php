<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/BreakPeriod.php'; 
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new BreakPeriod();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->breakperiod_id = escape($_REQUEST['breakperiod_id']);
    $o->service_type = escape($_POST['service_type']);
    $o->breakperiod_title = escape($_POST['breakperiod_title']);
    $o->breakperiod_startdate = escape($_POST['breakperiod_startdate']);
    $o->breakperiod_enddate = escape($_POST['breakperiod_enddate']);
    $o->breakperiod_time_start = escape($_POST['breakperiod_time_start']);
    $o->breakperiod_time_end = escape($_POST['breakperiod_time_end']);
    $o->breakperiod_desc = escape($_POST['breakperiod_desc']);
    $o->breakperiod_daytype = escape($_POST['breakperiod_daytype']);
    $o->breakperiod_location = escape($_POST['breakperiod_location']);

    
    switch ($action) {
        case "create":
            if($o->create()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("breakperiod.php?action=edit&breakperiod_id=$o->breakperiod_id",getSystemMsg(1,'Create data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("breakperiod.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":
            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("breakperiod.php?action=edit&breakperiod_id=$o->breakperiod_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("breakperiod.php?action=edit&breakperiod_id=$o->breakperiod_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;  
        case "edit":
            if($o->fetchBreakPeriodDetail(" AND breakperiod_id = '$o->breakperiod_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("breakperiod.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;  
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("breakperiod.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("breakperiod.php",getSystemMsg(0,'Delete data fail'));
            }
            exit();
            break;   
        case "createForm":
            $o->getInputForm('create');
            exit();
            break;   
        case "validate_email":
            $t = $gf->checkDuplicate("breakperiod",'breakperiod_login_email',$o->breakperiod_login_email,'breakperiod_id',$o->breakperiod_id);
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


