<?php include('../../config.php');?>
<?php include(INCLUDE_PATH . '/logic/add/addDepartment.php'); ?>
<?php include(INCLUDE_PATH . '/logic/add/editDepartment.php'); ?>
<?php  loginCheck(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include(INCLUDE_PATH.'/layouts/links.php');?> 
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/choosen/chosen.css">
<style>
  td,th,tr{
    height: 35px;
    border: 1px solid #f4f6f9;
    padding-left: 11px;
  }.chosen-container{
    width: 100%!important;
  }.chosen-search-input{
    width: 147.125px;
    height: 33px!important;
    border-radius: 50%!important; 
    border: none!important;
  }.chosen-select{
    width: 100%;
  }.chosen-single{
    height: 40px!important;
  }.chosen-single span{
    margin-top: 8px;
  }.chosen-single div{
    top:10px!important;
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
            <h1 class="m-0 text-dark">Add /Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Add</li>
              <li class="breadcrumb-item active">Department</li>
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
                          Add Department
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
              <h3 class="card-title">Department List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100"  >
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Department</th>
                  <th>Campus</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="list">
                    <?php
                                         
                    $c=1;
                    $userID=$_SESSION['user']['User'];
                    $get_users=mysqli_query($con,"SELECT campus.srno, campus.campus, department.srno as dept_id,department.dept_name
                       FROM department
                       INNER JOIN campus ON campus.srno=department.campus_id;");
                    while($rows=mysqli_fetch_array($get_users)){
                   ?>
                <tr>
                    <td><?php  echo $c++;?></td>
                    <td><?php  echo $rows['dept_name'];?></td>
                    <td><?php  echo $rows['campus'];?></td>
                   <td>
                    <button class="btn btn-primary btn-xs editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['dept_id'];?>" onclick="deptEdit(this.value)" id="editBtn">Edit
                    </button>
                    <button class="btn btn-danger btn-xs deleteBtn" type="button" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['dept_id'];?>"  id="deleteBtn">Delete
                    </button></td>
                </tr>
                <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>S.NO</th>
                  <th>Department</th>
                  <th>Campus</th>
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

           <!-- MODAL ADD DEPARTMENT START -->
             <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add Department </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="POST" id="addCampusForm">
                       <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div id="output"></div>
                            <div class="form-group">
                             <input class="form-control createBtn" type="text" id="deptName" name="deptName" required placeholder="Department Name" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div class="form-group">
                              <select data-placeholder="Choose Campus (Single Selection)"  class="form-control createBtn chosen-select" name="campus" required id="campus">
                                <?php $query=mysqli_query($con,"select * from campus"); ?>
                                <option value="0">Choose Campus</option>
                                <?php while($rows=mysqli_fetch_array($query)){ ?>
                                <option value="<?php echo $rows['srno']; ?>"><?php echo $rows['campus']; ?></option>
                                <?php } ?>
                               </select>
                            </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div class="form-group">
                              <select data-placeholder="Choose Program (Multiple Selection)"  class="form-control createBtn chosen-select" name="programs[]" multiple id="programs" required>
                                <?php $query=mysqli_query($con,"select * from programs"); ?>
                                <option value="0">Choose Program</option>
                                <?php while($rows=mysqli_fetch_array($query)){ ?>
                                <option value="<?php echo $rows['srno']; ?>"><?php echo $rows['program']; ?></option>
                                <?php } ?>
                               </select>
                            </div>
                        </div>
                       </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addCampus" value="set" > Save</button>
                  </div>
                   </form>
                </div>
              </div>
            </div>
            
          <!-- MODAL ADD DEPARTMENT END -->
       
          <!-- MODAL EDIT DEPARTMENT START -->
        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content" id="editUserModalContent">
                     <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Department</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="editUserForm">
                   <div id="modal_content"></div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                         <input  class="btn btn-primary mr-2" type="submit" id="" name="deptEdit"  value="Save Changes" >
                        </button>
                     </div>
                  </form>
             </div>
         </div>
     </div> 
      <!-- MODAL EDIT DEPARTMENT END -->
       
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
<script src="<?php echo BASE_URL; ?>assets/dist/js/addjs.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Choosen -->
<script src="<?php echo BASE_URL; ?>assets/plugins/choosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/choosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/choosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<script>
$(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
});
  $(".chosen-container").click(function(){ 
    $("input").removeAttr("checked","checked");
    $(this).parent("div").find("div.custom-control.custom-radio .enable-disable-btn").attr("checked","checked");
 })
  $(function () {
    $("#example1").DataTable();
 });
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
<?php include('../../rbac.php'); ?>