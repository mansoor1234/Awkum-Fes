
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
            <h1 class="m-0 text-dark">Add Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Role Permissions</li>
              <li class="breadcrumb-item active">Add Role</li>
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
                                <h5 class="box-title">Add Role</h5>
                                <div class="table-responsive">
                                 
                                    <form method="POST" id="addRoleForm" >
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="1">Role Name *</th>
                                                <td colspan="4"><input type="text" name="roleName" class="form-control createBtn" id="roleName" placeholder="Role Name" required=""></td>
                                           </tr>
                                           <tr>
                                                <th colspan="1">Description *</th>
                                                <td colspan="4"><textarea  type="text" name="roleDesc" class="form-control createBtn" id="roleDescription" placeholder="Role Description" required=""></textarea></td>
                                           </tr>
                                           <tbody>
                                             <tr>
                                               <td colspan="5" ><div class="alert alert-success has-icon" role="alert" id="success_message" style="display: none;"><center><i class="fa fa-check-circle alert-icon"></i> Role has been added.</center></div><div class="alert alert-danger has-icon" role="alert" id="error_message" style="display: none;"><center><i class="fa fa-exclamation-triangle alert-icon"></i> Please fill all the required fields</center></div></td>
                                            </tr>
                                            <tr>
                                               <td colspan="5" ><h5 class="box-title">USERS </h5></td>
                                            </tr>
                                            <tr>
                                                <th>Menu Title</th>
                                                <th>Can Create</th>
                                                <th>Can Read</th>
                                                <th>Can Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            <tr>
                                                <td>Users List<div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success float-right">
                                                <input type="checkbox" name="users" class="custom-control-input"  value="1" id="User"  onclick="return false;"><label class="custom-control-label" for="User"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="usercreate[]" value="1" class="userCheckbox custom-control-input" onchange="checkUncheck('userCheckbox','User')" id="sw1"><label class="custom-control-label" for="sw1"></label></div></td>
                                                  
                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="userread[]" value="1" class="userCheckbox custom-control-input" onchange="checkUncheck('userCheckbox','User')" id="sw2"><label class="custom-control-label" for="sw2"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="useredit[]" value="1" class="userCheckbox custom-control-input" onchange="checkUncheck('userCheckbox','User')" id="sw3"><label class="custom-control-label" for="sw3"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="userdelete[]" value="1" class="userCheckbox custom-control-input" onchange="checkUncheck('userCheckbox','User')" id="sw4"><label class="custom-control-label" for="sw4"></label></div></td>
                                            </tr>
                                            <tr>
                                               <td colspan="5"><h5 class="box-title">Role Permissions</h5></td>
                                               
                                            </tr>
                                            <tr>
                                                <td>Permission Setup <div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success float-right">
                                                <input type="checkbox" name="permSetup" class="custom-control-input"  value="1" id="PermissionSetup"  onclick="return false;"><label class="custom-control-label" for="PermissionSetup"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="permissionsetupcreate[]" value="1" class="PermissionSetup custom-control-input" onchange="checkUncheck('PermissionSetup','PermissionSetup')" id="sw5"><label class="custom-control-label" for="sw5"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="permissionsetupread[]" value="1" class="PermissionSetup custom-control-input" onchange="checkUncheck('PermissionSetup','PermissionSetup')" id="sw6"><label class="custom-control-label" for="sw6"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="permissionsetupedit[]" value="1" class="PermissionSetup custom-control-input" onchange="checkUncheck('PermissionSetup','PermissionSetup')" id="sw7"><label class="custom-control-label" for="sw7"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="permissionsetupdelete[]" value="1" class="PermissionSetup custom-control-input" onchange="checkUncheck('PermissionSetup','PermissionSetup')" id="sw8"><label class="custom-control-label" for="sw8"></label></div></td>
                                            </tr>
                                            <tr>
                                                <td>Add Role<div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success float-right">
                                                <input type="checkbox" name="addRole" class="custom-control-input"  value="1" id="AddRole"  onclick="return false;"><label class="custom-control-label" for="AddRole"></label></div></td>

                                                 <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="addrolecreate[]" value="1" class="AddRole custom-control-input" onchange="checkUncheck('AddRole','AddRole')" id="sw9"><label class="custom-control-label" for="sw9"></label></div> </td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="addroleread[]" value="1" class="AddRole custom-control-input" onchange="checkUncheck('AddRole','AddRole')" id="sw10"><label class="custom-control-label" for="sw10"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="addroleedit[]" value="1" class="AddRole custom-control-input" onchange="checkUncheck('AddRole','AddRole')" id="sw11"><label class="custom-control-label" for="sw11"></label></div> </td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="addroledelete[]" value="1" class="AddRole custom-control-input" onchange="checkUncheck('AddRole','AddRole')" id="sw12"><label class="custom-control-label" for="sw12"></label></div> </td>
                                            </tr>
                                            <tr>
                                                <td>User Role <div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success float-right">
                                                <input type="checkbox" name="userRole" class="custom-control-input"  value="1" id="UserRole"  onclick="return false;"><label class="custom-control-label" for="UserRole"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="userrolecreate[]" value="1" class="UserRole custom-control-input" onchange="checkUncheck('UserRole','UserRole')" id="sw13"><label class="custom-control-label" for="sw13"></label></div></td>
                                                
                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="userroleread[]" value="1" class="UserRole custom-control-input" onchange="checkUncheck('UserRole','UserRole')" id="sw14"><label class="custom-control-label" for="sw14"></label></div></td>
                                                
                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="userroleedit[]" value="1" class="UserRole custom-control-input" onchange="checkUncheck('UserRole','UserRole')" id="sw15"><label class="custom-control-label" for="sw15"></label></div></td>

                                                <td><div class="custom-control custom-switch custom-switch-off-danger    custom-switch-on-success">
                                                <input type="checkbox" name="userroleedit[]" value="1" class="UserRole custom-control-input" onchange="checkUncheck('UserRole','UserRole')" id="sw16"><label class="custom-control-label" for="sw16"></label></div></td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                    <input type="hidden" name="AddRoleBtn" value="set">
                                     
                                      <button class="form-control btn btn-primary" style="display: none;" disabled id="addRoleLoading"> <span class="spinner-grow spinner-grow-sm"></span>Processing..</button>
                                     <button class="form-control btn btn-success" style="display: none;" id="addRoleSaved" disabled="">Saved</button>
                                     <input type="submit" name="AddRole"  class="form-control float-right btn btn-primary createBtn" id="addRoleBtn" onclick="addRoleData(this.value)"  value="Save">
                                     <button class="btn btn-light form-control" type="reset" 
                                     onclick="clearRoleData()">Clear</button>
                                    
                                   
                                    </form>
                                </div>
                            </div>
                        </div>
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