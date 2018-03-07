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
class SubIndustry {

    public function SubIndustry(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();

    }
    public function create(){

      $table_field = [
        'industry_id',
        'sub_type',
        'sub_desc',
        'sub_status',
      ];

      $table_value = [
        $this->industry_id,
        $this->sub_type,
        $this->sub_desc,
        $this->sub_status,
      ];

        $remark = "Insert SubIndustry.";
        if(!$this->save->SaveData($table_field,$table_value,'db_sub_industry','sub_id',$remark)){
           return false;
        }else{
           $this->sub_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
        $table_field = [
          'industry_id',
          'sub_type',
          'sub_desc',
          'sub_status',
        ];

        $table_value = [
          $this->industry_id,
          $this->sub_type,
          $this->sub_desc,
          $this->sub_status,
        ];

        $remark = "Update Industry.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_sub_industry','sub_id',$remark,$this->sub_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchSubDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_sub_industry WHERE sub_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->sub_id = $row['sub_id'];
            $this->industry_id = $row['industry_id'];
            $this->sub_type = $row['sub_type'];
            $this->sub_desc = $row['sub_desc'];
            $this->sub_status = $row['sub_status'];;
        }
        return $query;
    }
    public function delete(){
        if($this->save->DeleteData("db_sub_industry"," WHERE sub_id = '$this->sub_id'","Delete Sub-Industry.")){
            return true;
        }else{
            return false;
        }
    }
    public function getInputForm($action){
        global $mandatory;

       $this->industry_ctrl= $this->select->getIndustry($this->industry_id,'Y');
        //  die($this->industry_ctrl);
        if($this->sub_status < 1){
            $this->sub_status = 1;
        }
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sub-Industry Type Management</title>
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
            <h1>Sub-Industry Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->industry_id > 0){ echo "Update Sub-Indsutry";}else{ echo "Create Sub-Industry";}?></h3>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;' onclick = "window.location.href='sub_industry.php'">Back</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:170px;margin-right:10px;' onclick = "window.location.href='sub_industry.php?action=createForm'"> + Add Industry</button>
                <?php }?>
              </div>

                <form id = 'location_form' class="form-horizontal" action = 'sub_industry.php?action=create' method = "POST">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Industry Type  </label>
                      <div class="col-sm-3">
                        <select class="form-control" id="industry_id" name="industry_id">
                            <?php echo $this->industry_ctrl?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Sub-Industry Type  </label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="sub_type" name="sub_type" placeholder="Sub-Industry" value = "<?php echo $this->sub_type;?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Status </label>
                      <div class="col-sm-3">
                        <select class="form-control"   id="sub_status" name="suby_status">
                            <option value = '1' <?php if($this->sub_status == 1){ echo 'SELECTED';}?>>Active</option>
                            <option value = '0' <?php if($this->sub_status == 0){ echo 'SELECTED';}?>>In-Active</option>
                       </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="loctpye_type" class="col-sm-2 control-label">Description </label>
                      <div class="col-sm-3">
                        <textarea class="form-control" rows="3" id="sub_desc" name="sub_desc" placeholder="Description" ><?php echo $this->sub_desc;?></textarea>
                      </div>
                    </div>


                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!---<button type="button" class="btn btn-default radius_button" onclick = "history.go(-1)">Back</button>--->
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->sub_id;?>" name = "sub_id"/>
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
                      loctype_type:
                      {
                          required: true
                      },
//
                  },
                  messages:
                  {
                      loctype_type:
                      {
                          required: "Please enter Location Type."
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
    <title>Sub-Industry Type Management</title>
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
            <h1>Sub-Industry Type Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Sub-Industry Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-info pull-right radius_button" style = "width:150px" onclick = "window.location.href='sub_industry.php?action=createForm'"> + Add Sub-Industry</button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="location_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:40%'>Industry Type</th>
                        <th style = 'width:35%'>Sub-Industry Type</th>
                        <th style = 'width:20%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    /*  $sql = "SELECT *
                              FROM db_location
                              WHERE location_id > 0 AND location_status = '1' ORDER BY location_title DESC";*/
                        $sql = "SELECT s.*,i.industry_type
                                FROM db_sub_industry s
                                LEFT JOIN db_industry i ON i.industry_id  = s.industry_id
                                ORDER BY sub_type ASC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['industry_type'];?></td>
                            <td><?php echo $row['sub_type'];?></td>
                            <td class = "text-align-right">
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info small_radius_button" onclick = "location.href = 'sub_industry.php?action=edit&sub_id=<?php echo $row['sub_id'];?>'">Edit</button>
                                <?php }?>
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger small_radius_button" onclick = "confirmAlertHref('sub_industry.php?action=delete&sub_id=<?php echo $row['sub_id'];?>','Confirm Delete?')">Delete</button>
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
                        <th style = 'width:40%'>Industry Type</th>
                        <th style = 'width:35%'>Sub-Industry Type</th>
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
