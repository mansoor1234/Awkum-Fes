<?php include('../../config.php');?>
<?php include(INCLUDE_PATH . '/logic/add/addSemester.php'); ?>
<?php include(INCLUDE_PATH . '/logic/add/editSemester.php'); ?>
<?php include(INCLUDE_PATH . '/logic/add/delete.php'); ?>
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
            <h1 class="m-0 text-dark">Add /Semester</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Add</li>
              <li class="breadcrumb-item active">Semester</li>
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
              <div class="row">
                  <div class="col-md-6 offset-3" >
                  <center>
                      <?php if(isset($_SESSION['success'])): ?>
                      <div class="alert alert-success has-icon" role="alert" id="success_message"><i class="fa fa-check-circle alert-icon"></i> <?php echo $_SESSION['success']; ?></div>
                      <?php unset($_SESSION['success']); ?> 
                      <?php endif; ?>
                      

                      <?php if(isset($_SESSION['error'])): ?>
                      <div class="alert alert-danger has-icon" role="alert" id="error_message"><i class="fa fa-exclamation-triangle alert-icon"></i> <?php echo $_SESSION['error']; ?></div>
                      <?php endif; ?>
                      <?php unset($_SESSION['error']); ?> 
                   </center>
                  </div>
              </div>
              <div class="btn-group">
               <button type="button" class="btn btn-primary createBtn" data-toggle="modal" data-target="#myModal">
                 Add Semester
               </button>
              </div>
             </div>
            <!-- /.card -->
         </div>
       </div>

       <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semesters List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100"  >
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Semester</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="list">
                    <?php
                                         
                    $c=1;
                    $userID=$_SESSION['user']['User'];
                    $get_users=mysqli_query($con,"SELECT * from semester");
                    while($rows=mysqli_fetch_array($get_users)){
                   ?>
                <tr>
                    <td><?php  echo $c++;?></td>
                    <td><?php  echo $rows['semester'];?></td>
                   <td>
                     <form method="POST">
                      <div class="btn-group">
                    <button class="btn btn-primary btn-xs editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['srno'];?>" onclick="courseEdit(this.value)" id="editBtn">Edit
                    </button>
                    <button name="deleteSemester" class="btn btn-danger btn-xs deleteBtn" type="submit" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['srno'];?>"  id="deleteBtn" onclick="return confirm('Are you sure?')">Delete
                    </button></div></form></td></td>
                </tr>
                <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>S.NO</th>
                  <th>Semester</th>
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

           <!-- MODAL ADD PROGRAM START -->
             <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add Semester </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="POST" id="addCampusForm">
                       <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div id="output"></div>
                            <div class="form-group">
                             <input class="form-control createBtn" type="text" id="semester" name="semester"  placeholder="Semester Name" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);" required>
                            </div>
                        </div>
                      </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addSemester" onclick="validateSemester()"> Save</button>
                  </div>
                   </form>
                </div>
              </div>
            </div>
            
          <!-- MODAL ADD PROGRAM END -->
      
      <!-- MODAL ADD PROGRAM START -->
        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content" id="editUserModalContent">
                     <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Semester</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="editProgForm">
                   <div id="modal_content"></div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                         <input  class="btn btn-primary mr-2" type="submit" id="" name="prog_edit"  value="Save Changes" >
                        </button>
                     </div>
                  </form>
             </div>
         </div>
     </div> 
      <!-- MODAL ADD PROGRAM END -->
    
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL; ?>assets/dist/js/demo.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dist/js/main.js"></script>
<script src="<?php echo BASE_URL; ?>assets/dist/js/addjs.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
 });
  $(function () {
    $("#example2").DataTable();
 });
function validateSemester(){
var semester=$("#semester").val(); 
if(semester==""){
   $("form").submit(function(e) {
    e.preventDefault();
   });
  if(semester==""){$("#semester").css("border","1px solid red");}else{$("#semester").css("border","1px solid green");}
 }else{
  $('form').on('submit',function(event){
  event.preventDefault();
  event.currentTarget.submit();
});
 }
}
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
<?php include('../../rbac.php'); ?>