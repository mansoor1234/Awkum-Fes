
<?php include('../config.php');?>

<?php 

if (isset($_SESSION['stdID']) && isset($_SESSION['stdREG'])) {
extract($_POST);
if(isset($submitForm)){
  $dateTime=dateTime();
 $std=mysqli_query($con,"select * from students where srno='".$_SESSION['stdID']."' ");
 $result=mysqli_fetch_array($std);
 // print_r($result);
 $session="2020/2021";
 $cmps=$result['campus_id'];
 $dept=$result['department_id'];
 $prog=$result['program_id'];
 $sem=$result['semester_id'];
 $stdid=$_SESSION['stdID'];
 $insert=$conn->prepare("INSERT INTO `evaluation`( `campus_id`, `department_id`, `program_id`, `semester_id`, `faculty_id`, `course_id`, `student_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `session`, `created_at`)
  VALUES (:campus,:dept,:program,:semester,:faculty,:course,:student,:q1,:q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10,:q11,:q12,:q13,:q14,:q15,:q16,:session,:datetime1)");
 $insert->bindParam(":campus",$cmps);
 $insert->bindParam(":dept",$dept);
 $insert->bindParam(":program",$prog);
 $insert->bindParam(":semester",$sem);
 $insert->bindParam(":faculty",$facultyID);
 $insert->bindParam(":course",$courseID);
 $insert->bindParam(":student",$stdid);
 $insert->bindParam(":q1",$q1);
 $insert->bindParam(":q2",$q2);
 $insert->bindParam(":q3",$q3);
 $insert->bindParam(":q4",$q4);
 $insert->bindParam(":q5",$q5);
 $insert->bindParam(":q6",$q6);
 $insert->bindParam(":q7",$q7);
 $insert->bindParam(":q8",$q8);
 $insert->bindParam(":q9",$q9);
 $insert->bindParam(":q10",$q10);
 $insert->bindParam(":q11",$q11);
 $insert->bindParam(":q12",$q12);
 $insert->bindParam(":q13",$q13);
 $insert->bindParam(":q14",$q14);
 $insert->bindParam(":q15",$q15);
 $insert->bindParam(":q16",$q16);
 $insert->bindParam(":session",$session);
 $insert->bindParam(":datetime1",$dateTime);
 $run=$insert->execute();
 if($run){
 $_SESSION['success2']="Form has been submited successfully.";
 }else{
 $_SESSION['error2']="Please attempt all questions."; 
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faculty Evaluation System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet"  href="<?php echo BASE_URL; ?>/assets/dist/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/toastr/toastr.min.css">
<style>
  td,th,tr{
    height: 35px;
    border: 1px solid #f4f6f9;
    padding-left: 11px;
  }.box-title{
    color:#c41313;
  }
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" style="margin-right: 18%;">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Faculty Evaluation Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><?php echo $_SESSION['stdNAME']; ?></li>
              <li class="breadcrumb-item active"><?php echo $_SESSION['stdREG']; ?></li>
              <li class="breadcrumb-item active"><a href="../studentLogin/logout.php">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
    $get_users=mysqli_query($con,"SELECT students.srno as STID,students.name,students.f_name,students.email,students.contact,students.reg_no,campus.campus,department.dept_name,programs.program,semester.semester,department.srno as did, semester.srno as sid,programs.srno as progid,campus.srno as campid
      FROM students 
      LEFT JOIN campus ON students.campus_id = campus.srno
      LEFT JOIN department ON students.department_id = department.srno 
      LEFT JOIN programs ON students.program_id = programs.srno 
      LEFT JOIN semester ON students.semester_id = semester.srno WHERE students.srno='".$_SESSION['stdID']."'");
      $rows=mysqli_fetch_array($get_users);
      extract($rows);
      $faculty=mysqli_query($con,"SELECT * from faculty
       where campus_id='$campid' and department_id='$did' and program_id='$progid' and semester_id='$sid' ");
      // $rows2=mysqli_fetch_array($faculty);

    ?>
   <!-- Main content -->
   <?php 
   $count1=mysqli_num_rows($faculty);
   $eval2=mysqli_query($con,"select * from evaluation where student_id=".$_SESSION['stdID']."");
   $count4=mysqli_num_rows($eval2);
   $progress=$count4*100/$count1;
   $progress=round($progress);
   $progress2=$progress.'%';
   if($progress<50){
   echo " <div class='progress '>
                  <div class='progress-bar progress-bar-danger progress-bar-striped bg-danger' role='progressbar' aria-valuenow='70' aria-valuemin='0' id='progress' aria-valuemax='100' style='width: $progress2'>
                  </div>
                 </div><center><span >$progress2 Complete</span></center>";
  }elseif($progress>=50 && $progress<80){
      echo " <div class='progress '>
                  <div class='progress-bar progress-bar-danger progress-bar-striped bg-warning' role='progressbar' aria-valuenow='70' aria-valuemin='0' id='progress' aria-valuemax='100' style='width: $progress2'>
                  </div>
                </div><center><span >$progress2 Complete</span></center>";
  }elseif($progress2>=80){
     echo " <div class='progress '>
                  <div class='progress-bar progress-bar-danger progress-bar-striped bg-success' role='progressbar' aria-valuenow='70' aria-valuemin='0' id='progress' aria-valuemax='100' style='width: $progress2'>
                  </div>
                </div><center><span >$progress2 Complete</span></center>";
  }if($progress==100){
    $stID=$_SESSION['stdID'];
   $updateStatus=mysqli_query($con,"UPDATE `students` SET  status='0' WHERE srno='$stID'");
   header("Location:../studentLogin/logout.php");
  }
  while ($rows2=mysqli_fetch_array($faculty)) {
   $course=mysqli_query($con,"select * from course where srno='".$rows2['course_id']."' ");
   $rows3=mysqli_fetch_array($course);
   $count2=mysqli_num_rows($course);
   $eval=mysqli_query($con,"select * from evaluation where campus_id='$campid' and department_id='$did' and program_id='$progid' and semester_id='$sid' and student_id=".$_SESSION['stdID']." and faculty_id=".$rows2['srno']."");
   $count3=mysqli_num_rows($eval);
   
  if ($count3==0) {
 ?>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-body">
                                <h5 class="box-title"></h5>
                                <div class="table-responsive">
                                    <?php if(isset($_SESSION['success2'])): ?>
                                    <div class="alert alert-success has-icon" role="alert" id="success_message"><i class="fa fa-check-circle alert-icon"></i> <?php echo $_SESSION['success2']; ?></div>
                                    <?php unset($_SESSION['success2']); ?> 
                                    <?php endif; ?>
                                    

                                    <?php if(isset($_SESSION['error2'])): ?>
                                    <div class="alert alert-danger has-icon" role="alert" id="error_message"><i class="fa fa-exclamation-triangle alert-icon"></i> <?php echo $_SESSION['error2']; ?></div>
                                    <?php endif; ?>
                                    <?php unset($_SESSION['error2']); ?> 
                                    <form method="POST" id="evaluation" >
                                    <table class="table table-bordered">
                                    <thead class="thead-light">
                                            <tr>
                                                <th colspan="1">Teacher Name</th>
                                                <td colspan="4"><input type="text" name="name" class="form-control " id="name" placeholder="Name" required="" value="<?php echo $rows2['name']; ?>" readonly>
                                                  <input type="hidden" name="facultyID" value="<?php echo $rows2['srno']; ?>">
                                                </td>
                                           </tr>
                                           <tr>
                                                <th colspan="1">Designation</th>
                                                <td colspan="4"><input  type="text" name="regNo" class="form-control " id="regNo" placeholder="Registration Number" required="" value="<?php echo $rows2['designation']; ?>" readonly></td>
                                           </tr>
                                            <tr>
                                                <th colspan="1">Course Name</th>
                                                <td colspan="4"><input  type="text" name="course" class="form-control " id="course" placeholder="Course Name" required="" value="<?php echo $rows3['course_name']; ?>" readonly>
                                                 <input type="hidden" name="courseID" value="<?php echo $rows2['course_id']; ?>">
                                                </td>
                                           </tr>
                                            <tr>
                                                <th colspan="1">Course Code</th>
                                                <td colspan="4"><input  type="text" name="code" class="form-control " id="code" placeholder="Course Code" required="" value="<?php echo $rows3['course_code']; ?>" readonly></td>
                                           </tr>
                                         </thead>
                                         
                                           <tbody>
                                             <tr>
                                               <td colspan="5" ><div class="alert alert-success has-icon" role="alert" id="success_message" style="display: none;"><center><i class="fa fa-check-circle alert-icon"></i> Role has been added.</center></div><div class="alert alert-danger has-icon" role="alert" id="error_message" style="display: none;"><center><i class="fa fa-exclamation-triangle alert-icon"></i> Please fill all the required fields</center></div></td>
                                            </tr>
                                            <tr>
                                          
                                                <th class="text-center">Strongly Disagree</th>
                                                <th class="text-center">Disagree</th>
                                                <th class="text-center">Uncertain</th>
                                                <th class="text-center">Agree</th>
                                                <th class="text-center">Strongly Agree</th>
                                            </tr>
                                           
                                             <tr>
                                               <td colspan="5"><h6 class="box-title">The course contents, objectives & outcomes were provided by the concerned teacher.             
                                               </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q1" id="radioSuccess1" value="1">
                                                       <label for="radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q1" id="radioSuccess2" value="2">
                                                       <label for="radioSuccess2">
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q1" id="radioSuccess3" value="3">
                                                       <label for="radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q1" id="radioSuccess4" value="4">
                                                       <label for="radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q1" id="321radioSuccess5" value="5">
                                                       <label for="321radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                            <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher provides relevant/useful course meterial (notes, books references, web reference etc).             
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q2" id="radioSuccess5" value="1">
                                                       <label for="radioSuccess5">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q2" id="radioSuccess6" value="2">
                                                       <label for="radioSuccess6">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q2" id="radioSuccess7" value="3">
                                                       <label for="radioSuccess7">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q2" id="radioSuccess8" value="4">
                                                       <label for="radioSuccess8">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q2" id="radioSuccess9" value="5">
                                                       <label for="radioSuccess9">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher explain the course contents and concepts clearly.              
                                              </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q3" id="radioSuccess11" value="1">
                                                       <label for="radioSuccess11">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q3" id="radioSuccess22" value="2">
                                                       <label for="radioSuccess22">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q3" id="radioSuccess33" value="3">
                                                       <label for="radioSuccess33">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q3" id="radioSuccess44" value="4">
                                                       <label for="radioSuccess44">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q3" id="radioSuccess55" value="5">
                                                       <label for="radioSuccess55">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher has completed the course.              
                                               </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q4" id="radioSuccess16" value="1">
                                                       <label for="radioSuccess16">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q4" id="radioSuccess27" value="2">
                                                       <label for="radioSuccess27">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q4" id="radioSuccess38" value="3">
                                                       <label for="radioSuccess38">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q4" id="radioSuccess49" value="4">
                                                       <label for="radioSuccess49">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q4" id="radioSuccess511" value="5">
                                                       <label for="radioSuccess511">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher gives real life examples of the topic/lecture being taught.              
                                              </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q5" id="radioSuccess122" value="1">
                                                       <label for="radioSuccess122">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q5" id="radioSuccess233" value="2">
                                                       <label for="radioSuccess233">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q5" id="radioSuccess344" value="3">
                                                       <label for="radioSuccess344">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q5" id="radioSuccess455" value="4">
                                                       <label for="radioSuccess455">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q5" id="radioSuccess566" value="5">
                                                       <label for="radioSuccess566">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher connects students to local and global resources to gather information about and to solve real world problems.              
            
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q6" id="radioSuccess177" value="1">
                                                       <label for="radioSuccess177">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q6" id="radioSuccess288" value="2">
                                                       <label for="radioSuccess288">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q6" id="radioSuccess399" value="3">
                                                       <label for="radioSuccess399">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q6" id="radioSuccess4111" value="4">
                                                       <label for="radioSuccess4111">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q6" id="radioSuccess5222" value="5">
                                                       <label for="radioSuccess5222">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher engages students in learning and applying the critical thinking skills (Assignments, Practicals, Projects, Field Visits,Tasks) used in the course.             
          
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q7" id="radioSuccess1333" value="1">
                                                       <label for="radioSuccess1333">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q7" id="radioSuccess2444" value="2">
                                                       <label for="radioSuccess2444">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q7" id="radioSuccess3555" value="3">
                                                       <label for="radioSuccess3555">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q7" id="radioSuccess4666" value="4">
                                                       <label for="radioSuccess4666">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q7" id="radioSuccess5777" value="5">
                                                       <label for="radioSuccess5777">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher engages students in developing communications skills that support learning in the subject area.              
            
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q8" id="radioSuccess1888" value="1">
                                                       <label for="radioSuccess1888">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q8" id="radioSuccess2888" value="2">
                                                       <label for="radioSuccess2888">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q8" id="radioSuccess3999" value="3">
                                                       <label for="radioSuccess3999">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q8" id="radioSuccess41111" value="4">
                                                       <label for="radioSuccess41111">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q8" id="radioSuccess511112" value="5">
                                                       <label for="radioSuccess511112">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher encourages the students to ask questions and participate in the class & provide guidance on course meterial.             
            
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q9" id="radioSuccess12222" value="1">
                                                       <label for="radioSuccess12222">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q9" id="radioSuccess23333" value="2">
                                                       <label for="radioSuccess23333">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q9" id="radioSuccess34444" value="3">
                                                       <label for="radioSuccess34444">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q9" id="radioSuccess45555" value="4">
                                                       <label for="radioSuccess45555">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q9" id="radioSuccess56666" value="5">
                                                       <label for="radioSuccess56666">
                                                        Strongly Agree
                                                       </label>

                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher maintains an environment that helps in learning.             
            
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q10" id="1radioSuccess121" value="1">
                                                       <label for="1radioSuccess121">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q10" id="2radioSuccess2" value="2">
                                                       <label for="2radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q10" id="3radioSuccess3" value="3">
                                                       <label for="3radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q10" id="4radioSuccess4" value="4">
                                                       <label for="4radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q10" id="5radioSuccess5" value="5">
                                                       <label for="5radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher comes & leaves the class on time.              
             
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q11" id="6radioSuccess1" value="1">
                                                       <label for="6radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q11" id="7radioSuccess2" value="2">
                                                       <label for="7radioSuccess2">
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q11" id="8radioSuccess3" value="3">
                                                       <label for="8radioSuccess3">
                                                        Uncertain
                                                        
                                                        
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q11" id="9radioSuccess4" value="4">
                                                       <label for="9radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q11" id="10radioSuccess5" value="5">
                                                       <label for="10radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher has delivered all the lectures as per time table.              
          
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q12" id="11radioSuccess1" value="1">
                                                       <label for="11radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q12" id="12radioSuccess2" value="2">
                                                       <label for="12radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q12" id="13radioSuccess3" value="3">
                                                       <label for="13radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q12" id="14radioSuccess4" value="4">
                                                       <label for="14radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q12" id="15radioSuccess5" value="5">
                                                       <label for="15radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher is fair in examination.              
             
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q13" id="16radioSuccess1" value="1">
                                                       <label for="16radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q13" id="17radioSuccess2" value="2">
                                                       <label for="17radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q13" id="18radioSuccess3" value="3">
                                                       <label for="18radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q13" id="19radioSuccess4" value="4">
                                                       <label for="19radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q13" id="110radioSuccess5" value="5">
                                                       <label for="110radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                 <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher returns / marked scripts(papers, assignments, tests, quizzes, mid-term and final-term result etc) within 15 days after the exam being done.              
          
                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q14" id="111radioSuccess1" value="1">
                                                       <label for="111radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q14" id="112radioSuccess2" value="2">
                                                       <label for="112radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q14" id="113radioSuccess3" value="3">
                                                       <label for="113radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q14" id="114radioSuccess4" value="4">
                                                       <label for="114radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q14" id="115radioSuccess5" value="5">
                                                       <label for="115radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher gives good feedback on assignments, projects, tests, quizzes, and presentations etc, so the student can improve.             

                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q15" id="116radioSuccess1" value="1">
                                                       <label for="116radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q15" id="117radioSuccess2" value="2">
                                                       <label for="117radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q15" id="118radioSuccess3" value="3">
                                                       <label for="118radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q15" id="119radioSuccess4" value="4">
                                                       <label for="119radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q15" id="220radioSuccess5" value="5">
                                                       <label for="220radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>
                                                <tr>
                                               <td colspan="5"><h6 class="box-title">The teacher is available during the specified office hours and for discussions after the class.              

                                             </h6></td>
                                            </tr>
                                                <tr>
                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q16" id="221radioSuccess1" value="1">
                                                       <label for="221radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" onchange="validate()" name="q16" id="222radioSuccess2" value="2">
                                                       <label for="222radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q16" id="223radioSuccess3" value="3">
                                                       <label for="223radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q16" id="224radioSuccess4" value="4">
                                                       <label for="224radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" onchange="validate()" name="q16" id="225radioSuccess5" value="5">
                                                       <label for="225radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>

                                        </thead>
                                        
                                    </table>
                                   <input type="submit"  name="submitForm" id="submit" disabled="disabled" class="form-control btn btn-success">
                                  
                                    </form>
                                </div>
                            </div>
                        </div>
           </div> <!-- col-12 -->
        </div><!-- row -->
      </div><!-- /.container-fluid -->
    </section>
     <?php break;}} ?>
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
<?php include(BASE_URL.'includes/layouts/footer.php');?>
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
<!-- DataTables -->
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Toaster -->
<script src="<?php echo BASE_URL; ?>assets/plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
 });
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function validate() {
 
if ($('input[name=q1]:checked').length == 0) {
    error=1;
}else if ($('input[name=q2]:checked').length == 0) {
    error=1;
}else if ($('input[name=q3]:checked').length == 0) {
    error=1;
}else if ($('input[name=q4]:checked').length == 0) {
    error=1;
}else if ($('input[name=q5]:checked').length == 0) {
    error=1;
}else if ($('input[name=q6]:checked').length == 0) {
    error=1;
}else if ($('input[name=q7]:checked').length == 0) {
    error=1;
}else if ($('input[name=q8]:checked').length == 0) {
    error=1;
}else if ($('input[name=q9]:checked').length == 0) {
    // do something h0ere
}else if ($('input[name=q10]:checked').length == 0) {
    error=1;
}else if ($('input[name=q11]:checked').length == 0) {
    error=1;
}else if ($('input[name=q12]:checked').length == 0) {
    error=1;
}else if ($('input[name=q13]:checked').length == 0) {
    error=1;
}else if ($('input[name=q14]:checked').length == 0) {
    error=1;
}else if ($('input[name=q15]:checked').length == 0) {
    error=1;
}else if ($('input[name=q16]:checked').length == 0) {
    error=1;
}else{
  error=0;
}
if(error==0){
   $("#submit").removeAttr("disabled","disabled");
}else{
// toastr.error('Please attempt all questions.');
   $("#submit").attr("disabled","disabled");
}
}
</script>
</body>
</html>

<?php }else{header("Location:../../index2.php");} ?>