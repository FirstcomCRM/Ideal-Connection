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
class Customer {

    public function Customer(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();


    }
    public function create(){
        $def_stat = 1;
      //  $table_field = array('location_title','location_postal_code','location_address','location_desc','location_type','location_status');
      //  $table_value = array($this->location_title,$this->location_postal_code,$this->location_address,$this->location_desc,$this->location_type,$this->location_status);
        $table_field = [
          'partner_account_name1',
          'partner_code',
          'partner_name',
          'partner_bill_address',
          'partner_ship_address',
          'partner_sales_person',
          'partner_tel',
          'partner_tel2',
          'partner_fax',
          'partner_email',
          'partner_remark',
          'partner_postal_code',
          'partner_iscustomer', //value of 1
          'partner_status', //value of 1
          'partner_ic_number',
          'partner_acra_date',
        ];
        $table_value = [
          $this->partner_account_name1,
          $this->partner_code,
          $this->partner_name,
          $this->partner_bill_address,
          $this->partner_ship_address,
          $this->partner_sales_person,
          $this->partner_tel,
          $this->partner_tel2,
          $this->partner_fax,
          $this->partner_email,
          $this->partner_remark,
          $this->partner_postal_code,
          $def_stat,
          $def_stat,
          $this->partner_ic_number,
          format_date_database($this->partner_acra_date),
        ];


        $remark = "Insert Partner.";
        if(!$this->save->SaveData($table_field,$table_value,'db_partner','partner_id',$remark)){
           return false;
        }else{
           $this->partner_id = $this->save->lastInsert_id;
           $this->uploadAttachment($this->partner_id);

           return true;
        }
    }

    public function uploadAttachment($id){


        $n_field = [];
        $n_value = [];
         $filename= '';
        $path = "dist/customer/$id/";
        if (!file_exists($path)) {
          mkdir("dist/customer/$id", 0755, true);
        }

        if (isset($_FILES['partner_pic_url'])) {
          if (file_exists($this->partner_pic_url)) {
            unlink($this->partner_pic_url);
          }
           $filename = $_FILES['partner_pic_url']['name'];
           $file_tmp = $_FILES['partner_pic_url']['tmp_name'];
           $true_path = $path.$filename;
           move_uploaded_file($file_tmp ,"dist/customer/$id/$filename");
           if (!empty($filename) ) {
             $n_field[] = 'partner_pic_url';
             $n_value[] = $true_path;
           }

         }
         $filename= '';

         if (isset($_FILES['ic_attachment'])) {
            $filename = $_FILES['ic_attachment']['name'];
            if (file_exists($this->partner_ic_attach)) {
              unlink($this->partner_ic_attach);
            }
            $file_tmp = $_FILES['ic_attachment']['tmp_name'];
            $true_path = $path.$filename;
            move_uploaded_file($file_tmp ,"dist/customer/$id/$filename");
            if (!empty($filename)) {
              $n_field[] = 'partner_ic_attach';
              $n_value[] = $true_path;
            }

          }
          $filename= '';

          if (isset($_FILES['acra_attachment'])) {
             $filename = $_FILES['acra_attachment']['name'];
             if (file_exists($this->partner_acra_attach)) {
               unlink($this->partner_acra_attach);
             }
             $file_tmp = $_FILES['acra_attachment']['tmp_name'];
             $true_path = $path.$filename;
             move_uploaded_file($file_tmp ,"dist/customer/$id/$filename");
             if (!empty($filename) ) {
               $n_field[] = 'partner_acra_attach';
               $n_value[] = $true_path;
             }

           }
           $filename= '';

           if (isset($_FILES['license_attachment'])) {
              $filename = $_FILES['license_attachment']['name'];
              if (file_exists($this->partner_license)) {
                unlink($this->partner_license);
              }
              $file_tmp = $_FILES['license_attachment']['tmp_name'];
              $true_path = $path.$filename;
              move_uploaded_file($file_tmp ,"dist/customer/$id/$filename");
              if (!empty($filename) ) {
                $n_field[] = 'partner_license';
                $n_value[] = $true_path;
              }

            }

         $remarks = 'blk';
         if (!empty($n_field)) {
           $this->save->UpdateData($n_field,$n_value,'db_partner','partner_id',$remark,$this->partner_id);

        //   move_uploaded_file($file_tmp ,"dist/customer/$id/$filename");
         }

    }

