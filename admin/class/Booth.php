<?php
/*
 * To change this tlocationate, choose Tools | Tlocationates
 * and open the tlocationate in the editor.
 */

/**
 * Description of User
 *
 * @author Casper
 */
class Booth {

    public function Booth(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();


    }
    public function create(){
        $table_field = array('booth_title','booth_price','booth_left','booth_right','booth_location',
                             'booth_unit_no','booth_address','booth_floor','booth_status','booth_desc'
                            );
        $table_value = array($this->booth_title,$this->booth_price,$this->booth_left,$this->booth_right,$this->booth_location,
                             $this->booth_unit_no,$this->booth_address,$this->booth_floor,$this->booth_status,$this->booth_desc
                            );
        $remark = "Insert Booth.";
        if(!$this->save->SaveData($table_field,$table_value,'db_booth','booth_id',$remark)){
           return false;
        }else{
           $this->booth_id = $this->save->lastInsert_id;
           return true;
        }
    }
    public function update(){
        $table_field = array('booth_title','booth_price','booth_left','booth_right','booth_location',
                             'booth_unit_no','booth_address','booth_floor','booth_status','booth_desc'
                            );
        $table_value = array($this->booth_title,$this->booth_price,$this->booth_left,$this->booth_right,$this->booth_location,
                             $this->booth_unit_no,$this->booth_address,$this->booth_floor,$this->booth_status,$this->booth_desc
                            );
        $remark = "Update Booth.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_booth','booth_id',$remark,$this->booth_id)){
           return false;
        }else{
           return true;
        }
    }
    public function fetchBoothDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_booth WHERE booth_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->booth_id = $row['booth_id'];
            $this->booth_title = $row['booth_title'];
            $this->booth_price = $row['booth_price'];
            $this->booth_left = $row['booth_left'];
            $this->booth_right = $row['booth_right'];
            $this->booth_location = $row['booth_location'];
            $this->booth_unit_no = $row['booth_unit_no'];
            $this->booth_address = $row['booth_address'];
            $this->booth_floor = $row['booth_floor'];
            $this->booth_status = $row['booth_status'];
            $this->booth_desc = $row['booth_desc'];
        }
        return $query;
    }
    public function delete(){
        if($this->save->DeleteData("db_booth"," WHERE booth_id = '$this->booth_id'","Delete Booth.")){
            return true;
        }else{
            return false;
        }
    }
    public function getInputForm($action){
        global $mandatory;

        $this->location_Crtl = $this->select->getLocationCtrl($this->booth_location);
        $this->boothleft_Crtl = $this->select->getBoothCtrl($this->booth_left,$this->booth_id);
        $this->boothright_Crtl = $this->select->getBoothCtrl($this->booth_right,$this->booth_id);
        if($this->booth_id < 1){
            $this->booth_status = 1;
        }
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booth Management</title>
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
            <h1>Booth Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->currency_id > 0){ echo "Update Booth";}else{ echo "Create New Booth";}?></h3>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;' onclick = "window.location.href='booth.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;margin-right:10px;' onclick = "window.location.href='booth.php?action=createForm'"> + Add Booth</button>
                <?php }?>
              </div>

                <form id = 'booth_form' class="form-horizontal" action = 'booth.php?action=create' method = "POST">
                    <input type ='hidden' name = 'current_tab' id = 'current_tab' value = "<?php echo $this->current_tab?>"/>
                  <div class="box-body">

                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li tab = "General Info" class="tab_header <?php if(($this->current_tab == "") || ($this->current_tab == "General Info")){ echo 'active';}?>"><a href="#general" data-toggle="tab">General Info</a></li>
                          <li tab = "image" class="tab_header <?php if($this->current_tab == "image"){ echo 'active';}?>" ><a href="#image" data-toggle="tab">Image</a></li>
                          <li tab = "Files" class="tab_header <?php if(($this->current_tab == "Files") || ($this->current_tab == "Files")){ echo 'active';}?>"><a href="#files" data-toggle="tab">Files</a></li>
                          <li tab = "Calendar" class="tab_header <?php if($this->current_tab == "Calendar"){ echo 'active';}?>" ><a href="#calendar" data-toggle="tab">Calendar</a></li>
                        </ul>
                      </div>
                      <div class="tab-content">
                          <div class=" tab-pane <?php if(($this->current_tab == "") || ($this->current_tab == "General Info")){ echo 'active';}?>" id="general">
                              <?php echo $this->getGeneralForm();?>
                          </div>
                          <div class=" tab-pane <?php if($this->current_tab == "image"){ echo 'active';}?>" id="image">
                              <?php echo $this->getUploadImageForm();?>
                          </div>
                          <div class=" tab-pane <?php if($this->current_tab == "files"){ echo 'active';}?>" id="files">

                            <?php echo $this->getFileUploads();?>
                          </div>
                          <div class=" tab-pane <?php if($this->current_tab == "calendar"){ echo 'active';}?>" id="calendar">
                            <h4>Calendar</h4>
                          </div>
                      </div>

                  <div class="box-footer">
                    <button type="button" class="btn btn-default radius_button" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->booth_id;?>" name = "booth_id"/>
                    <?php
                    if($this->booth_id > 0){
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
        $("#booth_form").validate({
                  rules:
                  {
                      booth_title:
                      {
                          required: true
                      },
                      booth_price:
                      {
                          required: true
                      },
                      booth_left:
                      {
                          required: true
                      },
                      booth_right:
                      {
                          required: true
                      },
                      booth_location:
                      {
                          required: true
                      }
                  },
                  messages:
                  {
                      booth_title:
                      {
                          required: "Please enter Booth Title."
                      },
                      booth_price:
                      {
                          required: "Please enter Booth Price."
                      },
                      booth_left:
                      {
                          required: "Please select Left Booth."
                      },
                      booth_right:
                      {
                          required: "Please select Right Booth."
                      },
                      booth_location:
                      {
                          required: "Please select one Location."
                      }
                  }
              });

        $('#booth_location').on('change',function(){
            var data = "action=getDetail&field_id="+$(this).val()+"&table=db_location&main_field=location_id&field=location_address";
            $.ajax({
                type: 'POST',
                url: 'booth.php',
                cache: false,
                data:data,
                error: function(xhr) {
                    alert("System Error.");
                    issend = false;
                },
                success: function(data) {
                   issend = false;
                   var jsonObj = eval ("(" + data + ")");
                   $('#booth_address').val(jsonObj.data['location_address']);
                }
             });
        });

              $('.upload_image_btn').click(function(){
                var fd = new FormData(document.getElementById("booth_form"));
                fd.append('action','uploadImage');
                fd.append('booth_id','<?php echo $this->booth_id;?>');
                $.ajax({
                    type: 'POST',
                    url: 'booth.php',
                    cache: false,
                    data:fd,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    async: false,
                    error: function(xhr) {
                        alert("System Error.");
                        issend = false;
                    },
                    success: function(fd) {
                       var jsonObj = eval ("(" + fd + ")");
                       issend = false;
                    }
                 });
                //    console.log(jsonObj);
                 var url = '<?php echo $_SERVER['PHP_SELF'] . "?action=edit&booth_id={$_REQUEST['booth_id']}";?>';
                 window.location.href = url + "&current_tab=image";
                 return false;
            });

            //edr For file button upload
            $('.upload_file_btn').click(function(){
                    var fd = new FormData(document.getElementById("booth_form"));
                        fd.append('action','uploadFile');
                        fd.append('booth_id','<?php echo $this->booth_id;?>');
                        $.ajax({
                            type: 'POST',
                            url: 'booth.php',
                            cache: false,
                            data:fd,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            async: false,
                            error: function(xhr) {

                                alert("System Error.");
                                issend = false;
                            },
                            success: function(fd) {
                            //  alert(fd);
                               var jsonObj = eval ("(" + fd + ")");
                               issend = false;
                            }
                         });

                         //console.log(fd);

                         var url = '<?php echo $_SERVER['PHP_SELF'] . "?action=edit&booth_id={$_REQUEST['booth_id']}";?>';
                         window.location.href = url + "&current_tab=files";
                         return false;
                    });



        $('.main').change(function(){
          var r = confirm("Confirm change main image setting");
          if(r == true){
              var data = "action=setMainImage&image_id="+$(this).attr("pid")+"&booth_id=<?php echo $this->booth_id?>";
             $.ajax({
                type: "POST",
                url: "booth.php",
                data:data,
                success: function(data) {
                    var jsonObj = eval ("(" + data + ")");
                         window.location.reload();
                }
             });
         }else{
             window.location.reload();
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
    <title>Booth Management</title>
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
            <h1>Booth Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Booth Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-info pull-right radius_button" style = "width:150px" onclick = "window.location.href='booth.php?action=createForm'"> + Add New Booth</button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="booth_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:15%'>Booth Title</th>
                        <th style = 'width:10%'>Pricing</th>
                        <th style = 'width:10%'>Status</th>
                        <th style = 'width:15%'>location</th>
                        <th style = 'width:15%'>Description</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT *
                              FROM db_booth
                              WHERE booth_id > 1 ORDER BY insertDateTime DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['booth_title'];?></td>
                            <td><?php echo number_format($row['booth_price']);?></td>
                            <td><?php echo $row['booth_status'];?></td>
                            <td><?php echo nl2br($row['booth_address']);?></td>
                            <td><?php echo nl2br($row['booth_desc']);?></td>
                            <td></td>
                            <td class = "text-align-right">
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info small_radius_button" onclick = "location.href = 'booth.php?action=edit&booth_id=<?php echo $row['booth_id'];?>'">Edit</button>
                                <?php }?>
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger small_radius_button" onclick = "confirmAlertHref('booth.php?action=delete&booth_id=<?php echo $row['booth_id'];?>','Confirm Delete?')">Delete</button>
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
                        <th style = 'width:15%'>Booth Title</th>
                        <th style = 'width:10%'>Pricing</th>
                        <th style = 'width:10%'>Status</th>
                        <th style = 'width:15%'>location</th>
                        <th style = 'width:15%'>Description</th>
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
        $('#booth_table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "stateSave": true,
          "autoWidth": false
        });

      });
    </script>
  </body>
