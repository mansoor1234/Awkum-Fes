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
            <h1 class="m-0 text-dark">Users List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Users</li>
              <li class="breadcrumb-item active">Users List</li>
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
         <div class="col-12">
             <!-- general form elements -->
            <div class="card">
              <div class="card-header form-card-header">
                <h3 class="card-title">Users List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"  method="post" enctype="multipart/form-data" id="addUserForm">
                <div class="card-body">
                  <center>
                    <div id="error_messages_area">
                    <div class="alert alert-success has-icon" role="alert" id="success_message" style="display: none;"><i class="fa fa-check-circle alert-icon"></i> User has been registered.</div>
                    <div class="alert alert-danger has-icon" role="alert" id="error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, Failed to register user.</div>
                    <div class="alert alert-danger has-icon" role="alert" id="type_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, only JPG, JPEG & PNG  files are allowed.</div>
                    <div class="alert alert-danger has-icon" role="alert" id="size_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, your image must be smaller than 1mb.</div>
                    <div class="alert alert-danger has-icon" role="alert" id="dimension_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, your image dimension must be smaller than 295x413</div>
                    <div class="alert alert-danger has-icon" role="alert" id="password_email_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> You have entered invalid email address</div>
                    <div class="alert alert-danger has-icon" role="alert" id="password_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Your password doesn't match</div>
                    <div class="alert alert-danger has-icon" role="alert" id="email_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Email already taken</div>
                    <div class="alert alert-danger has-icon" role="alert" id="username_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Username already taken</div>
                 </center>

                   <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                           <input type="hidden" name="addUserInfo" value="set">
                          <input class="form-control createBtn" type="text" placeholder="First Name" name="firstname" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                         <input class="form-control createBtn" type="text" placeholder="Username" name="lastname" id="username" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                         <div class="input-group">
                            <div class="custom-file">
                              <input class="custom-file-input createBtn" type="file" name="image" >
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                         </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                          <input class="form-control createBtn" type="email" name="email" required onkeyup="validateEmail(this.value)" placeholder="Email Address" id="user_email">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                         <input class="form-control createBtn" type="password" id="user_password" name="password" required placeholder="Password">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                          <input class="form-control createBtn" type="password" id="user_confirm_password" name="confirm_password" required onkeyup="confirmPassword(this.value)" placeholder="Confirm Password">
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                  <div>

                     <small id="password_match_error_message" style="display: none;color:red">* Password doesn't match</small>
                  </div>
                  <div>
                     <small id="invalid_email_error_message" style="display: none;color:red">* Invalid email address</small>
                  </div>
                <div class="card-footer float-sm-right d-flex">
                   <button class="btn btn-light" type="reset" onclick="clearFormData()">Clear </button>
                     <div id="target">
                        <input  class="btn btn-primary mr-2 createBtn" type="submit" id="submit_btn" name="user_form" onclick="save(this.value)" value="Save">
                        <button class="btn btn-primary"type="button" disabled id="saved_btn" style="display: none;">
                          Saved
                        </button>
                     </div>
                   <button class="btn btn-primary" type="button" disabled id="loading_btn" style="display: none;">
                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing...
                   </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         </div>
       </div>

       <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100"  >
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Last Login</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                                         
                    $c=1;
                    $userID=$_SESSION['user']['User'];
                    $get_users=mysqli_query($con,"SELECT * from `rbac_user` where user_type='1'");
                    while($rows=mysqli_fetch_array($get_users)){
                    $image=$rows['image'];
                    $status=$rows['status'];
                    ?>
                <tr>
                    <td><?php  echo $c++;?></td>
                    <td><img src="../../assets/img/users/<?php echo $rows['image'];?>" width="30" height="30" style="border-radius: 10px;"> <?php  echo $rows['firstname'];?></td>
                    <td><?php  echo $rows['lastname'];?></td>
                    <td><?php  echo $rows['email'];?></td>
                    <td><?php  echo $rows['last_login'];?></td>
                    <td><?php if($status==1 && $rows['id']!=$userID): ?>
                    <div class="custom-control custom-switch">
                      <input type="checkbox"  name="status" value="1" class="PermissionSetup custom-control-input editBtn" onchange="ChangeStatus(<?php echo $rows['id'];?>,0)" id="customSwitch<?php echo $rows['id'];?>" checked="">
                      <label class="custom-control-label" for="customSwitch<?php echo $rows['id'];?>"></label>
                    </div>
                    <?php elseif($status==0 && $rows['id']!=$userID): ?>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input PermissionSetup editBtn" name="status" value="1"  onchange="ChangeStatus(<?php echo $rows['id'];?>,1)" id="customSwitch2<?php echo $rows['id'];?>">
                      <label class="custom-control-label" for="customSwitch2<?php echo $rows['id'];?>"></label>
                    </div>
                     <?php endif; ?>
                    </td>
                    <td>
                    <button class="btn btn-primary btn-sm editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['id'];?>" onclick="userEdit(this.value)" id="editBtn"><i class="far fa-edit" ></i> Edit
                    </button>
                    <button class="btn btn-primary btn-sm editBtn" type="button" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['id'];?>"  onclick="changeImage(this.value)" id="deleteBtn"> <i class="fas fa-upload"></i> Change Image
                    </button></td>
                </tr>
                <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>S.NO</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Last Login</th>
                  <th>Status</th>
                  <th>Actions</th>
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



      <!-- MODAL EDIT USER START -->
        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content" id="editUserModalContent">
                     <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="editUserForm">
                  <div id="modal_content"></div>
                    </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-light" type="reset" onclick="clearEditFormData()">Clear
                        </button>
                         <input  class="btn btn-primary mr-2" type="submit" id="submit_edit_btn" name="user_edit_form" onclick="editUser(this.value)" value="Save Changes">
                        <button class="btn btn-primary"
                         type="button" disabled id="saved_edit_btn" style="display: none;"></span>Saved
                    </button>
                    <div id="target1">
                  </div>
                     <button class="btn btn-primary" type="button" disabled id="loading_edit_btn" style="display: none;">
                       <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing...<div id="target">
                        </div>
                       </button>
                     </div>
                  </form>
             </div>
         </div>
     </div> 
      <!-- MODAL EDIT USER END -->
       <!-- MODAL CHANGE IMAGE START -->
       <div class="modal fade" id="changeImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog " role="document">
                 <div class="modal-content" id="editUserModalContent">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Change Image</h5>
                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                     <div class="modal-body">
                        <div class='card'>
                           <div class='card-body'>
                            <h5 class='box-title text-primary'>Change Image</h5>
                            <div id="target3"></div>
                          <form  method="post" enctype="multipart/form-data" 
                         id="imageChangeForm">
                       <div id="imageUploadContent"></div>
                     <input type='file' id="imgInp" name="imageFile" />
                       <center><img id="blah"  src="#" alt="your image" style="display: none;" /></center>
                        <div class="modal-footer">
                          <button class="btn btn-light" type="reset" onclick="">Clear
                           </button>
                         <input  class="btn btn-primary mr-2" type="submit" id="submit_change_image_btn" name="user_change_image_form" onclick="saveImage(this.value)" value="Save Changes">
                       <button class="btn btn-primary" type="button" disabled id="loading_change_image_btn" style="display: none;">
                         <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing...<div id="target">
                      </div>
                        </button>
                       </div>
                     </form>
                  </div>
                </div>
               </div>
             </div>
         </div>
     </div> 
      <!-- MODAL CHANGE IMAGE END -->
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