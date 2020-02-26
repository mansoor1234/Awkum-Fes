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
            <h1 class="m-0 text-dark">Student Registration Numbers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Students</li>
              <li class="breadcrumb-item active">Student Registration Numbers</li>
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
                <h3 class="card-title">Add Student Registration Numbers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"  method="post" enctype="multipart/form-data" id="addRegForm">
                <div class="card-body">

                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2 offset-3">
                       <div id="error_messages_area">
                         <div class="alert alert-success has-icon text-center" role="alert" id="success_message" style="display: none;"><i class="fa fa-check-circle alert-icon"></i> Registration number has been inserted.</div>
                          <div class="alert alert-danger has-icon" role="alert" id="error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Please enter registration number.</div>
                          <div class="alert alert-danger has-icon" role="alert" id="failed_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Failed to enter registration number.</div>
                        </div>
                       <div class="form-group">
                          <input type="hidden" name="addUserInfo" value="set">
                           <input class="form-control createBtn" type="text" placeholder="Registration Number" name="registration" required id="regstNo"> 
                        </div>
                    </div>
                   
                  </div>
               
                <!-- /.card-body -->
                <div class="card-footer float-sm-right d-flex">
                   <button class="btn btn-light" type="reset" onclick="clearFormData()">Clear </button>
                     <div id="target">
                        <input  class="btn btn-primary mr-2 createBtn" type="submit" id="submitBtn" name="user_form" onclick="addRegistrationNo(this.value)" value="Save">
                        <button class="btn btn-primary"type="button" disabled id="savedBtn" style="display: none;">
                          Saved
                        </button>
                     </div>
                   <button class="btn btn-primary" type="button" disabled id="loadingBtn" style="display: none;">
                     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Processing...
                   </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         </div>
       </div>
       </div>

      <div class="container-fluid">
       <div class="row">
         <div class="col-12 col-12 col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registeration Numbers List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100"  >
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Regt. Number</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $c=1;
                    $get_users=mysqli_query($con,"SELECT * from `registration_numbers`  ");
                    while($rows=mysqli_fetch_array($get_users)){
                    ?>
                <tr>
                    <td><?php  echo $c++;?></td>
                    <td><?php  echo $rows['number'];?></td>
                    <td>
                    <button class="btn btn-primary btn-sm editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['id'];?>" onclick="userEdit(this.value)" id="editBtn"><i class="far fa-edit" ></i> Edit
                    </button>
                    <button class="btn btn-primary btn-sm editBtn" type="button" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['id'];?>"  onclick="changeImage(this.value)" id="deleteBtn"> <i class="fas fa-delete"></i> Delete
                    </button></td>
                </tr>
                <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>S.NO</th>
                  <th>Name</th>
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
<script>
  function addRegistrationNo(asas){
$("#addRegForm").submit(function(e) {
e.preventDefault();
});  
var no = $("#regstNo").val();
if(no==""){
$("#failed_message").css("display","block");
$("#savedBtn").css("display","none");
$("#submitBtn").css("display","block");
}
$.ajax(
{
url: '../../ajax/students/registNo.php',
type: 'POST',
data:{regNo:no},
success:function(result){
if(result=="true"){
$(".alert-success").css("display","block");
$("#savedBtn").css("display","block");
$("#submitBtn").css("display","none");
  }else if(){
$("#failed_message").css("display","block");
$("#savedBtn").css("display","none");
$("#submitBtn").css("display","block");
  }
}
});
}
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>