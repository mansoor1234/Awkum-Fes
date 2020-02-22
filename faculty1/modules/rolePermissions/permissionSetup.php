<?php include('../../config.php');?>
<?php  loginCheck(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include(INCLUDE_PATH.'/layouts/links.php');?> 
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<style>
  td,th,tr{
    height: 35px;
    border: 1px solid #f4f6f9;
    padding-left: 11px;
  }
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include(INCLUDE_PATH.'/layouts/navbar.php');?>
<?php include(INCLUDE_PATH.'/layouts/sidebar.php');?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permission Setup</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Role Permissions</li>
              <li class="breadcrumb-item active">Permission Setup</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Permission Setup</h3>
              <center><button class="btn btn-primary btn-sm createBtn" type="button" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus" ></i> Add Menu Item</button></center>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100"  >
                <thead>
                <tr>
                  <th>SL No.</th>
                  <th>Menu Title</th>
                  <th>Page ID</th>
                  <th>Page Name</th>
                  <th>Module</th>
                  <th>Parent Menu</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                   $c=1;
                   $get_users=mysqli_query($con,"select * from `rbac_menu_item`");
                   while($rows=mysqli_fetch_array($get_users)){
                  if($rows['is_report']==0){$report="Not Report";}else{$report="Report";}
                    $parent_id=$rows['parent_menu'];
                    $get_parent_menu_id=$conn->prepare("select * from `rbac_menu_item` where parent_menu=:id");
                    $get_parent_menu_id->bindParam(":id",$parent_id);
                    $get_parent_menu_id->execute();
                    $row2=$get_parent_menu_id->fetch(PDO::FETCH_ASSOC);?>
                  <tr>
                    <td><?php  echo $c++;?></td>
                    <td><?php  echo $rows['menu_title'];?></td>
                    <td><?php  echo $rows['page_id'];?></td>
                    <td><?php  echo $rows['page_name'];?></td>
                    <td><?php  echo $rows['module'];?></td>
                    <td><?php  echo $rows['menu_title'];?></td>
                    <td><?php  echo $report;?></td>
                    <td><button class="btn btn-primary btn-sm editBtn" type="button" data-toggle="modal" data-target="#editMenuItem" value="<?php echo $rows['menu_id'];?>" onclick="menuItemEdit(this.value)" ><i class="far fa-edit" ></i> Edit</button>
                    <button class="btn btn-primary btn-sm deleteBtn" type="button" data-toggle="modal" data-target="#changeImage" 
                    onclick="deleteMenuItem(this.value)" value="<?php echo $rows['menu_id'];?>" onclick="deleteMenuItem(this.value)" ><i class="fas fa-trash" ></i> Delete</button></td>
                   </tr>
                  <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>SL No.</th>
                  <th>Menu Title</th>
                  <th>Page ID</th>
                  <th>Page Name</th>
                  <th>Module</th>
                  <th>Parent Menu</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
           </div> <!-- col-12 -->
        </div><!-- row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<?php include(INCLUDE_PATH.'/layouts/footer.php');?>
</div>



     <!-- MODAL ADD USER START -->
       <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Add Menu Item  </h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                    <div class="modal-body">
                   <form  method="post" enctype="multipart/form-data" id="addmenuItem">  
                      <div class="row">
                        <div class="col-12">
                         <div class="card card-fullheight">
                        <div class="card-body">
                    <center>
                    <div id="error_messages_area">
                       <div class="alert alert-success has-icon" role="alert" id="success_message" style="display: none;"><i class="fa fa-check-circle alert-icon"></i> Menu item has been added.</div>
                           <div class="alert alert-danger has-icon" role="alert" id="error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, Failed to add menu item.</div>
                           </center>
                        </div>
                    <div class="row ">
                      <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="input-group-icon input-group-icon-left input-group-lg">
                          <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" placeholder="Menu Title " name="menu_title" id="menuTitle" required >
                           </div> 
                          </div>
                       <div class="col-lg-6 col-sm-12 mb-2">
                     <div class="input-group-icon input-group-icon-left input-group-lg">
                       <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" id="pageUrl" placeholder="Page ID" name="url" required>
                          </div>
                           </div>
                          </div>
                       <div class="row ">
                           <div class="col-lg-6 col-sm-12 mb-2">
                              <div class="input-group-icon input-group-icon-left input-group-lg">
                               <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" id="module" placeholder="Module" name="module" required >
                              </div> 
                           </div>
                        <div class="form-group col-lg-6 col-sm-12 mb-2">
                            <div class="input-group-icon input-group-icon-left input-group-lg">
                               <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" id="pageName" placeholder="Page Name" name="pageName" required >
                               </div> 
                             </div>
                            </div>
                         <div class="row ">
                            <div class="col-lg-6 col-sm-12 mb-2">
                                 <select name="parent_menu" class="form-control" style="border-radius: 8px;">
                                   <option>Choose Parent Menu</option>
                                      <?php $get_parent=mysqli_query($con,"select * from rbac_menu_item");?>
                                       <?php while($rows=mysqli_fetch_array($get_parent)){?>
                                       <option value="<?php echo $rows['menu_id'];?>"><?php echo $rows['menu_title'];?></option>
                                       <?php }?>
                                      </select>
                                   </div>
                                 </div>
                            <input type="hidden" name="add_menu_item" value="set">
                          <div>
                              <small id="password_match_error_message" style="display: none;color:red">* Password doesn't match</small>
                                 </div>
                                  <div>
                                   <small id="invalid_email_error_message" style="display: none;color:red">* Invalid email address</small>
                                  </div>
                               <div class="modal-footer">
                             <button class="btn btn-light" type="button"     data-dismiss="modal">Close</button>
                                <button class="btn btn-light" type="reset" onclick="clearMenuFormData()">Clear</button>
                                   <input  class="btn btn-primary mr-2" type="submit" id="submit_menu_item_btn" name="user_form" onclick="saveMenuItem(this.value)" value="Save">
                                     <div id="target3">
                                      <button class="btn btn-primary" type="button" disabled id="saved_menu_item_btn" style="display: none;"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> 
                                     </span>Saved
                                   </button>
                                </div>
                               <button class="btn btn-primary" type="button" disabled id="loading_menu_item_btn" style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing...<div id="target">
                                      </div>
                                       </button>
                                        </div>
                                       </div></div></div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>                  
     
      <!-- MODAL ADD USER END -->
      <!-- MODAL EDIT MENU ITEM START -->
       <div class="modal fade" id="editMenuItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content" id="editUserModalContent">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Menu Item</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                    <div class="modal-body">
                       <form action="" method="post" id="imageEditMenuItemForm">
                          <div id="modal_content">
                              
                          </div>
                     </div>
                   </form>
             </div>
         </div>
     </div> 

      <!-- MODAL EDIT MENU ITEM END -->
<!-- jQuery -->
<script src="<?php echo BASE_URL; ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo BASE_URL; ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo BASE_URL; ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo BASE_URL; ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo BASE_URL; ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo BASE_URL; ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo BASE_URL; ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo BASE_URL; ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo BASE_URL; ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo BASE_URL; ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL; ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo BASE_URL; ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL; ?>assets/dist/js/demo.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dist/js/main.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
 });
</script>
</body>
</html>
<?php include('../../rbac.php'); ?>