<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class GeneralFunction {

    public function checkDuplicate($table,$field,$attr_field,$table_field,$table_id){
      if($table_id > 0){
          $wherestring = " AND $table_field <> '$table_id'";
      }
      $sql = "SELECT COUNT(*) as total FROM $table WHERE $field = '$attr_field' $wherestring";
      $query = mysql_query($sql);
      $total = 0;
      if($row = mysql_fetch_array($query)){
          $total = $row['total'];
      }else{
          $total = 0;
      }
      return $total;
    }
    public function getDetail($table,$require_field,$table_field,$table_id){
      $field = explode(",",$require_field);
      $num_field = count($field);  

      if($table_id > 0){
          $wherestring = " $table_field = '$table_id'";
      }
      $data = array();
      $sql = "SELECT * FROM $table WHERE $wherestring";
      $query = mysql_query($sql);
      $row = mysql_fetch_array($query);
      for($a=0;$a<$num_field;$a++){
          $data[$field[$a]] = $row[$field[$a]];
      }
      return $data;
    }   
}
?>
