<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Inventory {

    public function Inventory(){
        include_once 'class/SelectControl.php';
        $this->select = new SelectControl();
        
    }
     
    public function create(){

        $table_field = array('inventory_item_name','inventory_item_price','inventory_item_quantity','inventory_item_owner','inventory_item_location','inventory_item_status','inventory_item_desc');
        $table_value = array($this->inventory_item_name,$this->inventory_item_price,$this->inventory_item_quantity,$this->inventory_item_owner,$this->inventory_item_location,$this->inventory_item_status,$this->inventory_item_desc);
    
        $remark = "Insert Inventory Item.";

        if(!$this->save->SaveData($table_field,$table_value,'db_inventory','inventory_id',$remark)){
           return false;
        }else{
           $this->inventory_id = $this->save->lastInsert_id;
           $this->pictureManagement();
           return true;
        }
    }
    public function update(){

        $table_field = array('inventory_item_name','inventory_item_price','inventory_item_quantity','inventory_item_owner','inventory_item_location','inventory_item_status','inventory_item_desc');
        $table_value = array($this->inventory_item_name,$this->inventory_item_price,$this->inventory_item_quantity,$this->inventory_item_owner,$this->inventory_item_location,$this->inventory_item_status,$this->inventory_item_desc);
    
        $remark = "Update Inventory Item.";

        if(!$this->save->UpdateData($table_field,$table_value,'db_inventory','inventory_id',$remark,$this->inventory_id)){
           return false;
        }
        else{
           $this->pictureManagement();
           return true;
        }
    }    
    public function delete(){
        if($this->save->DeleteData("db_inventory"," WHERE inventory_id = '$this->inventory_id'","Delete Inventory Item.")){
            return true;
        }else{
            return false;
        }
    }
    public function fetchInventoryItemDetail($wherestring,$orderstring,$wherelimit,$type){
        global $mandatory;
        $sql = "SELECT * FROM db_inventory WHERE inventory_id > 0 $wherestring $orderstring $wherelimit";
        $query = mysql_query($sql);
        if($type == 1){
            $row = mysql_fetch_array($query);
            $this->inventory_id = $row['inventory_id'];
            $this->inventory_item_name = $row['inventory_item_name'];
            $this->inventory_item_price = $row['inventory_item_price'];
            $this->inventory_item_quantity = $row['inventory_item_quantity'];
            $this->inventory_item_owner = $row['inventory_item_owner'];
            $this->inventory_item_location = $row['inventory_item_location'];
            $this->inventory_item_status = $row['inventory_item_status'];
            $this->inventory_item_desc = $row['inventory_item_desc'];
            
            return true;
        }else if($type == 2){
            $row = mysql_fetch_array($query);
            return $row;
        }
        else{
             return $query;
        }
    }    
    
    
    public function showInventoryItemForm(){
        global $mandatory;
        $this->location_Crtl = $this->select->getLocationCtrl($this->inventory_item_location);
        if($this->inventory_id < 1){
            $this->inventory_item_status = 1;
        }
        ?>
          <html>
          <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Create Inventory Item</title>
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
                <h1>Create Inventory Item</h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                <div class="col-xs-12">
                <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?php if($this->item_id > 0){ echo "Inventory Item";} 
                  else {
                      echo "Create Inventory Item";
                  } ?> </h3>
                <button type = "button" class="btn btn-info pull-right radius_button" style = 'width:100px;' onclick = "window.location.href='inventory.php'">Search</button>
                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button type = "button" class="btn btn-info pull-right radius_button" style = ';margin-right:10px;' onclick = "window.location.href='appointment.php?action=createForm'"> + Add Item</button>
                <?php }?>
                </div><!-- /.box-header -->

            <div class="box-body table-responsive">     
                <div class="col-sm-8">
                    <?php if($this->inventory_id >0){ ?>
                        <form id = 'item_form' class="form-horizontal" action = 'inventory.php?action=update' method = "POST" enctype="multipart/form-data">
                    <?php } else {?>
                        <form id = 'item_form' class="form-horizontal" action = 'inventory.php?action=create' method = "POST" enctype="multipart/form-data">
                    <?php }?>
                    <div class="form-group">
                        <label for="inventory_item_name" class="col-sm-2 control-label">Item Name <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control " id="inventory_item_name" name="inventory_item_name" value = "<?php echo $this->inventory_item_name; ?>" placeholder="Name">
                            </div>

                        <label for="inventory_item_price" class="col-sm-2 control-label">Item Price <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control " id="inventory_item_price" name="inventory_item_price" value = "<?php echo $this->inventory_item_price; ?>" placeholder="Price">
                            </div>
                    </div>
                    <div class="form-group">
                       <label for="inventory_item_owner" class="col-sm-2 control-label">Item Owner <?php echo $mandatory;?></label>
                        <div class="col-sm-3">
                             <select class="form-control" id="inventory_item_owner" name="inventory_item_owner">
                             </select>
                        </div>
                       <label for="inventory_item_location" class="col-sm-2 control-label">Item Location <?php echo $mandatory;?></label>
                        <div class="col-sm-3">
                             <select class="form-control" id="inventory_item_location" name="inventory_item_location">
                                 <?php echo $this->location_Crtl;?>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inventory_item_quantity" class="col-sm-2 control-label">Item Quantity <?php echo $mandatory;?></label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="inventory_item_quantity" name="inventory_item_quantity" value = "<?php echo $this->inventory_item_quantity; ?>" placeholder="Quantity">
                            </div>
                        <label for="inventory_item_status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-3">
                             <select class="form-control" id="inventory_item_status" name="inventory_item_status">
                                  <option value = '1' <?php if($this->inventory_item_status == 1){ echo 'SELECTED';}?>>Active</option>
                                  <option value = '0' <?php if($this->inventory_item_status == 0){ echo 'SELECTED';}?>>In-Active</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inventory_item_desc" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" id="inventory_item_desc" name="inventory_item_desc" placeholder="Description"><?php echo $this->inventory_item_desc;?></textarea>
                            </div>                        
                    </div>  
                </div>            
                
                <div class="col-sm-4">
                      <?php if(file_exists("dist/images/inventory/$this->inventory_id.png")){?>
                        <img src ="dist/images/inventory/<?php echo $this->inventory_id;?>.png" style = 'width:215px;height:215px;'/>
                      <?php }else{?>
                        <img src ='dist/img/avatar7.png' style = 'width:215px;height:215px;'/>

                      <?php }?>
                         <p></p>
                         <input data-toggle="tooltip" title="Please upload image in 128 x 128 pixels " type = "file" name = 'image_input' /><br>                    
                </div>                
                
                <input type = 'hidden' value = '<?php echo $this->inventory_id;?>' name = 'inventory_id' id = 'inventory_id'/>
                        <div class="col-sm-3 "><br><br>
                      <button type="button" class="btn btn-default radius_button" onclick = "history.go(-1)">Back</button>
                      &nbsp;&nbsp;&nbsp;
                      <button type = "submit" class="btn btn-info radius_button">
                          <?php if($this->inventory_id > 0){ echo "Update";} 
                          else {
                              echo "Save";
                          } ?>
                      </button>                              
                </div>
                    </form>
                   
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
        $('#applicant_table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    
    <script>
    $(document).ready(function() {
        $("#item_form").validate({
                  rules: 
                  {
                      inventory_item_name:
                      {
                          required: true
                      },
                      inventory_item_price:
                      {
                          required: true
                      },
//                      inventory_item_owner:
//                      {
//                          required: true
//                      },
//                      inventory_item_location:
//                      {
//                          required: true       
//                      },
                      inventory_item_quantity:
                      {
                          required: true       
                      }
                  },
                  messages:
                  {
                      inventory_item_name:
                      {
                          required: "Please enter Item Name."
                      },
                      inventory_item_price:
                      {
                          required: "Please enter Item Price."
                      },
//                      inventory_item_owner:
//                      {
//                          required: "Please select Item Onwer."
//                      },
//                      inventory_item_location:
//                      {
//                          required: "Please select Item Location"       
//                      },
                      inventory_item_quantity:
                      {
                          required: "Please enter Item Quantity"       
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
            <title>Inventory</title>
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
                <h1>Inventory</h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                <div class="col-xs-12">
                <div class="box" style="border-color:#00c0ef">
                <div class="box-header">
                  <h3 class="box-title"><?php if($this->item_id > 0){ echo "Update Type";} 
                  else {
                      echo "Additional Item Table";
                  } ?> </h3>

                <?php if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'create')){?>
                <button class="btn btn-info pull-right radius_button" onclick = "window.location.href='inventory.php?action=createForm'"> + Add Item</button>
                <?php }?>  
                    
                </div><!-- /.box-header -->


                <div class="box-body table-responsive">     

                  <table id="applicant_table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style = 'width:3%'>No</th>
                        <th style = 'width:15%'>Item Name</th>
                        <th style = 'width:10%'>Date Added</th>
                        <th style = 'width:5%'>Quantity</th>
                        <th style = 'width:10%'>Owner</th>
                        <th style = 'width:15%'>Location</th>
                        <th style = 'width:10%'></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php                           
                      $sql = "SELECT * FROM db_inventory ORDER BY insertDateTime DESC";
                      $query = mysql_query($sql);
                      $i = 1;
                      while($row = mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <?php 
                                $path = "dist/images/inventory/{$row['inventory_id']}.png";
                                if(file_exists($path)){ ?>
                                    <td><img src="dist/images/inventory/<?php echo $row['inventory_id'];?>.png" width="50px">&nbsp; <?php echo $row['inventory_item_name'];?></td>
                                <?php
                                }else{?>
                                    <td><img src="dist/img/avatar7.png" width="50px">&nbsp; <?php echo $row['inventory_item_name'];?></td>
                                <?php     
                                }
                            ?>
                            <td><?php echo format_date($row['insertDateTime']);?></td>    
                            <td><?php echo $row['inventory_item_quantity'];?></td>
                            <td><?php echo $row['inventory_item_owner']?></td>  
                            <td><?php echo $row['inventory_item_location']?></td>  
                            <td class = "text-align-right">
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'update')){
                                ?>
                                <button type="button" class="btn btn-primary btn-info small_radius_button" onclick = "location.href = 'inventory.php?action=edit&inventory_id=<?php echo $row['inventory_id'];?>'">Edit</button>
                                <?php }?>
                                <?php 
                                if(getWindowPermission($_SESSION['m'][$_SESSION['empl_id']],'delete')){
                                ?>
                                <button type="button" class="btn btn-primary btn-danger small_radius_button" onclick = "confirmAlertHref('inventory.php?action=delete&inventory_id=<?php echo $row['inventory_id'];?>','Confirm Delete?')">Delete</button>
                                <?php }?>
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
                        <th style = 'width:15%'>Item Name</th>
                        <th style = 'width:10%'>Date Added</th>
                        <th style = 'width:5%'>Quantity</th>
                        <th style = 'width:10%'>Owner</th>
                        <th style = 'width:15%'>Location</th>
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
        $('#applicant_table').DataTable({
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
    
    public function pictureManagement(){
        if(!file_exists("dist/images/inventory")){
           mkdir('dist/images/inventory/');
        }
        $isimage = false;
        if($this->image_input['type'] == 'image/png' || $this->image_input['type'] == 'image/jpeg' || $this->image_input['type'] == 'image/gif'){
           $isimage = true;
        }

        if($this->image_input['size'] > 0 && $isimage == true){
            if($this->action == 'update'){
                unlink("dist/images/inventory/{$this->inventory_id}/{$this->inventory_id}.png");
            }
            if(!file_exists("dist/images/inventory/$this->inventory_id/$this->inventory_id.png")){
                move_uploaded_file($this->image_input['tmp_name'],"dist/images/inventory/{$this->inventory_id}.png");      
                return true;    
            }else{
                move_uploaded_file($this->image_input['tmp_name'],"dist/images/inventory/{$this->inventory_id}.png"); 
            }
        }
    }    
}
?>