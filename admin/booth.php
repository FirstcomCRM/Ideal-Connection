<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Booth.php'; 
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new Booth();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->booth_id = escape($_REQUEST['booth_id']);
    $o->booth_title = escape($_POST['booth_title']);
    $o->booth_left = escape($_POST['booth_left']);
    $o->booth_right = escape($_POST['booth_right']);
    $o->booth_location = escape($_POST['booth_location']);
    $o->booth_address = escape($_POST['booth_address']);
    $o->booth_unit_no = escape($_POST['booth_unit_no']);
    $o->booth_floor = escape($_POST['booth_floor']);
    $o->booth_price = escape($_POST['booth_price']);
    $o->booth_status = escape($_POST['booth_status']);
    $o->booth_desc = escape($_POST['booth_desc']);

    $o->image_input = $_FILES['image_input'];
    $o->image_id = escape($_REQUEST['image_id']);
    $o->file_name = escape($_REQUEST['file_name']); 
    
    $o->current_tab = escape($_REQUEST['current_tab']);
    
    switch ($action) {
        case "create":
            if($o->create()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("booth.php?action=edit&booth_id=$o->booth_id",getSystemMsg(1,'Create data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("booth.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":
            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("booth.php?action=edit&booth_id=$o->booth_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("booth.php?action=edit&booth_id=$o->booth_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;  
        case "edit":
            if($o->fetchBoothDetail(" AND booth_id = '$o->booth_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("booth.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;  
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("booth.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("booth.php",getSystemMsg(0,'Delete data fail'));
            }
            exit();
            break;   
        case "createForm":
            $o->getInputForm('create');
            exit();
            break;   
        case "getDetail":
            $table = $_POST['table'];
            $main_field = $_POST['main_field'];
            $field_id = $_POST['field_id'];
            $field = $_POST['field'];
            $data = $gf->getDetail($table,$field,$main_field,$field_id);
            echo json_encode(array('data'=>($data)));
            exit();
            break;   
        case "uploadImage":
            $o->saveImage();
            rediectUrl("booth.php?action=edit&booth_id=$o->booth_id&current_tab=image",getSystemMsg(1,'Upload image successfully'));
            exit();
            break;
        case "deleteImage":
            $o->deleteImage();
            rediectUrl("booth.php?action=edit&booth_id=$o->booth_id&current_tab=image",getSystemMsg(1,'Delete image successfully'));
            exit();
            break; 
        case "setMainImage":
            if($o->setMain()){
                echo json_encode(array('status'=>1));
            }
            exit();
            break;
        default: 
            $o->getListing();
            exit();
            break;
    }


