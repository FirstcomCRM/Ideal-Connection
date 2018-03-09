<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Customer.php';
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new Customer();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->partner_id = escape($_REQUEST['partner_id']);
    $o->partner_account_name1 = escape($_REQUEST['partner_account_name1']);
    $o->partner_code = escape($_REQUEST['partner_code']);
    $o->partner_name = escape($_REQUEST['partner_name']);
    $o->partner_bill_address = escape($_REQUEST['partner_bill_address']);
    $o->partner_ship_address = escape($_REQUEST['partner_ship_address']);
    $o->partner_sales_person = escape($_REQUEST['partner_sales_person']);
    $o->partner_tel = escape($_REQUEST['partner_tel']);
    $o->partner_tel2 = escape($_REQUEST['partner_tel2']);
    $o->partner_fax = escape($_REQUEST['partner_fax']);
    $o->partner_email = escape($_REQUEST['partner_email']);
    //$o->partner_remark = escape($_REQUEST['partner_remark']);
    //  $o->location_desc = escape($_POST['location_desc']);
    $o->partner_remark = escape($_POST['partner_remark']);
    $o->partner_postal_code = escape($_REQUEST['partner_postal_code']);
    $o->partner_ic_number = escape($_REQUEST['partner_ic_number']);
    $o->partner_acra_date = escape($_REQUEST['partner_acra_date']);
    $o->partner_pic_url = $_FILES['partner_pic_url'];
    //  $o->image_input = $_FILES['image_input'];



    switch ($action) {
        case "create":
            if($o->create()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("customer.php?action=edit&partner_id=$o->partner_id",getSystemMsg(1,'Create data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("customer.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":

            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("customer.php?action=edit&partner_id=$o->partner_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("customer.php?action=edit&partner_id=$o->partner_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;
        case "edit":
            if($o->fetchCustomerDetail(" AND partner_id = '$o->partner_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("customer.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("customer.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("customer.php",getSystemMsg(0,'Delete data fail'));
            }
            exit();
            break;
        case "createForm":
            $o->getInputForm('create');
            exit();
            break;
        case "validate_email":
            $t = $gf->checkDuplicate("customer",'customer_login_email',$o->customer_login_email,'customer_id',$o->customer_id);
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