</html>
    <?php
    }

    public function getGeneralForm(){?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="booth_title" class="col-sm-2 control-label">Booth Title <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="booth_title" name="booth_title" placeholder="Booth Title" value = "<?php echo $this->booth_title;?>">
                      </div>
                      <label for="booth_price" class="col-sm-2 control-label">Booth Price <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="booth_price" name="booth_price" placeholder="Booth Price" value = "<?php echo $this->booth_price;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="booth_left" class="col-sm-2 control-label">Left Booth <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                         <select class="form-control" id="booth_left" name="booth_left">
                             <?php echo $this->boothleft_Crtl?>
                         </select>
                      </div>
                      <label for="booth_right" class="col-sm-2 control-label">Right Booth <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                         <select class="form-control" id="booth_right" name="booth_right">
                             <?php echo $this->boothleft_Crtl?>
                         </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="booth_location" class="col-sm-2 control-label">Location <?php echo $mandatory?></label>
                      <div class="col-sm-3">
                         <select class="form-control" id="booth_location" name="booth_location">
                             <?php echo $this->location_Crtl?>
                         </select>
                      </div>
                      <label for="booth_unit_no" class="col-sm-2 control-label">Unit No.</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="booth_unit_no" name="booth_unit_no" placeholder="Unit No" value = "<?php echo $this->booth_unit_no;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="booth_address" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-3">
                            <textarea class="form-control" rows="3" id="booth_address" name="booth_address" placeholder="Address"><?php echo $this->booth_address;?></textarea>
                      </div>
                      <label for="booth_floor" class="col-sm-2 control-label">Floor</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="booth_floor" name="booth_floor" placeholder="Floor" value = "<?php echo $this->booth_floor;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="booth_status" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-3">
                         <select class="form-control" id="booth_status" name="booth_status">
                              <option value = '1' <?php if($this->booth_status == 1){ echo 'SELECTED';}?>>Active</option>
                              <option value = '0' <?php if($this->booth_status == 0){ echo 'SELECTED';}?>>In-Active</option>
                         </select>
                      </div>
                      <label for="booth_desc" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-3">
                            <textarea class="form-control" rows="3" id="booth_desc" name="booth_desc" placeholder="Description"><?php echo $this->booth_desc;?></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
      <?php
    }
    public function getUploadImageForm(){
        ?>
        <div class="box-body table-responsive">

                <div class="form-group">
                    <label for="upload_image" class="col-sm-3 control-label">Upload Image <?php echo $mandatory;?></label>
                    <input style="margin-left:19%;"  data-toggle="tooltip" title="Please upload png, jpeg or gif" type="file" name="files[]" id="image_file" type="file" onchange="makeFileList();" multiple/><br>


                    <ul id="fileList" class="list_file" style="list-style-type:none; font-size: 15px; list-style-position:inside;">
                    </ul>
                </div>

                <div class="col-sm-4">
                  <button type = "button" class="btn btn-info upload_image_btn" onclick = "'booth.php?action=edit&current_tab=image&booth_id=<?php echo $this->booth_id;?>'">Save</button>
                </div>

            <script type="text/javascript">

		function makeFileList() {
			var input = document.getElementById("image_file");
			var ul = document.getElementById("fileList");
			while (ul.hasChildNodes()) {
				ul.removeChild(ul.firstChild);
			}
			for (var i = 0; i < input.files.length; i++) {
				var li = document.createElement("li");
				li.innerHTML = i+1 + ". "  + input.files[i].name;
				ul.appendChild(li);
			}
			if(!ul.hasChildNodes()) {
				var li = document.createElement("li");
				li.innerHTML = 'No Files Selected';
				ul.appendChild(li);
			}
                    }
            </script>

        </div>

                <table id="resume_table" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                        <th style = 'width:3%'>No</th>
                        <th style = 'width:10%'>Image Name</th>
                        <th style = 'width:10%'>Image</th>
                        <th style = 'width:2%'>Main Image</th>
                        <th style = 'width:10%'>Upload Time</th>
                        <th style = 'width:10%'>Upload Date</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT *, left(insertDateTime,10) as date, right(insertDateTime, 8) as time FROM `db_booth_image` WHERE image_booth_id='$this->booth_id' AND image_status = '1' ORDER BY YEAR(date) DESC, MONTH(date) DESC, DAY(date) DESC, time DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo ucfirst(pathinfo($row['image_name'],PATHINFO_FILENAME));?></td>
                            <td><img src="<?php echo $row['image_url'];?>" style="width:100px; height:100px;"/></td>
                            <td style="text-align:center"><input type="radio" class="main" name="main" value="1" <?php if($row['image_main'] == 1){echo "CHECKED";}?> pid = "<?php echo $row['image_id'];?>"></td>
                            <td><?php echo $row['time'];?></td>
                            <td><?php echo nl2br($row['date']);?></td>
                            <td class = "text-align-right">
                                <a href="<?php echo $row['image_url'];?>" download><button type="button" class="btn btn-primary btn-info">Download</button></a>
                                <input type = 'hidden' value = '<?php echo $row['image_id'];?>' name = "image" id = "image"/>
                                <button type="button" class="btn btn-primary btn-danger " onclick = "confirmAlertHref('booth.php?action=deleteImage&current_tab=image&booth_id=<?php echo $this->booth_id;?>&image_id=<?php echo $row['image_id'];?>&file_name=<?php echo $row['image_name'];?>','Confirm Delete?') ">Delete</button>
                            </td>
                        </tr>
                    <?php
                        $i++;
                      }
                    ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style = 'width:3%'>No</th>
                        <th style = 'width:20%'>Image Name</th>
                        <th style = 'width:10%'>Image</th>
                        <th style = 'width:2%'>Main Image</th>
                        <th style = 'width:10%'>Upload Time</th>
                        <th style = 'width:10%'>Upload Date</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </tfoot>
                  </table>
    <?php
    }
    public function saveImage(){
            if(isset($_FILES['files'])){
                $table_field = array('image_name','image_url','image_booth_id','image_status','image_main');
                $errors= array();
                    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
                            $file_name = $_FILES['files']['name'][$key];
                            $file_size =$_FILES['files']['size'][$key];
                            $file_tmp =$_FILES['files']['tmp_name'][$key];
                            $file_type=$_FILES['files']['type'][$key];

                            $fileFormat = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
                            $isfile = false;
                            if($fileFormat != "png" && $fileFormat != "jpeg" && $fileFormat != "gif" && $fileFormat != "jpg") {
                                rediectUrl("booth.php&action=edit&booth_id=".$this->booth_id."current_tab=image",getSystemMsg(0,'Please upload png, jpeg, jpg or gif image'));
                            }
                            else{
                                if(file_exists("dist/images/booth/$this->booth_id/$file_name")){
                                    $dop = strpos($file_name, ".");
                                    $duplicater_name = substr($file_name,0,$dop).'-'.date('y-m-d').'-'.date('h-i-s').'.'.$fileFormat;
                                    $table_value = array($duplicater_name,"dist/images/booth/$this->booth_id/$duplicater_name",$this->booth_id,1,0);
                                    $remark = "Upload booth image";
                                    $this->save->SaveData($table_field,$table_value,'db_booth_image','image_id',$remark);
                                    $this->image_id = $this->save->lastInsert_id;
                                    mkdir("dist/images/booth/$this->booth_id", 0755, true);
                                    move_uploaded_file($file_tmp ,"dist/images/booth/$this->booth_id/$duplicater_name");
                                }
                                else{
                                    $table_value = array($file_name,"dist/images/booth/$this->booth_id/$file_name",$this->booth_id,1,0);
                                    $remark = "Upload booth image";
                                    $this->save->SaveData($table_field,$table_value,'db_booth_image','image_id',$remark);
                                    $this->image_id = $this->save->lastInsert_id;
                                    mkdir("dist/images/booth/$this->booth_id", 0755, true);
                                    move_uploaded_file($file_tmp ,"dist/images/booth/$this->booth_id/$file_name");
                                }
                            }
                        }
                    }
            return true;
}
    public function deleteImage(){

        if($this->save->DeleteData("db_booth_image"," WHERE image_id = '$this->image_id'","Delete Booth Image.")){
            unlink("dist/images/booth/$this->booth_id/$this->file_name");
            return true;
        }else{
            return false;
        }
    }
    public function setMain(){
        $sql = "UPDATE `db_booth_image` SET `image_main`= '0' WHERE image_booth_id = '$this->booth_id'";
        $query = mysql_query($sql);

        $table_field = array('image_main');
        $table_value = array(1);

        $remark = "Update Main Image.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_booth_image','image_id',$remark,$this->image_id)){
           return false;
        }else{
           return true;
        }
    }


    //edr for file
    public function saveFile(){
            if(isset($_FILES['files_files'])){
              //  $table_field = array('image_name','image_url','image_booth_id','image_status','image_main');
                $table_field = [
                  'file_name',
                  'file_url',
                  'file_booth_id',
                  'file_status',
                ];
                $errors= array();
                    foreach($_FILES['files_files']['tmp_name'] as $key => $tmp_name ){
                            $file_name = $_FILES['files_files']['name'][$key];
                            $file_size =$_FILES['files_files']['size'][$key];
                            $file_tmp =$_FILES['files_files']['tmp_name'][$key];
                            $file_type=$_FILES['files_files']['type'][$key];
                        //    die();
                            $fileFormat = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
                            $isfile = false;
                            if($fileFormat != "pdf" && $fileFormat != "docx" && $fileFormat != "doc" && $fileFormat != "xlsx" && $fileFormat != "xls") {
                                rediectUrl("booth.php&action=edit&booth_id=".$this->booth_id."current_tab=files",getSystemMsg(0,'Please upload docx, pdf or xlsx files'));
                            }
                            else{
                                if(file_exists("dist/files/booth/$this->booth_id/$file_name")){
                                    $dop = strpos($file_name, ".");
                                    $duplicater_name = substr($file_name,0,$dop).'-'.date('y-m-d').'-'.date('h-i-s').'.'.$fileFormat;
                                    $table_value = array($duplicater_name,"dist/files/booth/$this->booth_id/$duplicater_name",$this->booth_id,1,0);
                                    $remark = "Upload booth file";
                                    $this->save->SaveData($table_field,$table_value,'db_booth_file','file_id',$remark);
                                    $this->file_id = $this->save->lastInsert_id;
                                    mkdir("dist/files/booth/$this->booth_id", 0755, true);
                                    move_uploaded_file($file_tmp ,"dist/files/booth/$this->booth_id/$duplicater_name");
                                }
                                else{
                                    $table_value = array($file_name,"dist/files/booth/$this->booth_id/$file_name",$this->booth_id,1,0);
                                    $remark = "Upload booth file";
                                    $this->save->SaveData($table_field,$table_value,'db_booth_file','file_id',$remark);
                                    $this->file_id = $this->save->lastInsert_id;
                                    mkdir("dist/files/booth/$this->booth_id", 0755, true);
                                    move_uploaded_file($file_tmp ,"dist/files/booth/$this->booth_id/$file_name");
                                }
                            }
                        }
                    }
            return true;
}
    public function deleteFile(){

        if($this->save->DeleteData("db_booth_file"," WHERE file_id = '$this->file_id'","Delete Booth File.")){
            unlink("dist/files/booth/$this->booth_id/$this->file_name");
            return true;

        }else{
          //  return false;

        }
    //    return $this->file_id;
    }

    //edr Dipslay file upload page??
    public function getFileUploads(){?>
    
     <div class="box-body table-responsive">

             <div class="form-group">
                 <label for="upload_image" class="col-sm-3 control-label">File Upload <?php echo $mandatory;?></label>
                 <input style="margin-left:19%;"  data-toggle="tooltip" title="Please upload .doc .docx .pdf .xlsx or .xls" type="file" name="files_files[]" id="file_file" type="file" onchange="makeFileList();" multiple/><br>


                 <ul id="fileList_a" class="list_file" style="list-style-type:none; font-size: 15px; list-style-position:inside;">
                 </ul>
             </div>

             <div class="col-sm-4">
               <button type = "button" class="btn btn-success upload_file_btn" onclick = "'booth.php?action=edit&current_tab=files&booth_id=<?php echo $this->booth_id;?>'">Save</button>
             </div>

         <script type="text/javascript">

 function makeFileList() {
   var input = document.getElementById("file_file");
   var ul = document.getElementById("fileList_a");
   while (ul.hasChildNodes()) {
     ul.removeChild(ul.firstChild);
   }
   for (var i = 0; i < input.files.length; i++) {
     var li = document.createElement("li");
     li.innerHTML = i+1 + ". "  + input.files[i].name;
     ul.appendChild(li);
   }
   if(!ul.hasChildNodes()) {
     var li = document.createElement("li");
     li.innerHTML = 'No Files Selected';
     ul.appendChild(li);
   }
                 }
         </script>

     </div>

             <table id="resume_table" class="table table-bordered table-hover dataTable">
                 <thead>
                   <tr>
                     <th style = 'width:3%'>No</th>
                     <th style = 'width:10%'>Image Name</th>
                     <th style = 'width:10%'>Upload Time</th>
                     <th style = 'width:10%'>Upload Date</th>
                     <th style = 'width:10%'></th>
                   </tr>
                 </thead>
                 <tbody>
                 <?php
                  // $sql = "SELECT *, left(insertDateTime,10) as date, right(insertDateTime, 8) as time FROM `db_booth_image` WHERE image_booth_id='$this->booth_id' AND image_status = '1' ORDER BY YEAR(date) DESC, MONTH(date) DESC, DAY(date) DESC, time DESC";
                    $sql = "SELECT *, left(insertDateTime,10) as date, right(insertDateTime, 8) as time FROM `db_booth_file` WHERE file_booth_id='$this->booth_id' AND file_status = '1' ORDER BY YEAR(date) DESC, MONTH(date) DESC, DAY(date) DESC, time DESC";

                   $query = mysql_query($sql);
                   $i = 1;
                   while($row = mysql_fetch_array($query)){
                 ?>
                     <tr>
                         <td><?php echo $i;?></td>
                         <td><?php echo ucfirst(pathinfo($row['file_name'],PATHINFO_FILENAME));?></td>


                         <td><?php echo $row['time'];?></td>
                         <td><?php echo nl2br($row['date']);?></td>
                         <td class = "text-align-right">
                             <a href="<?php echo $row['file_url'];?>" download><button type="button" class="btn btn-primary btn-info">Download</button></a>
                             <input type = 'hidden' value = '<?php echo $row['file_id'];?>' name = "image" id = "image"/>
                             <button type="button" class="btn btn-primary btn-danger " onclick = "confirmAlertHref('booth.php?action=deleteFile&current_tab=file&booth_id=<?php echo $this->booth_id;?>&file_id=<?php echo $row['file_id'];?>&file_name=<?php echo $row['file_name'];?>','Confirm Delete?') ">Delete</button>
                         </td>
                     </tr>
                 <?php
                     $i++;
                   }
                 ?>
                 </tbody>
                 <tfoot>
                   <tr>
                     <th style = 'width:3%'>No</th>
                     <th style = 'width:20%'>Image Name</th>

                     <th style = 'width:10%'>Upload Time</th>
                     <th style = 'width:10%'>Upload Date</th>
                     <th style = 'width:10%'></th>
                   </tr>
                 </tfoot>
               </table>
   <?php   }

   //edr insert the calendar history here
   public function tests(){?>
     <h4>Calendar</h4>
   <?php   }


}
?>
