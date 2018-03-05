<?php
$mandatory = "<font color = 'red'>*</font>";
validation_magic_text();
//$com_info = getCompanyInfo();
//
//
//$quotation_tnc = <<<EOF
// Excluded mobile scafolding and stagging work.
// All quantities based on final site measurment.
// All works carry without paint finish.
// All amount shown is subject to GST.
//EOF;
//$progressclaim_tnc = <<<EOF
//Your kind attention and early settlement for the above would be very much appreciated.
//EOF;
//if($_SESSION['customer_id'] > 0){
//    $customer_id = escape($_SESSION['customer_id']);
//    $sql = "SELECT COUNT(*) as total FROM customer WHERE customer_id = '$customer_id'";
//    $query = mysql_query($sql);
//    $total = 0;
//    if($row = mysql_fetch_array($query)){
//        $total = $row['total'];
//    }else{
//        $total = 0;
//    }
//    if($total != 1){
//       header ("Location: " . webroot . "404.php"); 
//       session_destroy();
//    }
//}


//check permission 
//    if($_SERVER['HTTP_X_REQUESTED_WITH'] != "XMLHttpRequest"){
//        $_SESSION[$_SESSION['user_login_id']] = 0;
//        $file_server_name = explode('/',$_SERVER["PHP_SELF"]);
//        $sql = "SELECT menu_id FROM db_menu WHERE menu_path = '{$file_server_name[2]}' ";
//        $query = mysql_query($sql);
//        while($row = mysql_fetch_array($query)){
//           $prm = getWindowPermission($row['menu_id'],'access');
//            if(!$prm){
//                unset($_SESSION['empl_id']);
//                unset($_SESSION['empl_name']);
//                unset($_SESSION['empl_code']);
//                unset($_SESSION['empl_login_expiry']);  
//                unset($_SESSION['empl_group']);
//                unset($_SESSION['empl_department']);
//                unset($_SESSION['empl_outlet']);  
//                unset($_SESSION['empl_outlet_code']);  
//              rediectUrl("login.php",getSystemMsg(0,'Sorry,Permission Denied.</br>Please Contact With Your Administrator.'));  
//
//              exit();
//            }
//        }
//    }
function getCompanyInfo(){

    if($_SESSION['empl_outlet'] == 14){
        $wherestring = " AND cprofile_id = '2'";
    }else{
        $wherestring = " AND cprofile_id = '1'";
    }
    $sql = "SELECT * FROM db_cprofile WHERE cprofile_id > 0 $wherestring";
    $query = mysql_query($sql);
    $com_info = mysql_fetch_array($query);

    if($com_info['cprofile_contactemail'] == ""){
       $com_info['cprofile_contactemail'] = $com_info['cprofile_email']; 
    }
    return $com_info;
}
function getDataBySql($field,$table,$wherestring,$orderby){
    $sql = "SELECT $field FROM $table $wherestring $orderby";
//    echo $sql;
    $query = mysql_query($sql);
    return $query;
}
function getDataCodeBySql($field,$table,$wherestring,$orderby){
    $sql = "SELECT $field FROM $table $wherestring $orderby";
//    echo $sql;
    $query = mysql_query($sql);
    if($row = mysql_fetch_array($query)){
        return $row["$field"];
    }else{
        return null;
    }
}
function getDataCountBySql($table,$wherestring){
    $sql = "SELECT count(*) as total FROM $table $wherestring ";
//    echo $sql;
    $query = mysql_query($sql);
    if($row = mysql_fetch_array($query)){
        return $row["total"];
    }else{
        return 0;
    }
}
function getAllDataBySql($field,$table,$wherestring,$orderby,$single = ''){
    $sql = "SELECT $field FROM $table $wherestring $orderby";
//    echo $sql;
    $data = [];
    $query = mysql_query($sql);
    if(mysql_num_rows($query) > 0){
        while($row = mysql_fetch_array($query)){
            if($single != ''){
                $data[] = $row["$field"];
            } else {
                $data[] = $row;
            }
        }
    }
    return $data;
}
function num_format($sIn){
    return number_format($sIn, 2, ".", ",");
}
function validation_magic_text(){
   foreach($_REQUEST as $datas => $data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
         $_REQUEST[$datas] = escape($data);
   }
   return $data;
}
function escape($sTemp){
    if (get_magic_quotes_gpc()){
        $sTemp = stripslashes($sTemp);
    }

    $sTemp = mysql_real_escape_string($sTemp);
    $sTemp = rescape($sTemp);
    return $sTemp;
}
function rescape($sTemp){
    return htmlentities($sTemp, ENT_COMPAT, 'UTF-8'); 
}
function getData($table,$wherestring,$field_get){
    $sql = "SELECT $field_get FROM $table $wherestring ";
    $query = mysql_query($sql);
    
    return $query;
}
function rediectUrl($url,$msg,$time=1){
    global $include_webroot;
    

        header("Refresh: $time;url=$url");
        include_once 'css.php';
               echo <<<EOF
    
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
   	

EOF;
        echo $msg;
        exit();
}
function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function getSystemMsg($status,$type){
     global $include_webroot;
     
    if($status == 1){
        $html .= <<<EOF
              <div class="box-content">   
                <div align = 'center' class="alert alert-success">
                          <strong>$type .</strong>
                </div>  
              </div>
EOF;
                
    }else if($status == 0){
        $html .= <<<EOF
              <div class="box-content">   
                <div align = 'center' class="alert alert-error">
                          <strong>$type .</strong>
                </div>  
              </div>
EOF;
        
    }
    
    return $html;
}
function get_prefix_value($refn_name,$use = false,$document_date,$subprefix = ""){
        
        

        // get the current value first
        $sql = "SELECT * FROM db_refn WHERE refn_name = '$refn_name'";
        $query = mysql_query($sql);
        if($row = mysql_fetch_array($query)){
            // gets current value
            $current_value = $row['refn_value'];
            $return_value = $row['refn_value'];
            $refn_prefix = $row['refn_prefix'];
            $refn_length = $row['refn_length'];
            if($refn_length <= 0){
                $refn_length = 5;
            }
            // increments current value
            $new_value = intval(intval($current_value) + 1);

            if($use){
                // updates the new value back into the database
                $sql = "UPDATE db_refn SET refn_value = '$new_value' WHERE refn_name = '$refn_name'";
                if (mysql_query($sql)){

                    // before returning value to user, applies padding (if required)
                   $return_value = str_pad($return_value,$refn_length, "0", STR_PAD_LEFT);
                    // returns the current value to the user.
                    return $refn_prefix . $subprefix .  $return_value;
                }else{
                    return -1;
                }
            }else{ 
                    //display value only
                    // before returning value to user, applies padding (if required)
                   $return_value = str_pad($return_value,$refn_length, "0", STR_PAD_LEFT);
//                   $return_value = $refn_prefix . $return_value;
                   
                   if($refn_name == 'Order' || $refn_name == "Offer" || $refn_name == "Delivery Order" || $refn_name == "Tax Invoice" || $refn_name == "Purchase Order"){
                  //  $return_value = $refn_prefix . date("Y",strtotime($document_date)) . " - " . $return_value;

                   }
                    // returns the current value to the user.
                   if($subprefix != ""){
                       return $refn_prefix . $subprefix .  $return_value;
                   }else{
                       return $refn_prefix . $return_value;
                   }
                    
            }
        }else{
            return -1;
        }
}
    function getListingStatus($status){

        switch ($status) {
        case 1:
            echo "<span class='label label-success'>Active</span>";
        break;
        case 0:
            echo "<span class='label label-important'>In-Active</span>";   
        break;
        default:
            echo "<span class='label label-warning'>Un-know status</span>";   
        break;
        }
    }
    function getWindowPermission($menu_id,$status){
    $group_id = $_SESSION["empl_group"];
    if($group_id == -1 && $_SESSION['empl_code'] == 'Webmaster' && $_SESSION['empl_id'] == 10000){
        return true;
    }
    $sql1 = "SELECT COUNT(*) as total 
                FROM db_menuprm 
                WHERE menuprm_prmcode = '$status' AND 
                menuprm_menu_id = '$menu_id' AND menuprm_group_id = '$group_id'";
    $query1 = mysql_query($sql1);
    $user_prm = array();
    $total = 0;
    if($row1 = mysql_fetch_array($query1)){
        $total = $row1['total'];
    }else{
        $total = 0;
    }
    $total1 = 1;
    if($status != 'access'){
       $sql2 = "SELECT COUNT(*) as total 
                FROM db_menuprm WHERE menuprm_prmcode = 'access' AND 
                menuprm_menu_id = '$menu_id' AND menuprm_group_id = '$group_id'";
       $query2 = mysql_query($sql2); 
       $total1 = 0;
        if($row2 = mysql_fetch_array($query2)){
            $total1 = $row2['total'];
        }else{
            $total1 = 0;
        }
    }
    if($status == 'generate'){
       $total1 = 1;//if is generate then we allow 
    }
    if($total > 0 && $total1 > 0){
        return true;
    }else{
        return false;
    }
}
function generateTimeSheet($from,$to,$plus,$selectvalue){
    $html = "";
    $newfrom = $from;
    for($i=0;$i<$to;$i++){
        if($i > 0){
            $newfrom = date("H.i", strtotime($newfrom)+(60*$plus));
        }else{
            $newfrom = date("H.i", strtotime($newfrom));
        }
        if($selectvalue == $newfrom){
            $selected = " SELECTED";
        }else{
            $selected = " ";
        }
        $html .= "<option value = '$newfrom' $selected>$newfrom</option>";  
    }
    return $html;
}
function checkMenuChildren($wherestring){
    $sql = "SELECT COUNT(*) as total FROM db_menu WHERE $wherestring";
    $query = mysql_query($sql);
    if($row = mysql_fetch_array($query)){
        $total = $row['total'];
    }else{
        $total = 0;
    }
    return $total;
}
function format_date($datetime, $separator="-"){
    if ((strcasecmp($datetime, "0000-00-00") == 0) || (strcasecmp($datetime, "0000-00-00 00:00:00") == 0)){
        return "";
    }else{
        if (substr_count($datetime, "-") >= 2){
            $timestamp = get_timestamp($datetime);
        }else{
            $timestamp = $datetime;
        }
        return date("d" . $separator . "M" . $separator . "Y", $timestamp);
    }
}
function format_datetime($datetime, $separator="-"){
    if(strcasecmp($datetime, "0000-00-00 00:00:00") != 0){
        $timestamp = get_timestamp($datetime);
        return date("d" . $separator . "M" . $separator . "Y H:i", $timestamp);
    }else{
	    return "";
    }
}
function format_date_database($datetime){
   $timestamp = strtotime($datetime);
   $new_date_format = date('Y-m-d', $timestamp);
   if($new_date_format == '1970-01-01'){
       return "";
   }else{
       return $new_date_format;
   }
   
}
function get_timestamp($datetime){
    $arr_datetime = explode(" ", $datetime);
    if (sizeof($arr_datetime) >= 2){
        $arr_time = explode(":", $arr_datetime[1]);
        if (sizeof($arr_time) >= 3){
            $hour = $arr_time[0];
            $minute = $arr_time[1];
            $second = $arr_time[2];
        }else{
            $hour = 0;
            $minute = 0;
            $second = 0;
        }
        $arr_date = explode("-", $arr_datetime[0]);
    }else{
        $hour = 0;
        $minute = 0;
        $second = 0;
        $arr_date = explode("-", $datetime);
    }
    $timestamp = mktime($hour, $minute, $second, $arr_date[1], $arr_date[2], $arr_date[0]);
    return $timestamp;
}
function translateToWords($number) {
/*****
     * A recursive function to turn digits into words
     * Numbers must be integers from -999,999,999,999 to 999,999,999,999 inclussive.    
     *
     *  (C) 2010 Peter Ajtai
     *    This program is free software: you can redistribute it and/or modify
     *    it under the terms of the GNU General Public License as published by
     *    the Free Software Foundation, either version 3 of the License, or
     *    (at your option) any later version.
     *
     *    This program is distributed in the hope that it will be useful,
     *    but WITHOUT ANY WARRANTY; without even the implied warranty of
     *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *    GNU General Public License for more details.
     *
     *    See the GNU General Public License: <http://www.gnu.org/licenses/>.
     *
     */
    // zero is a special case, it cause problems even with typecasting if we don't deal with it here
    $max_size = pow(10,18);
    if (!$number) return "zero";
    if (is_int($number) && $number < abs($max_size)) 
    {            
        switch ($number) 
        {
            // set up some rules for converting digits to words
            case $number < 0:
                $prefix = "negative";
                $suffix = translateToWords(-1*$number);
                $string = $prefix . " " . $suffix;
                break;
            case 1:
                $string = "One";
                break;
            case 2:
                $string = "Two";
                break;
            case 3:
                $string = "Three";
                break;
            case 4: 
                $string = "Four";
                break;
            case 5:
                $string = "Five";
                break;
            case 6:
                $string = "Six";
                break;
            case 7:
                $string = "Seven";
                break;
            case 8:
                $string = "Eight";
                break;
            case 9:
                $string = "Nine";
                break;                
            case 10:
                $string = "Ten";
                break;            
            case 11:
                $string = "Eleven";
                break;            
            case 12:
                $string = "Twelve";
                break;            
            case 13:
                $string = "Thirteen";
                break;            
            // fourteen handled later
            case 15:
                $string = "Fifteen";
                break;            
            case $number < 20:
                $string = translateToWords($number%10);
                // eighteen only has one "t"
                if ($number == 18)
                {
                $suffix = "Een";
                } else 
                {
                $suffix = "Teen";
                }
                $string .= $suffix;
                break;            
            case 20:
                $string = "Twenty";
                break;            
            case 30:
                $string = "Thirty";
                break;            
            case 40:
                $string = "Forty";
                break;            
            case 50:
                $string = "Fifty";
                break;            
            case 60:
                $string = "Sixty";
                break;            
            case 70:
                $string = "Seventy";
                break;            
            case 80:
                $string = "Eighty";
                break;            
            case 90:
                $string = "Ninety";
                break;                
            case $number < 100:
                $prefix = translateToWords($number-$number%10);
                $suffix = translateToWords($number%10);
                $string = $prefix . "-" . $suffix;
                break;
            // handles all number 100 to 999
            case $number < pow(10,3):                    
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,2)))) . " Hundred";
                if ($number%pow(10,2)) $suffix = " and " . translateToWords($number%pow(10,2));
                $string = $prefix . $suffix;
                break;
            case $number < pow(10,6):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,3)))) . " Thousand";
                if ($number%pow(10,3)) $suffix = translateToWords($number%pow(10,3));
                $string = $prefix . " " . $suffix;
                break;
            case $number < pow(10,9):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,6)))) . " Million";
                if ($number%pow(10,6)) $suffix = translateToWords($number%pow(10,6));
                $string = $prefix . " " . $suffix;
                break;                    
            case $number < pow(10,12):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,9)))) . " Billion";
                if ($number%pow(10,9)) $suffix = translateToWords($number%pow(10,9));
                $string = $prefix . " " . $suffix;    
                break;
            case $number < pow(10,15):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,12)))) . " Trillion";
                if ($number%pow(10,12)) $suffix = translateToWords($number%pow(10,12));
                $string = $prefix . " " . $suffix;    
                break;        
            // Be careful not to pass default formatted numbers in the quadrillions+ into this function
            // Default formatting is float and causes errors
            case $number < pow(10,18):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number/pow(10,15)))) . " Quadrillion";
                if ($number%pow(10,15)) $suffix = translateToWords($number%pow(10,15));
                $string = $prefix . " " . $suffix;    
                break;                    
        }
    } else
    {
        echo "ERROR with - $number<br/> Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
    }
    return $string;    
}
function sendEmail($data = array()){
            $data['from'] = isset($data['from']) ? $data['from'] : '';
            $data['to'] = isset($data['to']) ? $data['to'] : '';
            $data['body'] = isset($data['body']) ? $data['body'] : '';
            $data['subject'] = isset($data['subject']) ? $data['subject'] : 'Dear Admin';
            $isHtml = isset( $data['html'] ) ? true : false;
            $isMultipleMail = ( is_array( $data['to'] ) ) ? true : false;
            $noReply = ( isset($data['noreply']) ) ? true : false; 
            // debug(__DIR);
            // die($_SERVER['PHP_SELF']);
            require_once 'admin/dist/PHPMailerAutoload.php';
            $mail = new PHPMailer;  
//            $mail->SMTPDebug = 2;
//            $mail->isSMTP();  
//            $mail->Host = ini_get('SMTP');
//            $mail->Port = ini_get('smtp_port');
            // Set mailer to use SMTP
            //$mail->Host = 'mail.service-inq.com';  // Specify main and backup SMTP servers
            //$mail->SMTPAuth = false;                               // Enable SMTP authentication
            //$mail->Username = 'Service@service-inq.com';                 // SMTP username
            //$mail->Password = 'T5%w787K';                           // SMTP password
            //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            //$mail->Port = 587;   
            $mail->ContentType = 'text/plain'; 
            $mail->IsHTML($isHtml);
            $mail->Subject = $data['subject'];
            if( $noReply ){
                 $mail->setFrom('administrator@hydraulic-engineer.net', 'No-Reply');
            } else {
                $mail->setFrom($data['from']);
            }
            if( $isMultipleMail ){
                foreach ($data['to'] as $key => $value) {
                    # code...
                     $mail->addAddress($value);
                }
            } else {
                $mail->addAddress($data['to']);
            }
            if( $isHtml ){
                $mail->msgHTML($data['body']);
            } else {
                $mail->Body = $data['body'];
            }
            
            if (!$mail->send()) {
//                echo "Mailer Error: " . $mail->ErrorInfo;
//                 die('ERROR');
            } else {
                // die('test');
                return true; 
            }      
            
}
// function query($queryString){
//     $query = mysql_query($queryString);
// }
function debug($array,$die = false) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
    if( $die ) {
        die;
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getCustomerSalesTeam($cid){
        $field = 'partner_assign_sales ,partner_assign_sales_manager, partner_assign_store, partner_assign_store_manager, partner_assign_sales_stock';
        $customer = getAllDataBySql($field, 'db_partner', "WHERE partner_id = '".$cid."'", '', '');
//        debug($customer[0]);
        $str = $customer[0]['partner_assign_sales'] .','.$customer[0]['partner_assign_sales_manager'].','.
                $customer[0]['partner_assign_store'].','.$customer[0]['partner_assign_store_manager'].','.
                $customer[0]['partner_assign_sales_stock'];
        $tmp = explode(',', $str);
        $tmp = implode(',', array_filter($tmp));
//        debug($tmp);
        return $tmp;
}

 function insertNotification($message, $type, $target_id, $empl_sale_team, $flow = '',$email_content = '',$saveObject){
    switch($flow){
        // - 1 = Webmaster
        // 1   = Admin
        // 2   = Store Manager
        // 3   = Store
        // 5   = Sales Manager
        // 6   = Sales 
        // 7   = Senior Account 
        // 8   = Sales + Stock Approval
        // 9   = Junior Account
        case 'quotation_request':
           $group_allow = array(5);
            if($empl_sale_team != ''){
                $sales_array = explode(',', $empl_sale_team);
                foreach($sales_array as $sales){
                    $sales_info = getAllDataBySql('empl_group, empl_notify_email', 'db_empl', "WHERE empl_id = '".$sales."' AND empl_status = 1 ", '');
//                    debug($sales_info);
                    if(in_array($sales_info[0]['empl_group'], $group_allow)){
                        insertNotificationDB($message, $type, $target_id, $sales,$saveObject);
                    }
                }
            }
            break;
        case 'quotation_reject':
        case 'quotation_approved':
        case 'picklist_reject':
        case 'picklist_approved':
           $group_allow = array(5,6,8);
            if($empl_sale_team != ''){
                $sales_array = explode(',', $empl_sale_team);
                foreach($sales_array as $sales){
                    $sales_info = getAllDataBySql('empl_group, empl_notify_email', 'db_empl', "WHERE empl_id = '".$sales."' AND empl_status = 1 ", '');
//                    debug($sales_info);
                    if(in_array($sales_info[0]['empl_group'], $group_allow)){
                        insertNotificationDB($message, $type, $target_id, $sales,$saveObject);
                    }
                }
            }
            break;
        case 'picklist_request_1':
           $group_allow = array(3,8);
            if($empl_sale_team != ''){
                $sales_array = explode(',', $empl_sale_team);
                foreach($sales_array as $sales){
                    $sales_info = getAllDataBySql('empl_group, empl_notify_email', 'db_empl', "WHERE empl_id = '".$sales."' AND empl_status = 1 ", '');
//                    debug($sales_info);
                    if(in_array($sales_info[0]['empl_group'], $group_allow)){
                        insertNotificationDB($message, $type, $target_id, $sales,$saveObject);
                    }
                }
            }
            break;
        case 'picklist_request_2':
           $group_allow = array(2);
            if($empl_sale_team != ''){
                $sales_array = explode(',', $empl_sale_team);
                foreach($sales_array as $sales){
                    $sales_info = getAllDataBySql('empl_group, empl_notify_email', 'db_empl', "WHERE empl_id = '".$sales."' AND empl_status = 1 ", '');
//                    debug($sales_info);
                    if(in_array($sales_info[0]['empl_group'], $group_allow)){
                        insertNotificationDB($message, $type, $target_id, $sales,$saveObject);
                    }
                }
            }
            break;
        case 'register':
            //insert for account group
            $account_group = getDataBySql('empl_id, empl_notify_email', 'db_empl', "WHERE empl_group = '9' OR empl_group = '7' AND empl_status = 1 ", $orderby);
            while($account_info = mysql_fetch_array($account_group)){
                insertNotificationDB($message, $type, $target_id, $account_info['empl_id'],$saveObject);
                $subject = 'New User Register';
                sendEmail(array(
                    'to'=> $account_info['empl_notify_email'],
                    'body'=> $email_content,
                    'subject'=> $subject,
                    'html'=> true,
                    'noreply'=>true
                ));
            }
            break;
        case 'enquiry':
        case 'quotation_confirm':
            $group_allow = array(5,6,8);
            if($empl_sale_team != ''){
                $sales_array = explode(',', $empl_sale_team);
                foreach($sales_array as $sales){
                    $sales_info = getAllDataBySql('empl_group, empl_notify_email', 'db_empl', "WHERE empl_id = '".$sales."' AND empl_status = 1 ", '');
//                    debug($sales_info);
                    if(in_array($sales_info[0]['empl_group'], $group_allow)){
                        insertNotificationDB($message, $type, $target_id, $sales, $saveObject);
//                        debug($email_content);
                        $subject = 'New Enquiry';
                        if($flow == 'quotation_confirm'){
                           $subject = 'Quotation Confirm'; 
                        }
//                        debug($sales_info[0]['empl_notify_email']);
                        sendEmail(array(
                          'to'=> $sales_info[0]['empl_notify_email'],
                          'body'=> $email_content,
                          'subject'=> $subject,
                          'html'=> true,
                          'noreply'=>true
                        ));
                    }
                }
//                debug('end',true);
            }
            break;
        
    }

    //insert for admin group
    $admin_group = getDataBySql('empl_id, empl_notify_email', 'db_empl', "WHERE empl_group = '1' AND empl_status = 1 ", $orderby);
        while($admin_info = mysql_fetch_array($admin_group)){
            insertNotificationDB($message, $type, $target_id, $admin_info['empl_id'],$saveObject);
            if($flow == 'enquiry' || $flow == 'quotation_confirm' || $flow == 'register'){
                $subject = 'New Enquiry';
                if($flow == 'quotation_confirm'){
                   $subject = 'Quotation Confirm'; 
                }
                if($flow == 'register'){
                   $subject = 'New User Register';
                }
                sendEmail(array(
                          'to'=> $admin_info['empl_notify_email'],
                          'body'=> $email_content,
                          'subject'=> $subject,
                          'html'=> true,
                          'noreply'=>true
                        ));
            }
        }
     //insert for webmaster
    insertNotificationDB($message, $type, $target_id, '10000',$saveObject);
}
    
function insertNotificationDB($message, $type, $target_id, $empl_id,$saveObject){
    $table_field = array('notification_message','notification_type','pop_id','employee_id');
    $table_value = array($message, $type, $target_id, $empl_id);
    $remark = "Insert Notification for type $type with target ID  : $target_id";
    $saveObject->SaveData($table_field,$table_value,'db_notifications','notification_id',$remark);
}