    public function update(){
      //  $table_field = array('location_title','location_postal_code','location_unit_no','location_address','location_desc','location_status');
    //    $table_value = array($this->location_title,$this->location_postal_code,$this->location_unit_no,$this->location_address,$this->location_desc,$this->location_status);
          $table_field = [
            'partner_account_name1',
            'partner_code',
            'partner_name',
            'partner_bill_address',
            'partner_ship_address',
            'partner_sales_person',
            'partner_tel',
            'partner_tel2',
            'partner_fax',
            'partner_email',
            'partner_remark',
            'partner_postal_code',
          //  'partner_iscustomer', //value of 1
        //    'partner_status', //value of 1
            'partner_ic_number',
            'partner_acra_date',
          ];
          $table_value = [
            $this->partner_account_name1,
            $this->partner_code,
            $this->partner_name,
            $this->partner_bill_address,
            $this->partner_ship_address,
            $this->partner_sales_person,
            $this->partner_tel,
            $this->partner_tel2,
            $this->partner_fax,
            $this->partner_email,
            $this->partner_remark,
            $this->partner_postal_code,
            $this->partner_ic_number,
            format_date_database($this->partner_acra_date),

          ];

        $remark = "Update Partner.";
        if(!$this->save->UpdateData($table_field,$table_value,'db_partner','partner_id',$remark,$this->partner_id)){
           return false;
        }else{
            $this->uploadAttachment($this->partner_id);
           return true;
        }
    }
    public function fetchCustomerDetail($wherestring,$orderstring,$wherelimit,$type){
        $sql = "SELECT * FROM db_partner WHERE partner_id > 0  $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);


        if($type > 0){
            $row = mysql_fetch_array($query);
            $this->partner_id = $row['partner_id'];
            $this->partner_account_name1 = $row['partner_account_name1'];
            $this->partner_code =$row['partner_code'];
            $this->partner_name =$row['partner_name'];
            $this->partner_bill_address =$row['partner_bill_address'];
            $this->partner_ship_address =$row['partner_ship_address'];
            $this->partner_sales_person =$row['partner_sales_person'];
            $this->partner_tel =$row['partner_tel'];
            $this->partner_tel2 =$row['partner_tel2'];
            $this->partner_fax =$row['partner_fax'];
            $this->partner_email =$row['partner_email'];
            $this->partner_remark =$row['partner_remark'];
            $this->partner_postal_code =$row['partner_postal_code'];
            $this->partner_pic_url = $row['partner_pic_url'];
            $this->partner_ic_number = $row['partner_ic_number'];
            $this->partner_acra_date = $row['partner_acra_date'];
            $this->partner_ic_attach = $row['partner_ic_attach'];
            $this->partner_acra_attach = $row['partner_acra_attach'];
            $this->partner_license = $row['partner_license'];
        }
        return $query;
    }
    public function delete(){
        if($this->save->DeleteData("db_partner"," WHERE partner_id = '$this->partner_id'","Delete Partner.")){
            return true;
        }else{

            return false;
        }
    }
    public function getInputForm($action){

      //  $this->loctype_ctrl= $this->select->getLocType($this->location_type,'Y');

        global $mandatory;
        if($this->location_id < 1){
            $this->location_status = 1;
        }
    ?>
   <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Management</title>
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
            <h1>Customer Management</h1>
        </section>
          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if($this->currency_id > 0){ echo "Update Customer";}else{ echo "Create Customer";}?></h3>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;' onclick = "window.location.href='customer.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:150px;margin-right:10px;' onclick = "window.location.href='customer.php?action=createForm'"> + Add Customer</button>
                <?php }?>
              </div>



                <form id = 'location_form' class="form-horizontal" action = 'customer.php?action=create' method = "POST" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li tab = "General Info" class="tab_header active"><a href="#general" data-toggle="tab">General Info</a></li>
                        <li tab = "Files" class="tab_header " ><a href="#files" data-toggle="tab">Files</a></li>

