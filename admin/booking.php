<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Booking.php';
    include_once 'class/SavehandlerApi.php';
    include_once 'class/GeneralFunction.php';
    $o = new Booking();
    $s = new SavehandlerApi();
    $gf = new GeneralFunction();
    $o->save = $s;

    $action = escape($_REQUEST['action']);
    $o->book_id = escape($_REQUEST['book_id']);
    $o->book_name = escape($_POST['book_name']);
    $o->book_telephone = escape($_POST['book_telephone']);
    $o->book_email = escape($_POST['book_email']);
    $o->book_service_type = escape($_POST['book_service_type']);
    $o->book_nric = escape($_POST['book_nric']);
    $o->book_person = escape($_POST['book_person']);
    $o->book_location = escape($_POST['book_location']);
    $o->book_date = escape($_POST['book_date']);
    $o->book_time = escape($_POST['book_time']);
    $o->book_incharge_person = escape($_POST['book_incharge_person']);
    $o->book_end_time = escape($_POST['book_end_time']);
    $o->book_remarks = escape($_POST['book_remarks']);

    $o->appointment_array = $_POST['appointment_array'];
    $o->appointment_status_array = $_POST['appointment_status_array'];

    $o->book_salesperson = escape($_POST['book_salesperson']);
    $o->book_address = escape($_POST['book_address']);
    $o->book_booth_id = escape($_POST['book_booth_id']);

    switch ($action) {
        case "create":

            if($o->create()){

                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Create success.";
                rediectUrl("booking.php?action=edit&book_id=$o->book_id",getSystemMsg(1,'Create data successfully'));
            }else{

                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Create fail.";
                rediectUrl("booking.php",getSystemMsg(0,'Create data fail'));
            }
            exit();
            break;
        case "update":
            if($o->update()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Update success.";
                rediectUrl("booking.php?action=edit&book_id=$o->book_id",getSystemMsg(1,'Update data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Update fail.";
                rediectUrl("booking.php?action=edit&book_id=$o->book_id",getSystemMsg(0,'Update data fail'));
            }
            exit();
            break;
        case "edit":

            if($o->fetchAppointmentDetail(" AND book_id = '$o->book_id'","","",1)){
                $o->getInputForm("update");
            }else{
               rediectUrl("booking.php",getSystemMsg(0,'Fetch Data fail'));
            }
            exit();
            break;
        case "delete":
            if($o->delete()){
                $_SESSION['status_alert'] = 'alert-success';
                $_SESSION['status_msg'] = "Delete success.";
                rediectUrl("booking.php",getSystemMsg(1,'Delete data successfully'));
            }else{
                $_SESSION['status_alert'] = 'alert-error';
                $_SESSION['status_msg'] = "Delete fail.";
                rediectUrl("booking.php",getSystemMsg(0,'Delete data fail'));
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
            rediectUrl("booking.php",getSystemMsg(1,'Reject Booking successfully'));
            exit();
            break;
        case "cancelAppointment":
            $o->cancelAppointment();
            rediectUrl("booking.php",getSystemMsg(1,'Cancel Booking successfully'));
            exit();
            break;
        default:
            $o->getListing();
            exit();
            break;
    }
