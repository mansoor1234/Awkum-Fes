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
            <h1 class="m-0 text-dark">User Roles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Role Permissions</li>
              <li class="breadcrumb-item active">User Roles</li>
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
                  <div class="card-body">
                      <h5 class="box-title">User Roles</h5>
                       <center><button class="btn btn-primary btn-sm createBtn" type="button" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus " ></i> Add User Role</button></center>
                      <div class="table-responsive">
                          <table class="w-100 nowrap" id="dt-scroll-horizonal" style="width:100%">
                           <thead class="thead-light">
                            <tr>
                             <th>S.NO</th>
                             <th>User Name</th>
                             <th>Role Name</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $c=1;
                            $get_users=mysqli_query($con,"SELECT rbac_role.role_name as Role, rbac_user.firstname as User FROM rbac_role_access_table INNER JOIN rbac_role ON rbac_role_access_table.role_id = rbac_role.role_id INNER JOIN rbac_user ON rbac_role_access_table.user_id = rbac_user.id");
                            while($rows=mysqli_fetch_array($get_users)){?>
                            <tr>
                            <td><?php  echo $c++;?></td>
                            <td><?php  echo $rows['User'];?></td>
                            <td><?php  echo $rows['Role'];?></td>
                            </tr>
                            <?php }?>
                           </tbody>
                           <tfoot>
                            <tr>
                             <th>S.NO</th>
                             <th>User Name</th>
                             <th>Role Name</th>
                            </tr>
                            </tfoot>
                          </table>
                      </div>
                  </div>
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
              <div class="modal-dialog " role="document">
                 <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Add User Role</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                    <div class="modal-body">
                       <form  method="post" enctype="multipart/form-data" id="addUserRoleForm">  
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-fullheight">
                                    <div class="card-body">
                                      <center>
                                          <div id="error_messages_area">
                                          <div class="alert alert-success has-icon" role="alert" id="success_message" style="display: none;"><i class="fa fa-check-circle alert-icon"></i> User role has been added</div>
                                          <div class="alert alert-danger has-icon" role="alert" id="error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Please fill all the fields.</div><div class="alert alert-danger has-icon" role="alert" id="error_message2" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> User role already present.</div>
                                      </center>
                                         </div>
                                         <div class="row ">
                                            <div class="col-lg-6 col-sm-12 mb-2">
                                             <select name="userid" class="form-control" style="border-radius: 8px;">
                                                    <option value="empty">Select User</option>
                                                    <?php $get_parent=mysqli_query($con,"select * from rbac_user");?>
                                                    <?php while($rows=mysqli_fetch_array($get_parent)){?>
                                                    <option value="<?php echo $rows['id'];?>"><?php echo $rows['firstname']." ".$rows['lastname'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 mb-2">
                                               <select name="roleid" class="form-control" style="border-radius: 8px;">
                                                    <option value="empty">Select Role</option>
                                                    <?php $get_parent=mysqli_query($con,"select * from rbac_role");?>
                                                    <?php while($rows=mysqli_fetch_array($get_parent)){?>
                                                    <option value="<?php echo $rows['role_id'];?>"><?php echo $rows['role_name'];?></option>
                                                    <?php }?>
                                                </select>
                                              </div>
                                            </div>
                                         <div class="modal-footer">
                                            <button class="btn btn-light" type="button"     data-dismiss="modal">Close
                                             </button>
                                              <button class="btn btn-light" type="reset" 
                                             onclick="clearUserRoleData()">Clear
                                             </button>
                                            <div id="target"></div>
                                              <input  class="btn btn-primary mr-2" type="submit" id="submitUserRoleBtn" name="user_form" onclick="saveUserRole(this.value)" value="Save">
                                                 <button class="btn btn-primary"
                                                  type="button" disabled id="roleSavedBtn" style="display: none;">
                                                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Saved
                                                </button>
                                             <button class="btn btn-primary" type="button" disabled id="userRoleLoadingBtn" style="display: none;">
                                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing...<div id="target">
                                              </div>
                                            </button>
                                            </div>
                                           </div>
                                         </div>
                                       </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                  
      <!-- MODAL ADD USER END -->

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