                      </ul>
                    </div>
                    <div class="tab-content">
                        <!--Start of Genral Info tab-->
                        <div class=" tab-pane in active" id="general">
                          <div class="form-group">
                            <label for="location_title" class="col-sm-2 control-label">Account Name</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_account_name1" name="partner_account_name1" placeholder="Account Name" value = "<?php echo $this->partner_account_name1;?>">
                            </div>
                            <label for="location_status" class="col-sm-2 control-label">Code</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_code" name="partner_code" placeholder="Code" value = "<?php echo $this->partner_code;?>">
                            </div>

                          </div>

                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-2 control-label">Customer Name</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" onkeyup="checkEnter()"  id="partner_name" name="partner_name" value = "<?php echo $this->partner_name;?>" placeholder="Name">
                            </div>
                            <label for="location_unit_no" class="col-sm-2 control-label">Sales Person<?php // echo $mandatory?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_sales_person" name="partner_sales_person" placeholder="Sales Person" value = "<?php echo $this->partner_sales_person;?>">
                            </div>

                          </div>


                          <div class="form-group">
                            <label for="location_address" class="col-sm-2 control-label">Billing Address <?php echo $mandatory?></label>
                            <div class="col-sm-3">
                                  <textarea class="form-control" rows="3" id="partner_bill_address" name="partner_bill_address" placeholder="Billing Address" ><?php echo $this->partner_bill_address;?></textarea>
                            </div>
                            <label for="location_desc" class="col-sm-2 control-label">Shipping Address</label>
                            <div class="col-sm-3">
                                  <textarea class="form-control" rows="3" id="partner_ship_address" name="partner_ship_address" placeholder="Shipping Address"><?php echo $this->partner_ship_address;?></textarea>
                            </div>

                          </div>

                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-2 control-label">Telephone1</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" onkeyup="checkEnter()"  id="partner_tel" name="partner_tel" value = "<?php echo $this->partner_tel;?>" placeholder="Telephone1`">
                            </div>
                            <label for="location_unit_no" class="col-sm-2 control-label">Telephone2<?php // echo $mandatory?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="location_title" name="partner_tel2" placeholder="Telephone2" value = "<?php echo $this->partner_tel2;?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" onkeyup="checkEnter()"  id="partner_fax" name="partner_fax" value = "<?php echo $this->partner_fax;?>" placeholder="Fax">
                            </div>
                            <label for="location_unit_no" class="col-sm-2 control-label">Email<?php // echo $mandatory?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="partner_email" name="partner_email" placeholder="Email" value = "<?php echo $this->partner_email;?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-2 control-label">Postal Code<?php echo $mandatory?></label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" onkeyup="checkEnter()"  id="partner_postal_code" name="partner_postal_code" value = "<?php echo $this->partner_postal_code;?>" placeholder="Postal Code">
                            </div>
                            <label for="location_unit_no" class="col-sm-2 control-label">Remarks<?php // echo $mandatory?></label>
                            <div class="col-sm-3">
                              <textarea class="form-control" rows="3" id="partner_remark" name="partner_remark" placeholder="Remarks"><?php echo $this->partner_remark;?></textarea>
                            </div>
                          </div>
                        </div>
                        <!--End of Genral Info tab-->

                        <!--Start of Files tab-->
                        <div class=" tab-pane fade" id="files">
                          <div class="form-group">
                            <div class="col-sm-3">

                              <?php if (!empty($this->partner_id)  && !empty($this->partner_pic_url)): ?>
                                <img src="<?php echo  $this->partner_pic_url?>" alt="" style = 'width:215px;height:215px;'>
                              <?php else: ?>
                                <img src="dist/img/avatar.png" alt="" style = 'width:215px;height:215px;'>
                              <?php endif; ?>

                              <br><br>
                              <label for="">Profile Image</label>
                              <input  data-toggle="tooltip" title="Please upload image in 128 x 128 pixels " type = "file" name = "partner_pic_url" id="partner_pic_url" />

                            </div>
                          </div>

                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-1 control-label">IC Number</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" onkeyup="checkEnter()"  id="partner_postal_code" name="partner_ic_number" value = "<?php echo $this->partner_ic_number;?>" placeholder="IC Number">

