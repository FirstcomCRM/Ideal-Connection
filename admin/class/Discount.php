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
class Discount {

    public function Location(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();


    }
    public function create(){
        $this->disc_percent = $this->disc_percent/100;
        $table_field = array('disc_code','disc_valid_from','disc_valid_to','disc_percent','disc_amount');
        $table_value = array($this->disc_code,format_date_database($this->disc_valid_from),format_date_database($this->disc_valid_to),$this->disc_percent,$this->disc_amount);
        $remark = "Insert Discount.";
        if(!$this->save->SaveData($table_field,$table_value,'db_discount','disc_id',$remark)){
           return false;
        }else{
           $this->disc_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
        $this->disc_percent = $this->disc_percent/100;
      $table_field = array('disc_code','disc_valid_from','disc_valid_to','disc_percent','disc_amount');
      $table_value = array($this->disc_code,format_date_database($this->disc_valid_from),format_date_database($this->disc_valid_to),$this->disc_percent,$this->disc_amount);
        $remark = "Update Discount.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_discount','disc_id',$remark,$this->disc_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchLocationDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_discount WHERE disc_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->disc_id = $row['disc_id'];
            $this->disc_code = $row['disc_code'];
            $this->disc_valid_from = $row['disc_valid_from'];
            $this->disc_valid_to = $row['disc_valid_to'];
            $this->disc_percent = 100*$row['disc_percent'];
            $this->disc_amount = $row['disc_amount'];
        }
        return $query;
    }
    public function delete(){
        if($this->save->DeleteData("db_discount"," WHERE disc_id = '$this->disc_id'","Delete Discount.")){
            return true;
        }else{
            return false;
        }
    }
    public function getInputForm($action){
        global $mandatory;
        if($this->loctype_id < 1){
            $this->loctype_status = 1;
        }
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Discount Management</title>
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
            <h1>Discount Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->loctype_id > 0){ echo "Update Location";}else{ echo "Create New Location Type";}?></h3>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;' onclick = "window.location.href='discount.php'">Back</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:170px;margin-right:10px;' onclick = "window.location.href='discount.php?action=createForm'"> + Add New Discount</button>
                <?php }?>
              </div>

                <form id = 'location_form' class="form-horizontal" action = 'discount.php?action=create' method = "POST">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Discount Code <?php echo $mandatory ?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  id="disc_code" name="disc_code" value = "<?php echo $this->disc_code;?>" placeholder="Discount Code">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Valid From <?php echo $mandatory ?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control datepicker"   id="disc_valid_from" name="disc_valid_from" value = "<?php echo format_date($this->disc_valid_from);?>" placeholder="Valid From">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Valid To  <?php echo $mandatory ?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control datepicker"  id="disc_valid_to" name="disc_valid_to" value = "<?php echo format_date($this->disc_valid_to);?>" placeholder="Valid To">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Percent </label>
                      <div class="col-sm-3">

                        <input type="text" class="form-control"   id="disc_percent" name="disc_percent" value = "<?php echo $this->disc_percent;?>" placeholder="Percent">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Amount  </label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  id="disc_amount" name="disc_amount" value = "<?php echo $this->disc_amount;?>" placeholder="Amount">
                      </div>
                    </div>


                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!---<button type="button" class="btn btn-default radius_button" onclick = "history.go(-1)">Back</button>--->
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->disc_id;?>" name = "disc_id"/>
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
                      disc_code:
                      {
                          required: true
                      },
                      disc_valid_from:
                      {
                          required: true
                      },
                      disc_valid_to:
                      {
                          required: true
                      },
//
                  },
                  messages:
                  {
                      disc_code:
                      {
                          required: "Discount code is required."
                      },
                      disc_valid_from:
                      {
                          required: "Valid from is required."
                      },
                        disc_valid_to:
                      {
                          required: "Valid to is required."
                      },

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
    <title>Discount Management</title>
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
            <h1>Discount Management </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Location Type Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-info pull-right radius_button" style = "width:150px" onclick = "window.location.href='discount.php?action=createForm'"> + Add Discount</button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="location_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:10%'>No</th>
                        <th style = 'width:40%'>Discount Code</th>
                        <th style = 'width:40%'>Discount Percentage</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    /*  $sql = "SELECT *
                              FROM db_location
                              WHERE location_id > 0 AND location_status = '1' ORDER BY location_title DESC";*/
                        $sql = "SELECT *
                                FROM db_discount
                                ORDER BY disc_id DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['disc_code'];?></td>
                            <td><?php echo 100*$row['disc_percent'];?></td>
                            <td class = "text-align-right">
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info small_radius_button" onclick = "location.href = 'discount.php?action=edit&disc_id=<?php echo $row['disc_id'];?>'">Edit</button>
                                <?php }?>
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger small_radius_button" onclick = "confirmAlertHref('discount.php?action=delete&disc_id=<?php echo $row['disc_id'];?>','Confirm Delete?')">Delete</button>
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
                        <th style = 'width:10%'>No</th>
                        <th style = 'width:40%'>Discount Code</th>
                        <th style = 'width:40%'>Discount Percentage</th>
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
