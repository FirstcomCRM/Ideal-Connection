<?php
class Password extends Base {
	public function index(){	
		$this->action_update = "password.php?action=update";
		$this->render("account/password.php");
	}
	public function checkPassword(){
		$this->partner_login_password = md5("@#~x?\$" . $this->partner_login_password. "?\$");

		$query = "SELECT * FROM db_partner
		WHERE partner_id = {$this->partner_id} AND partner_login_password = '{$this->partner_login_password}'";
		$result = mysql_query( $query );
//		 debug($query);
//		 debug($result);
		if( mysql_num_rows($result) ){
			echo json_encode(array(
				"success"=>1
			));
		} else {
			echo json_encode(array(
				"success"=>0
			));
		};
	}
	public function update(){
		$this->partner_login_password = md5("@#~x?\$" . $this->partner_login_password. "?\$");

		$table_field = array(
			'partner_login_password',
		);
		$table_value = array(
			$this->partner_login_password,
		);
		// debug($this->partner_id);
		$remark = "Update account password";
		if($this->savehandlerApi->UpdateData($table_field,$table_value,'db_partner','partner_id',$remark,$this->partner_id)) { 
			return true;
		} else {
			return false;
		}
	}///update
}//class