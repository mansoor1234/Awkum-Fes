<?php include('../../config.php');?>
<?php include(INCLUDE_PATH . '/logic/add/addFaculty.php'); ?>
<?php include(INCLUDE_PATH . '/logic/add/editFaculty.php'); ?>
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
  }#example1_wrapper .row{
    overflow-x: scroll;
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
            <h1 class="m-0 text-dark">Faculty Add/List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Faculty</li>
              <li class="breadcrumb-item active">Faculty Add/List</li>
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
                   <?php if(isset($_GET['success_message'])): ?>
                    <div class="alert has-icon text-center" role="alert" id="success_message" style="border:1px dashed green; color: green;background-color: white"><i class="fa fa-check-circle alert-icon" ></i> <?php echo $_GET['success_message']; ?></div>
                    <?php endif; ?>
                    <?php if(isset($_GET['error_message'])): ?>
                    <div class="alert has-icon text-center" role="alert" id="success_message" style="border:1px dashed #f3091e; color: red;background-color: white"><i class="fa fa-exclamation-triangle alert-icon"></i> <?php echo $_GET['error_message']; ?></div>
                    <?php endif; ?>
                  </div>
              </div>
              <div class="btn-group">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFaculty">
                 Add Faculty
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
              <h3 class="card-title">Faculty List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100 " >
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Campus</th>
                  <th>Dept</th>
                  <th>Program</th>
                  <th>Semester</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="list">
                    <?php
                                         
                    $c=1;
                    $userID=$_SESSION['user']['User'];
                    $get_users=mysqli_query($con,"SELECT faculty.srno as FID,faculty.name,designation,campus.campus,department.dept_name,programs.program,semester.semester FROM faculty LEFT JOIN campus ON faculty.campus_id = campus.srno LEFT JOIN department ON faculty.department_id = department.srno LEFT JOIN programs ON faculty.program_id = programs.srno LEFT JOIN semester ON faculty.semester_id = semester.srno");
                    while($rows=mysqli_fetch_array($get_users)){
                    ?>
                <tr>
                    <td><?php  echo $c++;?></td>
                    <td><?php  echo $rows['name'];?></td>
                    <td><?php  echo $rows['designation'];?></td>
                    <td><?php  echo $rows['campus'];?></td>
                    <td><?php  echo $rows['dept_name'];?></td>
                    <td><?php  echo $rows['program'];?></td>
                    <td><?php  echo $rows['semester'];?></td>
                    <td>
                      <div class="btn-group">
                    <button class="btn btn-primary btn-sm editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['FID'];?>" onclick="facultyEdit(this.value)" id="editBtn"> Edit
                    </button>
                    <button class="btn btn-danger btn-sm editBtn" type="button" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['FID'];?>"  id="deleteBtn">Delete
                    </button></div></td>
                </tr>
                <?php }?>
               </tbody>
                <tfoot>
                <tr>
                   <th>S.NO</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Campus</th>
                  <th>Dept</th>
                  <th>Program</th>
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
              <!-- MODAL ADD STUDENT START -->
          <div class="modal fade" id="addFaculty">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add Faculty </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="POST" id="addCampusForm">
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                           <input class="form-control createBtn" type="text" placeholder="Full Name" name="name" required onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                         <input class="form-control createBtn" type="text" placeholder="Designation" name="designation" id="designation" required onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                            <select  class="form-control createBtn " name="campus" id="campus" onchange="getDepartment(this.value)">
                                <?php $query=mysqli_query($con,"select * from campus"); ?>
                                <option value="0">Choose Campus</option>
                                <?php while($rows=mysqli_fetch_array($query)){ ?>
                                <option value="<?php echo $rows['srno']; ?>"><?php echo $rows['campus']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                           <select  class="form-control createBtn " name="department" id="department" onchange="getProgram(this.value)">
                                <option value="0">Choose Department</option>
                           </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                          <select  class="form-control createBtn  " name="program" id="program" onchange="getSemester(this.value)">
                             <option value="0">Choose Program</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                          <select  class="form-control createBtn " name="semester" id="semester" onchange="getCourse(this.value)">
                             <option value="0">Choose Semester</option>
                           </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2 offset-3">
                        <div class="form-group">
                          <div class="form-group">
                          <select  class="form-control createBtn  " name="course" id="course" >
                             <option value="0">Choose Course</option>
                           </select>
                        </div>
                        </div>
                    </div>
                  </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addFacilty" onclick="validateStd()"> Save</button>
                  </div>
                   </form>
                </div>
              </div>
            </div>
      <!-- MODAL ADD STUDENT END -->

         <!-- MODAL ADD PROGRAM START -->
        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content" >
                     <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Program</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="editProgForm">
                   <div id="modal_content"></div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                         <input  class="btn btn-primary mr-2" type="submit"  name="facultyEdit"  value="Save Changes" >
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
  $(function () {
    $("#example1").DataTable();
 });

</script>
</body>
</html>
<?php include('../../rbac.php'); ?>