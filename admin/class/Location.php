<?php
/*
 * To change this tlocationate, choose Tools | Tlocationates
 * and open the tlocationate in the editor.
 */

/**
 * Description of User
 *
 * @author jason
 */
class Location {

    public function Location(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();


    }
    public function create(){
        $table_field = array('location_title','location_postal_code','location_address','location_desc','location_type','location_status');
        $table_value = array($this->location_title,$this->location_postal_code,$this->location_address,$this->location_desc,$this->location_type,$this->location_status);
        $remark = "Insert Location.";
        if(!$this->save->SaveData($table_field,$table_value,'db_location','location_id',$remark)){
           return false;
        }else{
           $this->location_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
      //  $table_field = array('location_title','location_postal_code','location_unit_no','location_address','location_desc','location_status');
    //    $table_value = array($this->location_title,$this->location_postal_code,$this->location_unit_no,$this->location_address,$this->location_desc,$this->location_status);
      $table_field = array('location_title','location_postal_code','location_address','location_desc','location_type','location_status');
      $table_value = array($this->location_title,$this->location_postal_code,$this->location_address,$this->location_desc,$this->location_type,$this->location_status);

        $remark = "Update Location.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_location','location_id',$remark,$this->location_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchLocationDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_location WHERE location_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->location_id = $row['location_id'];
            $this->location_title = $row['location_title'];
            $this->location_postal_code = $row['location_postal_code'];
            $this->location_unit_no = $row['location_unit_no'];
            $this->location_address = $row['location_address'];
            $this->location_desc = $row['location_desc'];
            $this->location_status = $row['location_status'];
            $this->location_type = $row['location_type'];

        }
        return $query;
    }
    public function delete(){
        if($this->save->DeleteData("db_location"," WHERE location_id = '$this->location_id'","Delete Location.")){
            return true;
        }else{
            return false;
        }
    }
    public function getInputForm($action){

        $this->loctype_ctrl= $this->select->getLocType($this->location_type,'Y');

        global $mandatory;
        if($this->location_id < 1){
            $this->location_status = 1;
        }
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Location Management</title>
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
            <h1>Location Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->currency_id > 0){ echo "Update Location";}else{ echo "Create New Location";}?></h3>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;' onclick = "window.location.href='location.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;margin-right:10px;' onclick = "window.location.href='location.php?action=createForm'"> + Add Location</button>
                <?php }?>
              </div>

                <form id = 'location_form' class="form-horizontal" action = 'location.php?action=create' method = "POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="location_title" class="col-sm-2 control-label">Location Title <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="location_title" name="location_title" placeholder="Location Title" value = "<?php echo $this->location_title;?>">
                      </div>
                      <label for="location_status" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-3">
                         <select class="form-control" id="location_status" name="location_status">
                              <option value = '1' <?php if($this->location_status == 1){ echo 'SELECTED';}?>>Active</option>
                              <option value = '0' <?php if($this->location_status == 0){ echo 'SELECTED';}?>>In-Active</option>
                         </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="location_postal_code" class="col-sm-2 control-label">Postal Code <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" onkeyup="checkEnter()"  id="location_postal_code" name="location_postal_code" value = "<?php echo $this->location_postal_code;?>" placeholder="Postal Code">
                      </div>
                      <label for="location_unit_no" class="col-sm-2 control-label">Location Type <?php // echo $mandatory?></label>
                      <div class="col-sm-3">
                        <select class="form-control" id="location_type" name="location_type">
                            <?php echo $this->loctype_ctrl?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="location_address" class="col-sm-2 control-label">Address <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                            <textarea class="form-control" rows="3" id="location_address" name="location_address" placeholder="Address" readonly><?php echo $this->location_address;?></textarea>
                      </div>
                      <label for="location_desc" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-3">
                            <textarea class="form-control" rows="3" id="location_desc" name="location_desc" placeholder="Description"><?php echo $this->location_desc;?></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default radius_button" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->location_id;?>" name = "location_id"/>
                    <?php
                    if($this->location_id > 0){
                        $prm_code = "update";
                    }else{
                        $prm_code = "create";
                    }
                    if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],$prm_code)){?>
                    <button type = "submit" class="btn btn-info radius_button">Submit</button>
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
        $("#location_form").validate({
                  rules:
                  {
                      location_title:
                      {
                          required: true
                      },
//                      location_unit_no:
//                      {
//                          required: true
//                      },
                      location_postal_code:
                      {
                          required: true
                      },
                      location_address:
                      {
                          required: true
                      },
                  },
                  messages:
                  {
                      location_title:
                      {
                          required: "Please enter Location Title."
                      },
                      location_postal_code:
                      {
                          required: "Please enter Postal Code."
                      },
//                      location_unit_no:
//                      {
//                          required: "Please enter Unit Number."
//                      },
                      location_address:
                      {
                          required: "Please enter Address."
                      }
                  }
              });


});
    </script>

<script type = "text/javascript">
			function checkEnter() {
				var x =  document.getElementById('location_postal_code').value;
				function Cloud(){
					jQuery.ajax({
						url: 'https://developers.onemap.sg/commonapi/search?searchVal='+x+'&returnGeom=Y&getAddrDetails=Y&pageNum=1',
						success: function(result){
							var TrueResult = JSON.stringify(result);
							jQuery.each(jQuery.parseJSON(TrueResult), function (item, value) {
								if (item == "results") {
									jQuery.each(value, function (i, object) {
										jQuery.each(object, function (subI, subObject) {
											if (subI == 'ADDRESS'){
												jQuery('#location_address').val(subObject);
											}
										});
									});
								}
							});
						}});
				}
				Cloud();
			}
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
    <title>Location Management</title>
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
            <h1>Location Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Location Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-info pull-right radius_button" style = "width:150px" onclick = "window.location.href='location.php?action=createForm'"> + Add New Location</button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="location_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:15%'>Location Title</th>
                        <th style = 'width:10%'>Postal Code</th>
                        <th style = 'width:10%'>Unit Number</th>
                        <th style = 'width:20%'>Address</th>
                        <th style = 'width:10%'>No. of Booth</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT *
                              FROM db_location
                              WHERE location_id > 0 AND location_status = '1' ORDER BY location_title DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['location_title'];?></td>
                            <td><?php echo $row['location_postal_code'];?></td>
                            <td><?php echo $row['location_unit_no'];?></td>
                            <td><?php echo $row['location_address'];?></td>
                            <td></td>
                            <td class = "text-align-right">
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info small_radius_button" onclick = "location.href = 'location.php?action=edit&location_id=<?php echo $row['location_id'];?>'">Edit</button>
                                <?php }?>
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger small_radius_button" onclick = "confirmAlertHref('location.php?action=delete&location_id=<?php echo $row['location_id'];?>','Confirm Delete?')">Delete</button>
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
                        <th style = 'width:15%'>Location Title</th>
                        <th style = 'width:10%'>Postal Code</th>
                        <th style = 'width:10%'>Unit Number</th>
                        <th style = 'width:20%'>Address</th>
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
        $('#location_table').DataTable({
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
