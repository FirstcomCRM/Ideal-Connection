<?php
/*
 * To change this tpeak_dayate, choose Tools | Tpeak_dayates
 * and open the tpeak_dayate in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class Peak_day {

    public function Peak_day(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();
        

    }
    public function create(){
        //if 'Date (From)' field is filled and 'Date (To)' is not fill, 
        //then assign 'Date (From)' to 'Date (To)' 
        if($this->peak_day_from != "" && $this->peak_day_to == ""){
            $this->peak_day_to = $this->peak_day_from;
        }
        $table_field = array('peak_day_title','peak_day_from','peak_day_to','peak_day_type','peak_day_remark','peak_day_status');
        $table_value = array($this->peak_day_title,format_date_database($this->peak_day_from),format_date_database($this->peak_day_from),
                             $this->peak_day_type,$this->peak_day_remark, $this->peak_day_status);

        $remark = "Insert Peak Day.";
        if(!$this->save->SaveData($table_field,$table_value,'db_peak_day','peak_day_id',$remark)){
           return false;
        }else{
           $this->peak_day_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
        //if 'Date (From)' field is filled and 'Date (To)' is not fill, 
        //then assign 'Date (From)' to 'Date (To)' 
        if($this->peak_day_from != "" && $this->peak_day_to == ""){
            $this->peak_day_to = $this->peak_day_from;
        }
        $table_field = array('peak_day_title','peak_day_from','peak_day_to','peak_day_type','peak_day_remark','peak_day_status');
        $table_value = array($this->peak_day_title,format_date_database($this->peak_day_from),format_date_database($this->peak_day_from),
                             $this->peak_day_type,$this->peak_day_remark, $this->peak_day_status);
        $remark = "Update Peak Day.";

        if(!$this->save->UpdateData($table_field,$table_value,'db_peak_day','peak_day_id',$remark,$this->peak_day_id)){
           return false;
        }else{
           return true;
        }
    }
    public function delete(){
        $table_field = array('peak_day_status');
        $table_value = array(0);
        $remark = "Delete Peak Day.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_peak_day','peak_day_id',$remark,$this->peak_day_id)){
           return false;
        }else{
           return true;
        }
    }
    

    public function fetchPeakDayDetail($wherestring,$orderstring,$wherelimit,$type){
        global $master_group;
        $sql = "SELECT * FROM db_peak_day WHERE peak_day_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type == 1){
            $row = mysql_fetch_array($query);
            $this->peak_day_id = $row['peak_day_id'];
            $this->peak_day_title = $row['peak_day_title'];
            $this->peak_day_from = $row['peak_day_from'];
            $this->peak_day_to = $row['peak_day_to'];
            $this->peak_day_type = $row['peak_day_type'];
            $this->peak_day_remark = $row['peak_day_remark'];
            $this->peak_day_status = $row['peak_day_status'];

        }
        else if($type == 2){
            return mysql_fetch_array($query);
        }
        if(mysql_num_rows($query) == 0 ){
            return false;
        }
        else{
            return $query;
        }
    }
    
    public function getInputForm($action){
        global $mandatory;
        if($action == 'create'){
            $this->peak_day_status = 1;
            if(escape($_GET['peak_day_from']) != ""){
                $this->peak_day_from = format_date_database(escape($_GET['peak_day_from']));
                $this->peak_day_to = format_date_database(escape($_GET['peak_day_to']));
            }
            else{
                $this->peak_day_from = system_date;
                $this->peak_day_to = system_date;
            }
        }
        $this->peakTypeCrtl = $this->select->getPeakTypeSelectCtrl($this->peak_day_type);  
    ?>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peak Day Management</title>
    <?php
    include_once 'css.php';
    $year = date("Y");

    
    ?>    
    <style>
        .tablenoborder tbody tr td{
            border:none ;
        }
        .tablenoborder tbody tr td{
            border:none ;
        }
        .table-empl-detail td:nth-child(3){
            font-weight: bold;
        }
        .empl-icon-label a i{
            font-size:22px;
        }
    </style>
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
            <h1>Peak Day Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo "Update Peak Day" ?></h3>
                  <button type = "button" class="btn btn-primary pull-right" style = '' onclick = "window.location.href='peak_day.php'">Search</button>
                  <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                  <button type = "button" class="btn btn-primary pull-right" style = 'margin-right:10px;' onclick = "window.location.href='peak_day.php?action=createForm'">Create New</button>
                  <?php }?>
                </div>

                <form id = 'peak_day_form' class="form-horizontal" action = 'peak_day.php' method = "POST" enctype="multipart/form-data">
                  <div class="box-body">
                        <div class="form-group">
                            <label for="peak_day_title" class="col-sm-2 control-label" >Title <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="peak_day_title" name="peak_day_title" value = "<?php echo $this->peak_day_title;?>" placeholder="Title">
                            </div>
                            <label for="peak_day_type" class="col-sm-2 control-label" >Peak Type <?php echo $mandatory;?> </label>
                            <div class="col-sm-3">
                                <select class="form-control select2" id="peak_day_type" name="peak_day_type" style = 'width:100%'>
                                    <?php echo $this->peakTypeCrtl;?>
                                </select>                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="peak_day_from" class="col-sm-2 control-label" >Date <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepicker" id="peak_day_from" name="peak_day_from" value = "<?php echo format_date($this->peak_day_from);?>" placeholder="Date (From)">
                            </div>
                            <label for="peak_day_remark" class="col-sm-2 control-label">Remark</label>
                            <div class="col-sm-3">
                                <textarea class="form-control" rows="5" id="user_remark" name="peak_day_remark" placeholder="Remark"><?php echo $this->peak_day_remark;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
<!--                            <label for="peak_day_to" class="col-sm-2 control-label" >Date (To) </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepicker" id="peak_day_to" name="peak_day_to" value = "<?php echo format_date($this->peak_day_to);?>" placeholder="Date (To)">
                            </div>-->
                        </div>
                   </div>
                  <div class="box-footer">
                    <button type="button" class="btn btn-default" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->peak_day_status;?>" name = "peak_day_status"/>
                    <input type = "hidden" value = "<?php echo $this->peak_day_id;?>" name = "peak_day_id"/>
                    <?php 
                    if($this->peak_day_id > 0){
                        $prm_code = "update";
                    }else{
                        $prm_code = "create";
                    }
                    if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],$prm_code)){?>
                        <button type = "submit" class="btn btn-info">Submit</button>
                    <?php 
                    }
?>
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
        $("#peak_day_form").validate({
                  rules: 
                  {
                      peak_day_title:
                      {
                          required: true
                      },
                      peak_day_type:
                      {
                          required: true
                      },
                      peak_day_from:
                      {
                          required: true
                      }
                  }
              });          
              
        $('#peak_day_from').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            pickerPosition: "bottom-left"
        }).on('changeDate', function (ev) {
            $('#peak_day_to').datepicker('setStartDate', ev.date);
        });
        
        $('#peak_day_to').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate:$('#peak_day_from').val(),
            pickerPosition: "bottom-left"
        });  
    });

    </script>
  </body>
</html>
        <?php
        
    }
    public function getListing(){
        global $master_group;
    ?>
    <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peak Day Management</title>
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
            <h1>Peak Day Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Peak Day Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-primary pull-right" onclick = "window.location.href='peak_day.php?action=createForm'">Create New + </button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="peak_day_table" class="table table-bordered table-hover ">
                    <thead>
                      <tr>
                        <th style = 'width:4%'>No</th>
                        <th style = 'width:13%'>Title</th>
                        <th style = 'width:10%'>Date</th>
                        <!--<th style = 'width:13%'>To</th>-->
                        <th style = 'width:10%'>Type</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                        
                    <?php


                        $sql = "SELECT * FROM db_peak_day pd, db_peak_type pt
                              WHERE pd.peak_day_id > 0 AND pd.peak_day_status = 1 AND pd.peak_day_type = pt.peak_type_id
                              ORDER BY pd.insertDateTime";
                        $query = mysql_query($sql);
                        $i = 1;
                        while($row = mysql_fetch_array($query)){?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['peak_day_title'];?></td>
                            <td><?php echo format_date($row['peak_day_from']);?></td>
                            <!--<td><?php echo format_date($row['peak_day_to']);?></td>-->
                            <td><?php echo $row['peak_type_name'];?></td>
                            <td class = "text-align-right">
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>    
                                    <button type="button" class="btn btn-primary btn-info " onclick = "location.href = 'peak_day.php?action=edit&peak_day_id=<?php echo $row['peak_day_id'];?>'">Edit</button>
                                <?php  }?>
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                    <button type="button" class="btn btn-primary btn-danger " onclick = "confirmAlertHref('peak_day.php?action=delete&peak_day_id=<?php echo $row['peak_day_id'];?>','Confirm Delete?')">Delete</button>
                                <?php      
                                }
                                ?>
                            </td>
                        </tr>                            
                    <?php  $i++;  
                       }
                    ?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th style = 'width:4%'>No</th>
                        <th style = 'width:13%'>Title</th>
                        <th style = 'width:10%'>Date</th>
                        <!--<th style = 'width:13%'>To</th>-->
                        <th style = 'width:10%'>Type</th>
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
        
        $('#peak_day_table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
          
        }).search("<?php echo $_REQUEST['filter'];?>").draw();

      });
    </script>
  </body>
</html>
    <?php
    }
    

    
    public function checkAccess($action){
        global $master_group;
        if(($action == 'createForm') || ($action == 'create') || ($action == '')){
            return true;
        }
        if(!in_array($_SESSION['empl_group'],$master_group)){
            $empl_id = getDataCodeBySql("peak_day_empl_id","db_peak_day"," WHERE peak_day_id = '$this->peak_day_id'","");
            $record_count = getDataCountBySql("db_peak_day"," WHERE peak_day_empl_id = '$empl_id'");

            if(((($empl_id <= 0) && ($record_count == 0)) || ($empl_id != $_SESSION['empl_id']))){
                permissionLog();
                rediectUrl("dashboard.php",getSystemMsg(0,'Permission Denied'));
                exit();
            }
        }
    }
}
?>
