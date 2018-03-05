<?php
    
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/My_account.php'; 


    $o = new My_account();

    $o->save = $s;
    $action = escape($_REQUEST['action']);


  
    switch ($action) {

        default: 
                $o->getMenu();

            exit();
            break;
    }


