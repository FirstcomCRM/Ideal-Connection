<?php
// include_once
class Orders extends Base{
	private $id;
	private $customer;
	private $notification;
	private $employee;
	public function __construct($id){
		$this->id = $id;
		$this->order_id = $id;
	}
	public function index(){}
	public function getPartnerID(){
		return isset($_SESSION['partner_id']) ? $_SESSION['partner_id'] : '0';
	}
	public function setEmployeeModel($e){
		$this->employee = $e;
	}
	public function setCustomerModel($c){
		$this->customer = $c;
	}
	public function setNotificationModel($n){
		$this->notification = $n;
	}
	public function customerConfirm(){

            include_once 'admin/class/Order.php';
            include_once 'admin/class/SavehandlerApi.php';
            $o = new Order();
            $o->document_code        = 'Order Confirmation';
            $o->document_type        = 'OC';
            $o->order_type           = 'sales_order';
            $o->generate_document_type = 'SO';
            $o->order_id             = $this->order_id;
//            $o = $this;
            $o->save = new SavehandlerApi();
//            debug($this->save);
            $o->generateDocument();
            //insert notification
//            $o->neworder_id;
            $oder_no = getDataCodeBySql('order_no', 'db_order', "WHERE order_id = '".$this->order_id."'", $orderby);
            $new_oder_no = getDataCodeBySql('order_no', 'db_order', "WHERE order_id = '".$o->neworder_id."'", $orderby);
            $team = getCustomerSalesTeam($_SESSION['partner_id']);
            $company_name = getDataCodeBySql('ccompany_name', 'db_ccompany', "WHERE ccompany_id = '".$_SESSION['partner_outlet']."'", '');
            $htmlBody = "<p>
                        {$this->customer['partner_name']} from {$$company_name} has confirmed an order (".$new_oder_no."). <br>Please <a href = '".webroot."admin/sales_order.php'>login<a/> to follow up the order.
                        </p><br><i>This is an auto-generated mail from www.hydraulic-engineer.net</i>";
            insertNotification("Quotation {$oder_no} has been confirmed by : ".$this->customer['partner_name']."<br> {$new_oder_no} is generated.", 'quotation_confirm', $o->neworder_id, $team, 'quotation_confirm',$htmlBody,$o->save);

                    // $queryString = "UPDATE db_order
                    // SET order_isconfirm = 1
                    // WHERE order_id = {$this->id}";

//                    $htmlBody = "<p>
//            {$this->customer['partner_name']} have registered for an account. Please click <a href = '".webroot."admin/quotation.php'>here<a/>  to review and approve account registration.
//            </p>";
//
//            $this->sendHtmlMailToEmployee( $htmlBody );
        // $this->sendHtmlMail( $htmlBody );
		//confirm by user
		// mysql_query($queryString);///
	}

	public function isCustomerConfirm($order_id = 0){

                if( $order_id == 0) {
                    $query = "SELECT *
                    FROM db_order
                    WHERE order_generate_from = {$this->order_id} AND order_type = 'sales_order'";
                }else {
                    $query = "SELECT *
                    FROM db_order
                    WHERE order_generate_from = {$order_id} AND order_type = 'sales_order'";
                }
		
	
		// echo $query;
		// debug( $query );
		$result = mysql_query($query);

		// return (!$result) ? false : true;
		$data = [];
        while($row = mysql_fetch_assoc($result)){
            $data[] = $row;
        }
        return (empty( $data )) ? false : true;
	}
	public function isApprovedByManager(){
		$query= "SELECT * 
		FROM db_order
		WHERE order_id = {$this->id} AND order_status = 2";
		// echo $query;
		$result = mysql_query($query);
		return (!$result) ? false : true;
	}
	public function sendHtmlMailToEmployee($htmlBody){
		$sales_employee = $this->employee->getEmployeeByType('sales');
		$relevant_email = '';
		foreach ($sales_employee as $key => $value) {
			if( $this->customer['partner_sales_person_id'] == $value->empl_id ){
					$relevant_email = $value->empl_email;
			}
			# code...
		}
        sendEmail(array(
          'to'=> $relevant_email,
          'from'=> $this->customer['partner_email'],
          'body'=>$htmlBody,
          'html'=> true,
          'noreply'=>true
        ));
    }

}