<?php


    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Inventory.php'; 
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';

    $o = new Inventory();
    $s = new SavehandlerApi();
    
    $o->save = $s;
    $o->files = $_FILES['files'];
    
    $o->inventory_id = escape($_REQUEST['inventory_id']);
    $o->inventory_item_name = escape($_POST['inventory_item_name']);
    $o->inventory_item_price = escape($_POST['inventory_item_price']);
    $o->inventory_item_quantity = escape($_POST['inventory_item_quantity']);
    $o->inventory_item_owner = escape($_POST['inventory_item_owner']);
    $o->inventory_item_location = escape($_POST['inventory_item_location']);
    $o->inventory_item_status = escape($_POST['inventory_item_status']);
    $o->inventory_item_desc = escape($_POST['inventory_item_desc']);
    $o->image_input = $_FILES['image_input'];
    
    
    $action = escape($_REQUEST['action']);

    
    switch ($action) {
        case "create":
            if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){
                if($o->create()){
                    $_SESSION['status_alert'] = 'alert-success';
                    $_SESSION['status_msg'] = "Create success.";
                    rediectUrl("inventory.php",getSystemMsg(1,'Create data successfully'));
                }
                else{
                    $_SESSION['status_alert'] = 'alert-error';
                    $_SESSION['status_msg'] = "Create fail.";
                    rediectUrl("inventory.php",getSystemMsg(0,'Create data fail'));
                }
            }else{
                    $_SESSION['status_alert'] = 'alert-error';
                    $_SESSION['status_msg'] = "Create fail.";
                    rediectUrl("inventory.php",getSystemMsg(0,'Permission Denied'));
            }
            exit();
            break;
        case "update":
            if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                if($o->update()){
                    $_SESSION['status_alert'] = 'alert-success';
                    $_SESSION['status_msg'] = "Update success.";
                    rediectUrl("inventory.php",getSystemMsg(1,'Update data successfully'));
                }else{
                    $_SESSION['status_alert'] = 'alert-error';
                    $_SESSION['status_msg'] = "Update fail.";
                    rediectUrl("inventory.php?action=edit&category_id=$o->category_id",getSystemMsg(0,'Update data fail'));
                }
            }else{
                    $_SESSION['status_alert'] = 'alert-error';
                    $_SESSION['status_msg'] = "Create fail.";
                    rediectUrl("inventory.php",getSystemMsg(0,'Permission Denied'));
            }
            exit();
            break;  
        case "edit":
            if(($o->fetchInventoryItemDetail(" AND inventory_id = '$o->inventory_id'","","",1)) && ($o->inventory_id > 0)){
                $o->showInventoryItemForm("update");
            }
            exit();
        case "delete":
            if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                if($o->delete()){
                    $_SESSION['status_alert'] = 'alert-success';
                    $_SESSION['status_msg'] = "Delete success.";
                    rediectUrl("inventory.php",getSystemMsg(1,'Delete data successfully'));
                }else{
                    $_SESSION['status_alert'] = 'alert-error';
                    $_SESSION['status_msg'] = "Delete fail.";
                    rediectUrl("inventory.php",getSystemMsg(0,'Delete data fail'));
                }
            }else{
                    $_SESSION['status_alert'] = 'alert-error';
                    $_SESSION['status_msg'] = "Delete fail.";
                    rediectUrl("inventory.php",getSystemMsg(0,'Permission Denied'));
            }
            exit();
            break; 
        case "createForm":
            $o->showInventoryItemForm('create');
            exit();
            break;   
        default:    
            $o->getListing();
    }    