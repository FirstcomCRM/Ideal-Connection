<?php
    include_once 'connect.php';
    include_once 'config.php';
    include_once 'include_function.php';
    include_once 'class/Base.php';
    include_once 'class/About.php'; 
    include_once 'admin/class/SavehandlerApi.php';
    include_once 'admin/class/Setting.php';

    
    $about = new About();
    $s = new SavehandlerApi();
    $about->save = $s;
    $about->setting = new Setting();
    $about->content = $about->setting->getSetting()['setting_about_content'];
    $action = isset($_REQUEST['action']) ? escape($_REQUEST['action']) : "";
   



    switch ($action) {
        default: 
            $about->index();
            exit();
            break;
    }
?>

