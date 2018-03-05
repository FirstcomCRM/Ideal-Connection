<?php
/*
 * To change this tservicestypeate, choose Tools | Tservicestypeates
 * and open the tservicestypeate in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class ServicesType {

    public function ServicesType(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();
        

    }
    public function create(){
        $table_field = array('service_title','service_start','service_end','service_duration','service_status','service_desc','service_seqno','service_booking_max','service_location');
        $table_value = array($this->servicestype_title,$this->servicestype_time_start,$this->servicestype_time_end,$this->servicestype_duration,1,$this->servicestype_desc,$this->servicestype_seqno, $this->servicestype_max,$this->servicestype_location);
        $remark = "Insert Services.";
        if(!$this->save->SaveData($table_field,$table_value,'db_servicestype','service_id',$remark)){
           return false;
        }else{
           $this->servicestype_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){

        $table_field = array('service_title','service_start','service_end','service_duration','service_status','service_desc','service_seqno','service_booking_max','service_location');
        $table_value = array($this->servicestype_title,$this->servicestype_time_start,$this->servicestype_time_end,$this->servicestype_duration,1,$this->servicestype_desc,$this->servicestype_seqno, $this->servicestype_max,$this->servicestype_location);
        $remark = "Update Services.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_servicestype','service_id',$remark,$this->servicestype_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchServicesDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_servicestype WHERE service_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->servicestype_id = $row['service_id'];
            $this->servicestype_title = $row['service_title'];
            $this->servicestype_time_start = $row['service_start'];
            $this->servicestype_time_end = $row['service_end'];
            $this->servicestype_duration = $row['service_duration'];
            $this->servicestype_desc = $row['service_desc'];
            $this->servicestype_seqno = $row['service_seqno'];
            $this->servicestype_max = $row['service_booking_max'];
            $this->servicestype_location = $row['service_location'];
        }
        return $query;
    }
    public function delete(){
        $table_field = array('service_status');
        $table_value = array(0);
        $remark = "Delete Service.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_servicestype','service_id',$remark,$this->servicestype_id)){
           return false;
        }else{
           return true;
        }
    }
    public function getInputForm($action){
        global $mandatory;
        $this->locationCrtl = $this->select->getLocationSelectCtrl($this->servicestype_location);
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Services Management</title>
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
            <h1>Services Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->currency_id > 0){ echo "Update Services";}else{ echo "Create New Services";}?></h3>
                <button type = "button" class="btn btn-primary pull-right" style = 'width:150px;' onclick = "window.location.href='servicestype.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-primary pull-right" style = 'width:150px;margin-right:10px;' onclick = "window.location.href='servicestype.php?action=createForm'">Create New</button>
                <?php }?>
              </div>
                
                <form id = 'servicestype_form' class="form-horizontal" action = 'servicestype.php?action=create' method = "POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="servicestype_title" class="col-sm-2 control-label">Service Title <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="servicestype_title" name="servicestype_title" placeholder="Service Title" value = "<?php echo $this->servicestype_title;?>">
                      </div>
                      <label for="servicestype_seqno" class="col-sm-2 control-label">Seq No</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="servicestype_seqno" name="servicestype_seqno" value = "<?php echo $this->servicestype_seqno;?>" placeholder="Seq No">
                      </div>
                    </div> 
                    <div class="form-group ">
                        <label for="servicestype_time_start" class="col-sm-2 control-label">Service time (Start) <?php echo $mandatory?></label>
                        <div class="col-sm-3 input-group bootstrap-timepicker" style = 'float:left;padding-right: 15px;padding-left: 15px;' >
                            <input type="text" class="form-control timepicker" id="servicestype_time_start" name="servicestype_time_start" value = "<?php echo $this->servicestype_time_start;?>">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>

                        <label for="servicestype_time_end" class="col-sm-2 control-label">Service time (End) <?php echo $mandatory?></label>
                        <div class="col-sm-3 input-group bootstrap-timepicker" style = 'float:left;padding-right: 15px;padding-left: 15px;'>
                            <input type="text" class="form-control timepicker" id="servicestype_time_end" name="servicestype_time_end" value = "<?php echo $this->servicestype_time_end;?>">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="servicestype_duration" class="col-sm-2 control-label">Service Duration (one time of service in minute) <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="servicestype_duration" name="servicestype_duration" placeholder="Duration" value = "<?php echo $this->servicestype_duration;?>">
                      </div>
                      <label for="servicestype_location" class="col-sm-2 control-label">Outlet Location <?php echo $mandatory;?></label>
                        <div class="col-sm-3">
                             <select class="form-control select2" id="servicestype_location" name="servicestype_location" style = 'width:100%'>
                               <?php echo $this->locationCrtl;?>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
<!--                      <label for="servicestype_max" class="col-sm-2 control-label">Maximum Time Booking in same period <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="servicestype_max" name="servicestype_max" placeholder="eg: 3" value = "<?php echo $this->servicestype_max;?>">
                      </div>-->
                      <label for="servicestype_desc" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-3">
                        <textarea class="form-control" rows="3" id="servicestype_desc" name="servicestype_desc" placeholder="Description"><?php echo $this->servicestype_desc;?></textarea>
                      </div>
                    </div> 
                     
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->servicestype_id;?>" name = "servicestype_id"/>
                    <?php 
                    if($this->servicestype_id > 0){
                        $prm_code = "update";
                    }else{
                        $prm_code = "create";
                    }
                    if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],$prm_code)){?>
                    <button type = "submit" class="btn btn-info">Submit</button>
                    <?php }?>
                  </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once 'footer.php';?>
    </div><!-- ./wrapper -->
    <?php
    include_once 'js.php';
    
    ?>
    <script>
    $(document).ready(function() {
        $("#servicestype_form").validate({
                  rules: 
                  {
                      servicestype_title:
                      {
                          required: true
                      },
                      servicestype_time_start:
                      {
                          required: true
                      },
                      servicestype_time_end:
                      { 
                          required: true
                      },
                      servicestype_duration:
                      {
                          required: true
                      },
//                      servicestype_max:
//                      {
//                          required: true
//                      },
                      servicestype_location:
                      {
                          required: true
                      }        
                  },
                  messages:
                  {
                      servicestype_title:
                      {
                          required: "Please enter Location Title."
                      },
                      servicestype_time_start:
                      {
                          required: "Please enter Service time start."
                      },
                      servicestype_time_end:
                      {
                          required: "Please enter Service time end."
                      },
                      servicestype_duration:
                      {
                          required: "Please enter duration pre one time of service in minute."
                      },
//                      servicestype_max:
//                      {
//                          required: "Please enter maximun booking in same period."
//                      },
                      servicestype_location:
                      {
                          required: "Please select one outlet."
                      }
                      
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
    <title>Services Management</title>
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
            <h1>Services Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Services Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-primary pull-right" onclick = "window.location.href='servicestype.php?action=createForm'">Create New + </button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="servicestype_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:15%'>Service Title</th>
                        <th style = 'width:10%'>Start Time</th>
                        <th style = 'width:10%'>End Time</th>
                        <th style = 'width:20%'>Service Duration</th>
                        <th style = 'width:10%'>Seq No</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php   
                      $sql = "SELECT *
                              FROM db_servicestype
                              WHERE service_id > 0 AND service_status = '1' ORDER BY service_seqno";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['service_title'];?></td>
                            <td><?php echo $row['service_start'];?></td>
                            <td><?php echo $row['service_end'];?></td>
                            <td><?php echo $row['service_duration']." minutes";?></td>
                            <td><?php echo $row['service_seqno'];?></td>
                            <td class = "text-align-right">
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info " onclick = "location.href = 'servicestype.php?action=edit&servicestype_id=<?php echo $row['service_id'];?>'">Edit</button>
                                <?php }?>
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger " onclick = "confirmAlertHref('servicestype.php?action=delete&servicestype_id=<?php echo $row['service_id'];?>','Confirm Delete?')">Delete</button>
                                <?php
                                 }
                                 ?>
                            </td>
                        </tr>
                    <?php    
                        $i++;
                      }
                    ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:15%'>Service Title</th>
                        <th style = 'width:10%'>Start Time</th>
                        <th style = 'width:10%'>End Time</th>
                        <th style = 'width:20%'>Service Duration</th>
                        <th style = 'width:10%'>Seq No</th>
                        <th style = 'width:10%'></th>
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
        $('#servicestype_table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

      });
    </script>
  </body>
</html>
    <?php
    }

}
?>
