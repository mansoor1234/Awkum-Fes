<?php include('../../config.php');?>
<?php include(INCLUDE_PATH . '/logic/add/addProgram.php'); ?>
<?php include(INCLUDE_PATH . '/logic/add/editProgram.php'); ?>
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
            <h1 class="m-0 text-dark">Add /Program</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Add</li>
              <li class="breadcrumb-item active">Program</li>
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
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                 Add Program
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
              <h3 class="card-title">Program List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="w-100"  >
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Program</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="list">
                    <?php
                                         
                    $c=1;
                    $userID=$_SESSION['user']['User'];
                    $get_users=mysqli_query($con,"SELECT * from programs");
                    while($rows=mysqli_fetch_array($get_users)){
                   ?>
                <tr>
                    <td><?php  echo $c++;?></td>
                    <td><?php  echo $rows['program'];?></td>
                   <td>
                    <button class="btn btn-primary btn-xs editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['srno'];?>" onclick="progEdit(this.value)" id="editBtn">Edit
                    </button>
                    <button class="btn btn-danger btn-xs deleteBtn" type="button" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['srno'];?>"  id="deleteBtn">Delete
                    </button></td>
                </tr>
                <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>S.NO</th>
                  <th>Program</th>
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
                    <h4 class="modal-title">Add Program </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="POST" id="addProgram">
                       <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div id="output"></div>
                            <div class="form-group">
                             <input class="form-control createBtn" type="text" id="program" name="program" required placeholder="Program Name" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div class="form-group">
                             <select  class="form-control createBtn chosen-select" name="semester" id="semester" >
                                <option value="0">Choose Semesters</option>
                                <option value="2">2 Semesters</option>
                                <option value="4">4 Semesters</option>
                                <option value="8">8 Semesters</option>
                             </select>
                            </div>
                        </div>
                       </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addProgram"  onclick="validateProgram()"> Save</button>
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
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Program</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="editProgForm">
                   <div id="modal_content"></div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                         <input  class="btn btn-primary mr-2" type="submit" id="" name="prog_edit"  value="Save Changes"  onclick="validateEditProgram()">
                        </button>
                     </div>
                  </form>
             </div>
         </div>
     </div> 
      <!-- MODAL ADD PROGRAM END -->
     <!-- MODAL ADD PROGRAM+SEMSTER START -->
             <div class="modal fade" id="myModal2">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add Program Semesters </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="POST" id="addCampusForm">
                       <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div id="output"></div>
                            <div class="form-group">
                             <input class="form-control createBtn" type="text" id="program" name="program" required placeholder="Program Name" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8  col-sm-12 offset-2 mb-2">
                            <div class="form-group">
                             <input class="form-control createBtn" type="text" id="program" name="program" required placeholder="Program Name" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                            </div>
                        </div>
                      </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addProgram" onclick="viladateProduct()"> Save</button>
                  </div>
                   </form>
                </div>
              </div>
            </div>
            
          <!-- MODAL ADD PROGRAM+SEMSTER END -->  
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

</script>
</body>
</html>
<?php include('../../rbac.php'); ?>

