<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Industry.php';
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new Industry();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->industry_id = escape($_REQUEST['industry_id']);
    $o->industry_type = escape($_POST['industry_type']);
    $o->industry_desc = escape($_REQUEST['industry_desc']);
    $o->industry_status = escape($_POST['industry_status']);

    switch ($action) {
        case "create":

            if($o->create()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("industry.php?action=edit&industry_id=$o->industry_id",getSystemMsg(1,'Create data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("industry.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":
            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("industry.php?action=edit&industry_id=$o->industry_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("industry.php?action=edit&industry_id=$o->industry_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;
        case "edit":
            if($o->fetchIndustryDetail(" AND industry_id = '$o->industry_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("industry.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("industry.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("industry.php",getSystemMsg(0,'Delete data fail'));
            }
            exit();
            break;
        case "createForm":
            $o->getInputForm('create');
            exit();
            break;
        case "validate_email":
            $t = $gf->checkDuplicate("location",'location_login_email',$o->location_login_email,'location_id',$o->location_id);
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
