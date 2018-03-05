<?php
$db_server = "localhost";
$db_name = "seahydra_ecom";
$db_user = "root";
$db_passwd = "";
//$db_server = "localhost";
//$db_name = "hydrauli_ecom";
//$db_user = "hydrauli_admin";
//$db_passwd = "4)OutiH^YVVD";
$connection = mysql_connect($db_server,$db_user,$db_passwd);
$db = mysql_select_db($db_name,$connection) or die("couldn't select Database");