                            </div>
                            <label for="location_unit_no" class="col-sm-1 control-label">IC Attachment<?php // echo $mandatory?></label>
                            <div class="col-sm-3">
                              <input  data-toggle="tooltip" title="Please upload image in 128 x 128 pixels " type = "file" name = "ic_attachment" />

                            </div>

                          </div>
                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-1 control-label">ACRA Expiry Date</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control datepicker" onkeyup="checkEnter()"  id="partner_acra_date" name="partner_acra_date" value = "<?php echo format_date($this->partner_acra_date);?>" placeholder="ACRA Expiry Date">
                            </div>
                            <label for="location_unit_no" class="col-sm-1 control-label">ACRA Attacment<?php // echo $mandatory?></label>
                            <div class="col-sm-3">
                              <input  data-toggle="tooltip" title="Please upload image in 128 x 128 pixels " type = "file" name = "acra_attachment" />

                            </div>

                          </div>

                          <div class="form-group">
                            <label for="location_postal_code" class="col-sm-1 control-label">License Attachment</label>
                            <div class="col-sm-3">
                              <input  data-toggle="tooltip" title="Please upload image in 128 x 128 pixels " type = "file" name = "license_attachment" />
                            </div>
                          </div>

                          <table class="table table-bordered">
                            <thead>
                              <th class="text-center">IC Attachment</th>
                              <th class="text-center">ACRA Attachment</th>
                              <th class="text-center">License Attachment</th>
                            </thead>
                            <tbody>
                              <tr>
                                <?php if (!empty($this->partner_ic_attach) ): ?>
                                  <td class="text-center"><a href="<?php echo $this->partner_ic_attach ?>" download> IC</a>  </td>
                                <?php else: ?>
                                  <td></td>
                                <?php endif; ?>

                                <?php if (!empty($this->partner_acra_attach) ): ?>
                                    <td class="text-center"> <a href="<?php echo $this->partner_acra_attach ?>" download> ACRA</a>  </td>
                                <?php else: ?>
                                  <td></td>
                                <?php endif; ?>

                                <?php if (!empty($this->partner_license) ): ?>
                                   <td class="text-center"> <a href="<?php echo $this->partner_license ?>" download> License</a></td>
                                <?php else: ?>
                                  <td></td>
                                <?php endif; ?>

                              </tr>
                            </tbody>
                          </table>

                        </div>
                        <!--End of Files tab-->

                    </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default radius_button" onclick = "history.go(-1)">Back</button>
                    &nbsp;&nbsp;&nbsp;
                    <input type = "hidden" value = "<?php echo $action;?>" name = "action"/>
                    <input type = "hidden" value = "<?php echo $this->partner_id;?>" name = "partner_id"/>
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
    <title>Customer Management</title>
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
            <h1>Customer Management</h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Customer Table</h3>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-info pull-right radius_button" style = "width:150px" onclick = "window.location.href='customer.php?action=createForm'"> + Add Customer</button>
                <?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="location_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:5%'>No</th>
                        <th style = 'width:15%'>Customer Name</th>
                        <th style = 'width:10%'>Postal Code</th>
                        <th style = 'width:10%'>Telephone</th>
                        <th style = 'width:20%'>Address</th>
                        <th style = 'width:10%'>Email</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT *
                              FROM db_partner
                              WHERE partner_id > 0 AND partner_status = '1' ORDER BY partner_name DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['partner_name'];?></td>
                            <td><?php echo $row['partner_postal_code'];?></td>
                            <td><?php echo $row['partner_tel'];?></td>
                            <td><?php echo $row['partner_bill_address'];?></td>
                            <td><?php echo $row['partner_email'];?></td>
                            <td class = "text-align-right">
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info small_radius_button" onclick = "location.href = 'customer.php?action=edit&partner_id=<?php echo $row['partner_id'];?>'">Edit</button>
                                <?php }?>
                                <?php
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger small_radius_button" onclick = "confirmAlertHref('customer.php?action=delete&partner_id=<?php echo $row['partner_id'];?>','Confirm Delete?')">Delete</button>
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
                        <th style = 'width:15%'>Customer Name</th>
                        <th style = 'width:10%'>Postal Code</th>
                        <th style = 'width:10%'>Telephone</th>
                        <th style = 'width:20%'>Address</th>
                        <th style = 'width:10%'>Email</th>
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
