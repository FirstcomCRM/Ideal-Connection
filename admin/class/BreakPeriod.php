<?php
/*
 * To change this tbreakperiodate, choose Tools | Tbreakperiodates
 * and open the tbreakperiodate in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class BreakPeriod {

    public function BreakPeriod(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();
        

    }
    public function create(){
        $table_field = array('breakperiod_title','breakperiod_service_type','breakperiod_date','breakperiod_starttime','breakperiod_endtime','breakperiod_desc','breakperiod_status','breakperiod_daytype','breakperiod_location');
        $table_value = array($this->breakperiod_title,$this->service_type, format_date_database($this->breakperiod_startdate),$this->breakperiod_time_start,$this->breakperiod_time_end, $this->breakperiod_desc,1,$this->breakperiod_daytype,$this->breakperiod_location);
        $remark = "Insert Break Period.";
        if(!$this->save->SaveData($table_field,$table_value,'db_breakperiod','breakperiod_id',$remark)){
           return false;
        }else{
           $this->breakperiod_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
        $table_field = array('breakperiod_title','breakperiod_service_type','breakperiod_date','breakperiod_starttime','breakperiod_endtime','breakperiod_desc','breakperiod_daytype','breakperiod_location');
        $table_value = array($this->breakperiod_title,$this->service_type, format_date_database($this->breakperiod_startdate),$this->breakperiod_time_start,$this->breakperiod_time_end, $this->breakperiod_desc,$this->breakperiod_daytype,$this->breakperiod_location);
        $remark = "Update Break Period.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_breakperiod','breakperiod_id',$remark,$this->breakperiod_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchBreakPeriodDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_breakperiod WHERE breakperiod_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->breakperiod_id = $row['breakperiod_id'];
            $this->breakperiod_title = $row['breakperiod_title'];
            $this->service_type = $row['breakperiod_service_type'];
            $this->breakperiod_startdate = $row['breakperiod_date'];
            $this->breakperiod_time_start = $row['breakperiod_starttime'];
            $this->breakperiod_time_end = $row['breakperiod_endtime'];
            $this->breakperiod_desc = $row['breakperiod_desc'];
            $this->breakperiod_daytype = $row['breakperiod_daytype'];
            $this->breakperiod_location = $row['breakperiod_location'];
        }
        return $query;
    }
    public function delete(){
        $table_field = array('breakperiod_status');
        $table_value = array(0);
        $remark = "Delete Service.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_breakperiod','breakperiod_id',$remark,$this->breakperiod_id)){
           return false;
        }else{
           return true;
        }
    }
    public function getInputForm($action){
        global $mandatory;
        $this->service_typeCrtl = $this->select->getBPServiceTypeSelectCtrl($this->service_type);
        $this->locationCrtl = $this->select->getLocationSelectCtrl($this->breakperiod_location);
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Break Period Management</title>
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
            <h1>Break Period Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->currency_id > 0){ echo "Update Break Period";}else{ echo "Create New Break Period";}?></h3>
                <button type = "button" class="btn btn-primary pull-right" style = 'width:150px;' onclick = "window.location.href='breakperiod.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-primary pull-right" style = 'width:150px;margin-right:10px;' onclick = "window.location.href='breakperiod.php?action=createForm'">Create New</button>
                <?php }?>
              </div>
                
                <form id = 'breakperiod_form' class="form-horizontal" action = 'breakperiod.php?action=create' method = "POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="breakperiod_daytype" class="col-sm-2 control-label">Full / Half Day</label>
                      <div class="col-sm-3">
                           <select class="form-control select2" id="breakperiod_daytype" name="breakperiod_daytype" style = 'width:100%'>
                               <option value="1" <?php if($this->breakperiod_daytype == "1"){echo "SELECTED";}?>>Full Day</option>
                               <option value="2" <?php if($this->breakperiod_daytype == "2"){echo "SELECTED";}?>>Half Day</option>
                           </select>
                      </div>
                      <label for="breakperiod_startdate" class="col-sm-2 control-label">Date <?php echo $mandatory?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" id="breakperiod_startdate" name="breakperiod_startdate" value = "<?php echo format_date($this->breakperiod_startdate);?>" placeholder="Date">
                        </div>
                    </div> 
                    <div class="form-group">
                      <label for="service_type" class="col-sm-2 control-label">Service Type <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                           <select class="form-control select2" id="service_type" name="service_type" style = 'width:100%'>
                                  <?php echo $this->service_typeCrtl;?>
                           </select>
                      </div>                        
                      <label for="breakperiod_title" class="col-sm-2 control-label">Break Title <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="breakperiod_title" name="breakperiod_title" placeholder="Service Title" value = "<?php echo $this->breakperiod_title;?>">
                      </div>
                    </div> 
                    <!--<div class="form-group">-->
<!--                        <label for="breakperiod_startdate" class="col-sm-2 control-label">Start Date <?php echo $mandatory?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" id="breakperiod_startdate" name="breakperiod_startdate" value = "<?php echo format_date($this->breakperiod_startdate);?>" placeholder="Date">
                        </div>    -->
<!--                        <label for="breakperiod_enddate" class="col-sm-2 control-label">End Date <?php echo $mandatory?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" id="breakperiod_enddate" name="breakperiod_enddate" value = "<?php echo format_date($this->breakperiod_enddate);?>" placeholder="Date">
                        </div>                -->
                    <!--</div>-->
                    <div class="form-group timing">
                        <label for="breakperiod_time_start" class="col-sm-2 control-label">Break time (Start) <?php echo $mandatory?></label>
                        <div class="col-sm-3 input-group bootstrap-timepicker" style = 'float:left;padding-right: 15px;padding-left: 15px;' >
                            <input type="text" class="form-control timepicker" id="breakperiod_time_start" name="breakperiod_time_start" value = "<?php echo $this->breakperiod_time_start;?>">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>

                        <label for="breakperiod_time_end" class="col-sm-2 control-label">Break time (End) <?php echo $mandatory?></label>
                        <div class="col-sm-3 input-group bootstrap-timepicker" style = 'float:left;padding-right: 15px;padding-left: 15px;'>
                            <input type="text" class="form-control timepicker" id="breakperiod_time_end" name="breakperiod_time_end" value = "<?php echo $this->breakperiod_time_end;?>">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="breakperiod_location" class="col-sm-2 control-label">Outlet Location <?php echo $mandatory;?></label>
                        <div class="col-sm-3">
                             <select class="form-control select2" id="breakperiod_location" name="breakperiod_location" style = 'width:100%'>
                               <?php echo $this->locationCrtl;?>
                             </select>
                        </div>
                      <label for="breakperiod_desc" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-3">
                        <textarea class="form-control" rows="3" id="breakperiod_desc" name="breakperiod_desc" placeholder="Description"><?php echo $this->breakperiod_desc;?></textarea>
                      </div>
                    </div>
                     
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->breakperiod_id;?>" name = "breakperiod_id"/>
                    <?php 
                    if($this->breakperiod_id > 0){
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
        $("#breakperiod_form").validate({
            ignore:":not(:visible)",
                  rules: 
                  {
                      service_type:
                      {
                          required: true
                      },
                      breakperiod_title:
                      {
                          required: true
                      },
                      breakperiod_startdate:
                      {
                          required: true
                      },
                      breakperiod_enddate:
                      { 
                          required: true
                      },
                      breakperiod_time_start:
                      {
                          required: true
                      },
                      breakperiod_time_end:
                      {
                          required: true
                      },
                      breakperiod_location:
                      {
                          required: true
                      },
                  },
                  messages:
                  {
                      service_type:
                      {
                          required: "Please select service type."
                      },
                      breakperiod_title:
                      {
                          required: "Please enter Location Title."
                      },
                      breakperiod_startdate:
                      {
                          required: "Please enter date Start."
                      },
                      breakperiod_enddate:
                      { 
                          required: "Please enter date End"
                      },
                      breakperiod_time_start:
                      {
                          required: "Please enter time Start."
                      },
                      breakperiod_time_end:
                      {
                          required: "Please enter time End."
                      },
                      breakperiod_location:
                      {
                          required: "Please select one location."
                      }
                  }
              });
              
        $('#breakperiod_daytype').change(function(){
            var data = $(this);
            if(data.val() == "2"){
                $('.timing').show();
            }
            else
            {
                $('.timing').hide();
            }
        });
        
            if($('#breakperiod_daytype').val() == "2"){
                $('.timing').show();
            }
            else
            {
                $('.timing').hide();
            }   
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
    <title>Break Period Management</title>
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
            <h1>Break Period Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Break Period Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-primary pull-right" onclick = "window.location.href='breakperiod.php?action=createForm'">Create New + </button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="breakperiod_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:15%'>Service Type</th>
                        <th style = 'width:10%'>Title</th>
                        <th style = 'width:10%'>Day Type</th>
                        <th style = 'width:10%'>Date</th>
                        <th style = 'width:10%'>Time Start</th>
                        <th style = 'width:10%'>Time End</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php   
                      $sql = "SELECT *
                              FROM db_breakperiod
                              WHERE breakperiod_id > 0 AND breakperiod_status = '1' ORDER BY insertDateTime";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td>
                                <?php
                                $sql2 = "SELECT service_title FROM db_servicestype WHERE service_id = '$row[breakperiod_service_type]'";
                                $query2 = mysql_query($sql2);
                                $row2 = mysql_fetch_array($query2);
                                echo $row2['service_title'];
                                ?>
                            </td>
                            <td><?php echo $row['breakperiod_title'];?></td>
                            <td>
                            <?php 
                                if($row['breakperiod_daytype'] == 1){echo "Full Day";}
                                else{echo "Half Day";}
                            ?>
                            </td>
                            <td><?php echo format_date($row['breakperiod_date']);?></td>
                            <td><?php if($row['breakperiod_daytype'] == 1){echo "Full Day";}else{ echo $row['breakperiod_starttime'];}?></td>
                            <td><?php if($row['breakperiod_daytype'] == 1){echo "Full Day";}else{ echo $row['breakperiod_endtime'];}?></td>
                            <td class = "text-align-right">
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info " onclick = "location.href = 'breakperiod.php?action=edit&breakperiod_id=<?php echo $row['breakperiod_id'];?>'">Edit</button>
                                <?php }?>
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger " onclick = "confirmAlertHref('breakperiod.php?action=delete&breakperiod_id=<?php echo $row['breakperiod_id'];?>','Confirm Delete?')">Delete</button>
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
                        <th style = 'width:15%'>Service Type</th>
                        <th style = 'width:10%'>Title</th>
                        <th style = 'width:10%'>Day Type</th>
                        <th style = 'width:10%'>Date</th>
                        <th style = 'width:10%'>Time Start</th>
                        <th style = 'width:10%'>Time End</th>
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
        $('#breakperiod_table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
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
