<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Appointment.php'; 
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new Appointment();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->appointment_id = escape($_REQUEST['appointment_id']);
    $o->appointment_name = escape($_POST['appointment_name']);
    $o->appointment_telephone = escape($_POST['appointment_telephone']);
    $o->appointment_email = escape($_POST['appointment_email']);
    $o->appointment_service_type = escape($_POST['appointment_service_type']);
    $o->appointment_nric = escape($_POST['appointment_nric']);
    $o->appointment_person = escape($_POST['appointment_person']);
    $o->appointment_location = escape($_POST['appointment_location']);
    $o->appointment_date = escape($_POST['appointment_date']);
    $o->appointment_time = escape($_POST['appointment_time']);
    $o->appointment_incharge_person = escape($_POST['appointment_incharge_person']);
    $o->appointment_end_time = escape($_POST['appointment_end_time']);
    $o->appointment_remarks = escape($_POST['appointment_remarks']);
    
    $o->appointment_array = $_POST['appointment_array'];
    $o->appointment_status_array = $_POST['appointment_status_array'];
    
    switch ($action) {
        case "create":
            if($o->create()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("appointment.php?action=edit&appointment_id=$o->appointment_id",getSystemMsg(1,'Create data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("appointment.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":
            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("appointment.php?action=edit&appointment_id=$o->appointment_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("appointment.php?action=edit&appointment_id=$o->appointment_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;  
        case "edit":

            if($o->fetchAppointmentDetail(" AND appointment_id = '$o->appointment_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("appointment.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;  
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("appointment.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("appointment.php",getSystemMsg(0,'Delete data fail'));
            }
            exit();
            break;   
        case "createForm":
            $o->getInputForm('create');
            exit();
            break;   
        case "validate_email":
            $t = $gf->checkDuplicate("appointment",'appointment_login_email',$o->appointment_login_email,'appointment_id',$o->appointment_id);
            if($t > 0){
                echo "false";
            }else{
                echo "true";
            }
            exit();
            break;  
        case "confirmedAppointment":
            $o->confirmedAppointment();
            echo json_encode(array('status'=>1));
            exit();
            break;     
        case "rejectAppointment":
            $o->rejectAppointment();
            rediectUrl("appointment.php",getSystemMsg(1,'Reject Appointment successfully'));
            exit();
            break; 
        case "cancelAppointment":
            $o->cancelAppointment();
            rediectUrl("appointment.php",getSystemMsg(1,'Cancel Appointment successfully'));
            exit();
            break;         
        default: 
            $o->getListing();
            exit();
            break;
    }


