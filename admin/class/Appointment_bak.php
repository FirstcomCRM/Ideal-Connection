<?php
/*
 * To change this tappointmentate, choose Tools | Tappointmentates
 * and open the tappointmentate in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class Appointment {

    public function Appointment(){
        global $connection;
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();
        $this->db_conn = $connection;

    }
    public function create(){
        $duration = $this->getDuration($this->appointment_service_type);
        $endtime = $this->calculationEndTime($this->appointment_time, $duration);
        $table_field = array('appointment_name','appointment_telephone','appointment_email','appointment_location','appointment_date','appointment_time',
                             'appointment_service_type','appointment_total_person','appointment_nric','appointment_confirm','appointment_incharge_person','appointment_end_time','appointment_remarks','appointment_address');
        $table_value = array($this->appointment_name,$this->appointment_telephone,$this->appointment_email,$this->appointment_location, format_date_database($this->appointment_date),$this->appointment_time,
                             $this->appointment_service_type,$this->appointment_person,$this->appointment_nric,1,$this->appointment_incharge_person,$endtime,$this->appointment_remarks,$this->appointment_address);
        $remark = "Insert Appointment.";
        if(!$this->save->SaveData($table_field,$table_value,'db_appointment','appointment_id',$remark)){
           return false;
        }else{
           $this->appointment_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
        $table_field = array('appointment_name','appointment_telephone','appointment_email','appointment_location','appointment_date','appointment_time',
                             'appointment_service_type','appointment_total_person','appointment_nric','appointment_incharge_person','appointment_remarks','appointment_end_time','appointment_address');
        $table_value = array($this->appointment_name,$this->appointment_telephone,$this->appointment_email,$this->appointment_location, format_date_database($this->appointment_date),$this->appointment_time,
                             $this->appointment_service_type,$this->appointment_person,$this->appointment_nric,$this->appointment_incharge_person,$this->appointment_remarks,$this->appointment_end_time,$this->appointment_address);
        $remark = "Update Appointment.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_appointment','appointment_id',$remark,$this->appointment_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchAppointmentDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_appointment WHERE appointment_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->appointment_id = $row['appointment_id'];
            $this->appointment_name = $row['appointment_name'];
            $this->appointment_telephone = $row['appointment_telephone'];
            $this->appointment_email = $row['appointment_email'];
            $this->appointment_location = $row['appointment_location'];
            $this->appointment_date = $row['appointment_date'];
            $this->appointment_time = $row['appointment_time'];
            $this->appointment_service_type = $row['appointment_service_type'];
            $this->appointment_person = $row['appointment_total_person'];
            $this->appointment_nric = $row['appointment_nric'];
            $this->appointment_incharge_person = $row['appointment_incharge_person'];
            $this->appointment_end_time = $row['appointment_end_time'];
            $this->appointment_remarks = $row['appointment_remarks'];
            $this->appointment_address = $row['appointment_address'];
        }
        return $query;
    }
    public function getInputForm($action){
        global $mandatory;
        if($action == 'create'){
            $this->appointment_seqno = 10;
            $this->appointment_status = 1;
        }
        $view = $_GET['view'];
        $this->appointment_servicetypeCrtl = $this->select->getServiceTypeSelectCtrl($this->appointment_service_type);
        $this->appointment_locationCrtl = $this->select->getLocationSelectCtrl($this->appointment_location);
        $this->appointment_inchargePersonCrtl = $this->select->getPersonInchargeCtrl($this->appointment_incharge_person);
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Appointment Details Management</title>
    <?php
    include_once 'css.php';

    ?>
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <!-- include header-->
    <?php include_once 'header.php';?>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>Appointment Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->appointment_id > 0){ echo "Appointment Details";}else{ echo "Create New Appointment Details";}?></h3>
                <button type = "button" class="btn btn-primary pull-right" style = 'width:150px;' onclick = "window.location.href='appointment.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-primary pull-right" style = 'width:150px;margin-right:10px;' onclick = "window.location.href='appointment.php?action=createForm'">Create New</button>
                <?php }?>
              </div>

                <form id = 'appointment_form' class="form-horizontal" action = 'appointment.php?action=create' method = "POST">
                  <div class="box-body">
                        <div class="form-group">
                          <label for="appointment_name" class="col-sm-2 control-label">Appointment Name <?php echo $mandatory ?></label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="appointment_name" name="appointment_name" placeholder="Name" value = "<?php echo $this->appointment_name;?>" <?php if($view == 1){echo "readonly"; }?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_telephone" class="col-sm-2 control-label">Appointment Telephone</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="appointment_telephone" name="appointment_telephone" placeholder="Telephone" value = "<?php echo $this->appointment_telephone;?>" <?php if($view == 1){echo "readonly"; }?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_email" class="col-sm-2 control-label">Appointment Email</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="appointment_email" name="appointment_email" placeholder="Email" value = "<?php echo $this->appointment_email;?>" <?php if($view == 1){echo "readonly"; }?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_nric" class="col-sm-2 control-label">Appointment NRIC / FIN</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="appointment_nric" name="appointment_nric" placeholder="NRIC" value = "<?php echo $this->appointment_nric;?>" <?php if($view == 1){echo "readonly"; }?>>
                          </div>
                        </div>
<!--                        <div class="form-group">
                          <label for="appointment_person" class="col-sm-2 control-label">Appointment Total Person</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="appointment_person" name="appointment_person" placeholder="Total Person" value = "<?php echo $this->appointment_person;?>" <?php if($view == 1){echo "readonly"; }?>>
                          </div>
                        </div>   -->
                        <div class="form-group">
                          <label for="appointment_service_type" class="col-sm-2 control-label">Appointment Service Type  <?php echo $mandatory ?></label>
                          <div class="col-sm-3">
                           <select class="form-control select2" id="appointment_service_type" name="appointment_service_type" style = 'width:100%' <?php if($view == 1){echo "disabled"; }?>>
                                  <?php echo $this->appointment_servicetypeCrtl;?>
                           </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_location" class="col-sm-2 control-label">Appointment Location  <?php echo $mandatory ?></label>
                          <div class="col-sm-3">
                           <select class="form-control select2" id="appointment_location" name="appointment_location" style = 'width:100%' <?php if($view == 1){echo "disabled"; }?>>
                                  <?php echo $this->appointment_locationCrtl;?>
                           </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_date" class="col-sm-2 control-label">Appointment Date  <?php echo $mandatory ?></label>
                          <div class="col-sm-3">
                              <input type="text" class="form-control datepicker" id="appointment_date" name="appointment_date" value = "<?php echo format_date($this->appointment_date);?>" placeholder="Date" <?php if($view == 1){echo "disabled"; }?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_time" class="col-sm-2 control-label">Appointment Time  <?php echo $mandatory ?></label>
                            <div class="col-sm-3 input-group bootstrap-timepicker" style = 'float:left;padding-right: 15px;padding-left: 15px;'>
                                <input type="text" class="form-control timepicker" id="appointment_time" name="appointment_time" value = "<?php echo $this->appointment_time;?>" <?php if($view == 1){echo "disabled"; }?>>
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="appointment_incharge_person" class="col-sm-2 control-label">Person in Charge </label>
                          <div class="col-sm-3">
                           <select class="form-control select2" id="appointment_incharge_person" name="appointment_incharge_person" style = 'width:100%' <?php if($view == 1){echo "disabled"; }?>>
                                  <?php echo $this->appointment_inchargePersonCrtl;?>
                           </select>
                          </div>
                        </div>
                    <?php if($this->appointment_id > 0){?>
                        <div class="form-group">
                          <label for="appointment_end_time" class="col-sm-2 control-label">Appointment End Time </label>
                            <div class="col-sm-3 input-group bootstrap-timepicker" style = 'float:left;padding-right: 15px;padding-left: 15px;'>
                                <input type="text" class="form-control timepicker" id="appointment_end_time" name="appointment_end_time" value = "<?php echo $this->appointment_end_time;?>" <?php if($view == 1){echo "disabled"; }?>>
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group">
                            <label for="appointment_address" class="col-sm-2 control-label">Client Address and Remarks</label>
                            <div class="col-sm-3">
                                  <textarea class="form-control" rows="3" id="appointment_address" name="appointment_address" placeholder="Client Address and Remarks"><?php echo $this->appointment_address;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="appointment_remarks" class="col-sm-2 control-label">Remarks</label>
                            <div class="col-sm-3">
                                  <textarea class="form-control" rows="3" id="appointment_remarks" name="appointment_remarks" placeholder="Remarks"><?php echo $this->appointment_remarks;?></textarea>
                            </div>
                        </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->appointment_id;?>" name = "appointment_id"/>
                    <?php
                    if($this->appointment_id > 0){
                        $prm_code = "update";
                    }else{
                        $prm_code = "create";
                    }
                    if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],$prm_code)){?>
                    <button type = "submit" class="btn btn-info"><?php if($this->appointment_id > 0){echo "Update";} else{echo "Submit";}?></button>
                    <?php }?>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include_once 'footer.php';?>
    </div><!-- ./wrapper -->
    <?php
    include_once 'js.php';

    ?>
    <script>
    $(document).ready(function() {
        $("#appointment_form").validate({
                  rules:
                  {
                      appointment_name:
                      {
                          required: true
                      },
                      appointment_date:
                      {
                          required: true
                      },
                      appointment_time:
                      {
                          required: true
                      },
                      appointment_service_type:
                      {
                          required: true
                      },
                      appointment_location:
                      {
                          required: true
                      },
//                      appointment_person:
//                      {
//                          required: true
//                      },
//                      appointment_incharge_person:
//                      {
//                          required: true
//                      }
                  },
                  messages:
                  {
                      appointment_name:
                      {
                          required: "Please enter name"
                      },
                      appointment_date:
                      {
                          required: "Please select date"
                      },
                      appointment_time:
                      {
                          required: "Please select time"
                      },
                      appointment_service_type:
                      {
                          required: "Please select one service type"
                      },
                      appointment_location:
                      {
                          required: "Please select one location"
                      },
//                      appointment_person:
//                      {
//                          required: "Please enter total person"
//                      },
//                      appointment_incharge_person:
//                      {
//                          required: "Please select one incharge person"
//                      }
                  }
              });


});
    </script>
  </body>
</html>
        <?php

    }
    public function getListing(){
    ?>
    <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Appointment Details Management</title>
    <?php
    include_once 'css.php';

    ?>
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <!-- include header-->
    <?php include_once 'header.php';?>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>Appointment</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Appointment Details Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-primary pull-right"  onclick = "window.location.href='appointment.php?action=createForm'">Create New + </button>
                <button class="btn btn-primary pull-right btn-success" style = 'margin-right:5px;' id = "confirm_btn">Confirm <i class="fa fa-fw fa-thumbs-up"></i></button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="appointment_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:2%'><input type = "checkbox" name = 'appointment_checkbox' class = 'appointment_checkbox_parent' /></th>
                        <th style = 'width:3%'>No</th>
                        <th style = 'width:10%'>Name</th>
                        <th style = 'width:10%'>Telephone</th>
                        <th style = 'width:10%'>Email</th>
                        <th style = 'width:10%'>Service</th>
                        <th style = 'width:15%'>Location</th>
                        <th style = 'width:10%'>Date</th>
                        <th style = 'width:10%'>Time</th>
                        <th style = 'width:5%'>Confirm</th>
                        <th style = 'width:20%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT *
                              FROM db_appointment
                              WHERE appointment_id > 0 ORDER BY insertDateTime DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><input type = "checkbox" name = 'appointment_checkbox' class = 'appointment_checkbox_child' value = '<?php echo $row['appointment_id'];?>' data-status="<?php echo $row['appointment_confirm'];?>"/></td>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['appointment_name'];?></td>
                            <td><?php echo $row['appointment_telephone'];?></td>
                            <td><?php echo $row['appointment_email'];?></td>
                            <td><?php
                                        $sql2 = "SELECT service_title FROM db_servicestype WHERE service_id = '$row[appointment_service_type]'";
                                        $query2 = mysql_query($sql2);
                                        $row2 = mysql_fetch_array($query2);
                                        echo $row2['service_title'];
                                ?>
                            </td>
                            <td><?php
                                    if($row[appointment_location] == 1){
                                        echo $row['appointment_address'];
                                    }else{
                                        $sql2 = "SELECT location_title FROM db_location WHERE location_id = '$row[appointment_location]'";
                                        $query2 = mysql_query($sql2);
                                        $row2 = mysql_fetch_array($query2);
                                        echo $row2['location_title'];
                                    }
                                ?>
                            </td>
                            <td><?php echo $row['appointment_date'];?></td>
                            <td><?php echo $row['appointment_time'];?></td>
                            <td><?php
                            if($row['appointment_confirm'] == 1){ echo "<b><font color = 'green' >Confirm</font></b>";}
                            else if($row['appointment_confirm'] == 2){ echo "<b><font color = 'red' >Rejected</font></b>";}
                            else if($row['appointment_confirm'] == 3){ echo "<b><font color = 'orange' >Cancel</font></b>";}
                            else { echo 'Pending';}?></td>
                            <td class = "text-align-right">
                                <?php
//                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <!--<button type="button" class="btn btn-primary btn-info " onclick = "location.href = 'appointment.php?action=edit&appointment_id=<?php echo $row['appointment_id'];?>&view=1'">View</button>-->
                                <?php
                                if($row['appointment_confirm'] == 0 || $row['appointment_confirm'] == 3){?>
                                <button type="button" class="btn btn-primary btn-danger " onclick = "confirmAlertHref('appointment.php?action=rejectAppointment&appointment_id=<?php echo $row['appointment_id'];?>','Confirm Reject?')">Rejected</button>
                                <?php }?>
                                <button type="button" class="btn btn-primary btn-info " onclick = "location.href = 'appointment.php?action=edit&appointment_id=<?php echo $row['appointment_id'];?>'">View</button>
                                <button type="button" class="btn btn-primary btn-warning " onclick = "confirmAlertHref('appointment.php?action=cancelAppointment&appointment_id=<?php echo $row['appointment_id'];?>','Confirm Cancel?')">Cancel</button>
                                <?php // }?>
                            </td>
                        </tr>
                    <?php
                        $i++;
                      }
                    ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style = 'width:2%'><input type = "checkbox" name = 'appointment_checkbox' class = 'appointment_checkbox_parent' /></th>
                        <th style = 'width:3%'>No</th>
                        <th style = 'width:10%'>Name</th>
                        <th style = 'width:10%'>Telephone</th>
                        <th style = 'width:10%'>Email</th>
                        <th style = 'width:10%'>Service</th>
                        <th style = 'width:15%'>Location</th>
                        <th style = 'width:10%'>Date</th>
                        <th style = 'width:10%'>Time</th>
                        <th style = 'width:5%'>Confirm</th>
                        <th style = 'width:20%'></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper --><!-- /.content-wrapper -->
      <?php include_once 'footer.php';?>
    </div><!-- ./wrapper -->
    <?php
    include_once 'js.php';
    ?>
    <script>
      $(function () {
        $('#appointment_table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

      });

      $('#confirm_btn').click(function(){
            var appointment_id = [];
            var appointment_status = [];

            $('.appointment_checkbox_child').each(function(){
                if($(this).is(':checked')){
                    appointment_id.push($(this).val());
                    appointment_status.push($(this).data("status"));
                }
            });
            var data = "action=confirmedAppointment&appointment_array="+appointment_id+"&appointment_status_array="+appointment_status;
            $.ajax({
                type: 'POST',
                url: 'appointment.php',
                cache: false,
                data:data,
                error: function(xhr) {
                    alert("System Error.");
                    issend = false;
                },
                success: function(data) {
                   issend = false;
                   var jsonObj = eval ("(" + data + ")");
                   alert('Update success.');
                   location.reload();
                }
             });
        });

        $('.appointment_checkbox_parent').click(function(){
                if($(this).is(':checked')){
                    $('.appointment_checkbox_child').prop('checked',true);
                }else{
                    $('.appointment_checkbox_child').prop('checked',false);
                }

        });
    </script>
  </body>
</html>
    <?php
    }
    public function confirmedAppointment(){
        $c = explode(',',$this->appointment_array);
        $s = explode(',',$this->appointment_status_array);
        $length = 0;
        foreach($c as $id){
            if($s[$length] != 1){
                $this->fetchAppointmentData($id);
                $this->sendAppointmentConfirmEmail();
            }
            $table_field = array('appointment_confirm');
            $table_value = array(1);
            $remark = "Update Confirm Appointment";
            $this->save->UpdateData($table_field,$table_value,'db_appointment','appointment_id',$remark,$id);
            $length++;
        }
    }
    public function rejectAppointment(){
            $id = $_GET['appointment_id'];
            $table_field = array('appointment_confirm');
            $table_value = array(2);
            $remark = "Reject Appointment";
            $this->save->UpdateData($table_field,$table_value,'db_appointment','appointment_id',$remark,$id);

            if($id != 2){
                $this->fetchAppointmentData($id);
                $this->sendAppointmentRejectEmail();
            }
    }
    public function cancelAppointment(){
            $id = $_GET['appointment_id'];
            $table_field = array('appointment_confirm');
            $table_value = array(3);
            $remark = "Reject Appointment";
            $this->save->UpdateData($table_field,$table_value,'db_appointment','appointment_id',$remark,$id);
    }
    public function getDuration($data){
        $sql = "SELECT service_duration FROM db_servicestype WHERE service_id = '$data' AND service_status = '1'";
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        return $row['service_duration'];
    }
    public function calculationEndTime($time, $duration){
        $duration = $duration;
        $endtime = date("h:i A", strtotime($time." +".$duration." minutes"));
        return $endtime;
    }
    public function fetchAppointmentData($id) {

        $sql = "SELECT * FROM db_appointment WHERE appointment_id = '$id'";
        $query = mysql_query($sql);
        $numAppointment = mysql_num_rows($query);
        $this->totalAppointment = $numAppointment;
        if($numAppointment == 0){
            $this->noAppointment = "No appointment record found";
         } else{
             $this->noAppointment = "";
                $row = mysql_fetch_array($query);
                $this->appointment_id = $row['appointment_id'];
                $this->appointment_name = $row['appointment_name'];
                $this->appointment_telephone = $row['appointment_telephone'];
                $this->appointment_email = $row['appointment_email'];
                $this->appointment_location = $row['appointment_location'];
                $this->appointment_date = $row['appointment_date'];
                $this->appointment_time = $row['appointment_time'];
                $this->appointment_service_type = $row['appointment_service_type'];
                $this->appointment_nric = $row['appointment_nric'];
                $this->appointment_incharge_person = $row['appointment_incharge_person'];
                $this->appointment_end_time = $row['appointment_end_time'];
                $this->appointment_remarks = $row['appointment_remarks'];
                if($this->appointment_location != "0"){
                    $sql2 = "SELECT location_title FROM db_location WHERE location_id = '$this->appointment_location'";
                    $query2 = mysql_query($sql2);
                    $row2 = mysql_fetch_array($query2);
                    $this->location = $row2['location_title'];
                }else{
                    $this->location = "Decide by Hair+ Lab";
                }


                $sql2 = "SELECT service_title FROM db_servicestype WHERE service_id = '$this->appointment_service_type'";
                $query2 = mysql_query($sql2);
                $row2 = mysql_fetch_array($query2);
                $this->service_type = $row2['service_title'];

                $sql2 = "SELECT empl_name FROM db_empl WHERE empl_id = '$this->appointment_incharge_person'";
                $query2 = mysql_query($sql2);
                $row2 = mysql_fetch_array($query2);
                $this->staff_in_charge = $row2['empl_name'];
         }
    }

    public function sendAppointmentConfirmEmail() {

         if($this->noAppointment == ""){
                            $this->totalTrip;
                                $subject = "HairPlus Lab - Confirm your Appointment";
                                $style = <<<TEXT
                                       <head> <style>
                                            body{
                                                font-size: 16px;
                                            }
                                            .text-center{
                                                text-align: center!important;
                                            }
                                            .text-left{
                                                text-align: left!important;
                                            }
                                            .text-right{
                                                text-align: right!important;
                                            }
                                            .payment tr td{
                                                border: 0px solid #000000!important;
                                                padding: 10px;
                                            }
                                            .payment tr th{
                                                border-top: 1px solid #000000;
                                                border-bottom: 1px solid #000000;
                                                padding: 15px;
                                            }
                                            table.payment{
                                                border-collapse :collapse;
                                                border: 1px solid #000000;
                                            }
                                            .payment tr.borderTop {
                                                border-top: 1px solid #000000!important;
                                            }
                                            .payment tr.smallPad td {
                                                padding: 10px!important;
                                            }
                                            .bold{
                                               font-weight: 600;
                                            }
                                            u b{
                                             font-size: 18px;
                                            }
                                            body h4{
                                                font-size:24px;
                                            }
                                            .general tr td{
                                                font-size: 22px;
                                            }
                                            table.main{
                                                border-collapse :collapse;
                                                border: 1px solid #000000;
                                                padding: 20px;
                                            }
                                            table.main tr th{
                                                font-size: 22px;
                                                text-decoration: underline;
                                                padding-top:20px;
                                            }
                                            table.main tr th h3{
                                                -webkit-margin-after: 4px;
                                                -webkit-margin-before: 20px;
                                            }
                                            table.sub-tbl tr td{
                                                padding: 10px;
                                            }
                                            table.sub-tbl tr th{
                                                padding: 10px 15px 5px 10px;
                                            }
                                        </style></head>
TEXT;
                                if($this->staff_in_charge != ""){
                                    $staff_in_charge = $this->staff_in_charge;
                                }else{
                                    $staff_in_charge = "No Special Request";
                                }
                                $message .= $style;
                                $textLeft = "style=\"text-align:left;\"";
                                $message .= "<body><div width=\"100%\" style=\"text-align:center;\"><img src=\"".EMAIL_LOGO."\" />";
                                $message .= "<h4 style=\"font-size:24px;\">THANK YOU FOR YOUR APPOINTMENT WITH HAIRLABS</h4><br>";
                                $message .= "<h5 style=\"font-size:22px;\"><u>Your appointment booking has been confirmed as follows: </u></h5><br>";
                                $message .= "<table class=\"general\" style=\"margin:0 auto;\"><tr><td $textLeft>Appointment Date</td><td>:</td><td $textLeft>".format_date($this->appointment_date)."</td></tr>";
                                $message .= "<tr><td $textLeft>Appointment Time</td><td>:</td><td $textLeft>".$this->appointment_time."</td></tr>";
                                $message .= "<tr><td $textLeft>Service Type</td><td>:</td><td $textLeft>".$this->service_type."</td></tr>";
                                $message .= "<tr><td $textLeft>Your Name</td><td>:</td><td $textLeft>".$this->appointment_name."</td></tr>";
                                $message .= "<tr><td $textLeft>Telephone Number</td><td>:</td><td $textLeft>".$this->appointment_telephone."</td></tr>";
                                $message .= "<tr><td $textLeft>E-mail Address</td><td>:</td><td $textLeft>".$this->appointment_email."</td></tr>";
                                $message .= "<tr><td $textLeft>NRIC / FIN</td><td>:</td><td $textLeft>".$this->appointment_nric."</td></tr>";
                                $message .= "<tr><td $textLeft>Location</td><td>:</td><td $textLeft>".$this->location."</td></tr>";

                                if($this->location == 1){
                                    $message .= "<tr><td $textLeft>Address</td><td>:</td><td $textLeft>".$this->appointment_address."</td></tr>";
                                }
                                $message .= "</table></div><br>";

                                $message .= "</body>";

                                $sender_email =SENDER_EMAIL;

                                require 'dist/PHPMailerAutoload.php';

                                $mail = new PHPMailer;

                                $mail->isSMTP();

                                $mail->setFrom($sender_email,"HairPlus Lab - ");

                                $mail->addAddress($this->appointment_email);

                                $mail->Subject = 'HairPlus Lab - Reject your Appointment';

                                $mail->msgHTML($message);

                                if (!$mail->send()) {

                                    return "Mailer Error: " . $mail->ErrorInfo;
                                } else {

                                    return true;
                                }
                        }

    }
    public function sendAppointmentRejectEmail() {

         if($this->noAppointment == ""){
                            $this->totalTrip;
                                $subject = "HairPlus Lab - Reject your Appointment";
                                $style = <<<TEXT
                                       <head> <style>
                                            body{
                                                font-size: 16px;
                                            }
                                            .text-center{
                                                text-align: center!important;
                                            }
                                            .text-left{
                                                text-align: left!important;
                                            }
                                            .text-right{
                                                text-align: right!important;
                                            }
                                            .payment tr td{
                                                border: 0px solid #000000!important;
                                                padding: 10px;
                                            }
                                            .payment tr th{
                                                border-top: 1px solid #000000;
                                                border-bottom: 1px solid #000000;
                                                padding: 15px;
                                            }
                                            table.payment{
                                                border-collapse :collapse;
                                                border: 1px solid #000000;
                                            }
                                            .payment tr.borderTop {
                                                border-top: 1px solid #000000!important;
                                            }
                                            .payment tr.smallPad td {
                                                padding: 10px!important;
                                            }
                                            .bold{
                                               font-weight: 600;
                                            }
                                            u b{
                                             font-size: 18px;
                                            }
                                            body h4{
                                                font-size:24px;
                                            }
                                            .general tr td{
                                                font-size: 22px;
                                            }
                                            table.main{
                                                border-collapse :collapse;
                                                border: 1px solid #000000;
                                                padding: 20px;
                                            }
                                            table.main tr th{
                                                font-size: 22px;
                                                text-decoration: underline;
                                                padding-top:20px;
                                            }
                                            table.main tr th h3{
                                                -webkit-margin-after: 4px;
                                                -webkit-margin-before: 20px;
                                            }
                                            table.sub-tbl tr td{
                                                padding: 10px;
                                            }
                                            table.sub-tbl tr th{
                                                padding: 10px 15px 5px 10px;
                                            }
                                        </style></head>
TEXT;

                                if($this->staff_in_charge != ""){
                                    $staff_in_charge = $this->staff_in_charge;
                                }else{
                                    $staff_in_charge = "No Special Request";
                                }

                                $message .= $style;
                                $textLeft = "style=\"text-align:left;\"";
                                $message .= "<body><div width=\"100%\" style=\"text-align:center;\"><img src=\"".EMAIL_LOGO."\" />";
                                $message .= "<h4 style=\"font-size:24px;\">THANK YOU FOR YOUR APPOINTMENT WITH HAIRLABS</h4><br>";
                                $message .= "<h5 style=\"font-size:22px;\"><u>Sorry to inform you, Your appointment booking has been rejected as follows: </u></h5><br>";
                                $message .= "<table class=\"general\" style=\"margin:0 auto;\"><tr><td $textLeft>Appointment Date</td><td>:</td><td $textLeft>".format_date($this->appointment_date)."</td></tr>";
                                $message .= "<tr><td $textLeft>Appointment Time</td><td>:</td><td $textLeft>".$this->appointment_time."</td></tr>";
                                $message .= "<tr><td $textLeft>Service Type</td><td>:</td><td $textLeft>".$this->service_type."</td></tr>";
                                $message .= "<tr><td $textLeft>Your Name</td><td>:</td><td $textLeft>".$this->appointment_name."</td></tr>";
                                $message .= "<tr><td $textLeft>Telephone Number</td><td>:</td><td $textLeft>".$this->appointment_telephone."</td></tr>";
                                $message .= "<tr><td $textLeft>E-mail Address</td><td>:</td><td $textLeft>".$this->appointment_email."</td></tr>";
                                $message .= "<tr><td $textLeft>NRIC / FIN</td><td>:</td><td $textLeft>".$this->appointment_nric."</td></tr>";
                                $message .= "<tr><td $textLeft>Location</td><td>:</td><td $textLeft>".$this->location."</td></tr>";
                                if($this->location == 1){
                                    $message .= "<tr><td $textLeft>Address</td><td>:</td><td $textLeft>".$this->appointment_address."</td></tr>";
                                }
                                $message .= "</table></div><br>";


                                $message .= "</body>";

                                $sender_email =SENDER_EMAIL;

                                require 'dist/PHPMailerAutoload.php';

                                $mail = new PHPMailer;

                                $mail->isSMTP();

                                $mail->setFrom($sender_email,"HairPlus Lab - ");

                                $mail->addAddress($this->appointment_email);

                                $mail->Subject = 'HairPlus Lab - Reject your Appointment';

                                $mail->msgHTML($message);

                                if (!$mail->send()) {

                                    return "Mailer Error: " . $mail->ErrorInfo;
                                } else {

                                    return true;
                                }
                        }



    }
    public function sendAppointmentRejectEmail1() {

         if($this->noAppointment == ""){
                            $this->totalTrip;
                                $subject = "HairPlus Lab - Reject your Appointment";
                                $style = <<<TEXT
                                       <head> <style>
                                            body{
                                                font-size: 16px;
                                            }
                                            .text-center{
                                                text-align: center!important;
                                            }
                                            .text-left{
                                                text-align: left!important;
                                            }
                                            .text-right{
                                                text-align: right!important;
                                            }
                                            .payment tr td{
                                                border: 0px solid #000000!important;
                                                padding: 10px;
                                            }
                                            .payment tr th{
                                                border-top: 1px solid #000000;
                                                border-bottom: 1px solid #000000;
                                                padding: 15px;
                                            }
                                            table.payment{
                                                border-collapse :collapse;
                                                border: 1px solid #000000;
                                            }
                                            .payment tr.borderTop {
                                                border-top: 1px solid #000000!important;
                                            }
                                            .payment tr.smallPad td {
                                                padding: 10px!important;
                                            }
                                            .bold{
                                               font-weight: 600;
                                            }
                                            u b{
                                             font-size: 18px;
                                            }
                                            body h4{
                                                font-size:24px;
                                            }
                                            .general tr td{
                                                font-size: 22px;
                                            }
                                            table.main{
                                                border-collapse :collapse;
                                                border: 1px solid #000000;
                                                padding: 20px;
                                            }
                                            table.main tr th{
                                                font-size: 22px;
                                                text-decoration: underline;
                                                padding-top:20px;
                                            }
                                            table.main tr th h3{
                                                -webkit-margin-after: 4px;
                                                -webkit-margin-before: 20px;
                                            }
                                            table.sub-tbl tr td{
                                                padding: 10px;
                                            }
                                            table.sub-tbl tr th{
                                                padding: 10px 15px 5px 10px;
                                            }
                                        </style></head>
TEXT;

                                if($this->staff_in_charge != ""){
                                    $staff_in_charge = $this->staff_in_charge;
                                }else{
                                    $staff_in_charge = "No Special Request";
                                }

                                $message .= $style;
                                $textLeft = "style=\"text-align:left;\"";
                                $message .= "<body><div width=\"100%\" style=\"text-align:center;\"><img src=\"".EMAIL_LOGO."\" />";
                                $message .= "<h4 style=\"font-size:24px;\">THANK YOU FOR MAKE APPOINTMENT WITH HAIRPLUS LAB</h4><br>";
                                $message .= "<h5 style=\"font-size:22px;\"><u>Sorry to inform you, Your appointment booking has been rejected as follows: </u></h5><br>";
                                $message .= "<table class=\"general\" style=\"margin:0 auto;\"><tr><td $textLeft>Appointment Date</td><td>:</td><td $textLeft>".format_date($this->appointment_date)."</td></tr>";
                                $message .= "<tr><td $textLeft>Appointment Time</td><td>:</td><td $textLeft>".$this->appointment_time."</td></tr>";
                                $message .= "<tr><td $textLeft>Service Type</td><td>:</td><td $textLeft>".$this->service_type."</td></tr>";
                                $message .= "<tr><td $textLeft>Your Name</td><td>:</td><td $textLeft>".$this->appointment_name."</td></tr>";
                                $message .= "<tr><td $textLeft>Telephone Number</td><td>:</td><td $textLeft>".$this->appointment_telephone."</td></tr>";
                                $message .= "<tr><td $textLeft>E-mail Address</td><td>:</td><td $textLeft>".$this->appointment_email."</td></tr>";
                                $message .= "<tr><td $textLeft>NRIC / FIN</td><td>:</td><td $textLeft>".$this->appointment_nric."</td></tr>";
                                $message .= "<tr><td $textLeft>Location</td><td>:</td><td $textLeft>".$this->location."</td></tr>";
                                if($this->location == 1){
                                    $message .= "<tr><td $textLeft>Address</td><td>:</td><td $textLeft>".$this->appointment_address."</td></tr>";
                                }
                                $message .= "</table></div><br>";


                                $message .= "</body>";
                                $headers  = "MIME-Version: 1.0" . PHP_EOL;
                                $headers .= "Content-Type: text/html; charset=ISO-8859-1" . PHP_EOL;
                                $headers .= "From: HairPlus Lab - ".SENDER_EMAIL;

                                $status = mail($this->appointment_email, $subject, $message, $headers);
                        }

    }
}
?>
