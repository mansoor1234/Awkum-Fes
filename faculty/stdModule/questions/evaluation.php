
<?php include('../../config.php');?>
<?php 
// print_r($_POST);
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
 $insert->bindParam(":course",$code);
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
 $_SESSION['success2']="Success";
 }else{
 $_SESSION['error2']="Failed"; 
 }
}
?>
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
              <li class="breadcrumb-item active"><a href="<?php echo BASE_URL; ?>index2.php">Logout</a></li>
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
      $faculty=mysqli_query($con,"select * from faculty where campus_id='$campid' and department_id='$did' and program_id='$progid' and semester_id='$sid' order by faculty.srno ASC LIMIT 1");
      $rows2=mysqli_fetch_array($faculty);
      $course=mysqli_query($con,"select * from course where srno='".$rows2['course_id']."' ");
      $rows3=mysqli_fetch_array($course);

     ?>
   <!-- Main content -->
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
                                    <form method="POST" id="addRoleForm" >
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="1">Teacher Name</th>
                                                <td colspan="4"><input type="text" name="name" class="form-control " id="name" placeholder="Name" required="" value="<?php echo $rows2['name']; ?>" readonly><input type="hidden" name="facultyID" value="<?php echo $rows2['srno']; ?>"></td>
                                           </tr>
                                           <tr>
                                                <th colspan="1">Designation</th>
                                                <td colspan="4"><input  type="text" name="regNo" class="form-control " id="regNo" placeholder="Registration Number" required="" value="<?php echo $rows2['designation']; ?>" readonly></td>
                                           </tr>
                                            <tr>
                                                <th colspan="1">Course Name</th>
                                                <td colspan="4"><input  type="text" name="course" class="form-control " id="course" placeholder="Course Name" required="" value="<?php echo $rows3['course_name']; ?>" readonly></td>
                                           </tr>
                                            <tr>
                                                <th colspan="1">Course Code</th>
                                                <td colspan="4"><input  type="text" name="code" class="form-control " id="code" placeholder="Course Code" required="" value="<?php echo $rows3['course_code']; ?>" readonly></td>
                                           </tr>
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
                                                       <input type="radio" name="q1" id="radioSuccess1" value="1">
                                                       <label for="radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q1" id="radioSuccess2" value="2">
                                                       <label for="radioSuccess2">
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q1" id="radioSuccess3" value="3">
                                                       <label for="radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q1" id="radioSuccess4" value="4">
                                                       <label for="radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q1" id="321radioSuccess5" value="5">
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
                                                       <input type="radio" name="q2" id="radioSuccess5" value="1">
                                                       <label for="radioSuccess5">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q2" id="radioSuccess6" value="2">
                                                       <label for="radioSuccess6">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q2" id="radioSuccess7" value="3">
                                                       <label for="radioSuccess7">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q2" id="radioSuccess8" value="4">
                                                       <label for="radioSuccess8">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q2" id="radioSuccess9" value="5">
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
                                                       <input type="radio" name="q3" id="radioSuccess11" value="1">
                                                       <label for="radioSuccess11">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q3" id="radioSuccess22" value="2">
                                                       <label for="radioSuccess22">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q3" id="radioSuccess33" value="3">
                                                       <label for="radioSuccess33">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q3" id="radioSuccess44" value="4">
                                                       <label for="radioSuccess44">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q3" id="radioSuccess55" value="5">
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
                                                       <input type="radio" name="q4" id="radioSuccess16" value="1">
                                                       <label for="radioSuccess16">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q4" id="radioSuccess27" value="2">
                                                       <label for="radioSuccess27">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q4" id="radioSuccess38" value="3">
                                                       <label for="radioSuccess38">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q4" id="radioSuccess49" value="4">
                                                       <label for="radioSuccess49">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q4" id="radioSuccess511" value="5">
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
                                                       <input type="radio" name="q5" id="radioSuccess122" value="1">
                                                       <label for="radioSuccess122">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q5" id="radioSuccess233" value="2">
                                                       <label for="radioSuccess233">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q5" id="radioSuccess344" value="3">
                                                       <label for="radioSuccess344">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q5" id="radioSuccess455" value="4">
                                                       <label for="radioSuccess455">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q5" id="radioSuccess566" value="5">
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
                                                       <input type="radio" name="q6" id="radioSuccess177" value="1">
                                                       <label for="radioSuccess177">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q6" id="radioSuccess288" value="2">
                                                       <label for="radioSuccess288">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q6" id="radioSuccess399" value="3">
                                                       <label for="radioSuccess399">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q6" id="radioSuccess4111" value="4">
                                                       <label for="radioSuccess4111">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q6" id="radioSuccess5222" value="5">
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
                                                       <input type="radio" name="q7" id="radioSuccess1333" value="1">
                                                       <label for="radioSuccess1333">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q7" id="radioSuccess2444" value="2">
                                                       <label for="radioSuccess2444">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q7" id="radioSuccess3555" value="3">
                                                       <label for="radioSuccess3555">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q7" id="radioSuccess4666" value="4">
                                                       <label for="radioSuccess4666">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q7" id="radioSuccess5777" value="5">
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
                                                       <input type="radio" name="q8" id="radioSuccess1888" value="1">
                                                       <label for="radioSuccess1888">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q8" id="radioSuccess2888" value="2">
                                                       <label for="radioSuccess2888">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q8" id="radioSuccess3999" value="3">
                                                       <label for="radioSuccess3999">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q8" id="radioSuccess41111" value="4">
                                                       <label for="radioSuccess41111">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q8" id="radioSuccess511112" value="5">
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
                                                       <input type="radio" name="q9" id="radioSuccess12222" value="1">
                                                       <label for="radioSuccess12222">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q9" id="radioSuccess23333" value="2">
                                                       <label for="radioSuccess23333">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q9" id="radioSuccess34444" value="3">
                                                       <label for="radioSuccess34444">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q9" id="radioSuccess45555" value="4">
                                                       <label for="radioSuccess45555">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q9" id="radioSuccess56666" value="5">
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
                                                       <input type="radio" name="q10" id="1radioSuccess121" value="1">
                                                       <label for="1radioSuccess121">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q10" id="2radioSuccess2" value="2">
                                                       <label for="2radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q10" id="3radioSuccess3" value="3">
                                                       <label for="3radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q10" id="4radioSuccess4" value="4">
                                                       <label for="4radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q10" id="5radioSuccess5" value="5">
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
                                                       <input type="radio" name="q11" id="6radioSuccess1" value="1">
                                                       <label for="6radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q11" id="7radioSuccess2" value="2">
                                                       <label for="7radioSuccess2">
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q11" id="8radioSuccess3" value="3">
                                                       <label for="8radioSuccess3">
                                                        Uncertain
                                                        
                                                        
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q11" id="9radioSuccess4" value="4">
                                                       <label for="9radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q11" id="10radioSuccess5" value="5">
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
                                                       <input type="radio" name="q12" id="11radioSuccess1" value="1">
                                                       <label for="11radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q12" id="12radioSuccess2" value="2">
                                                       <label for="12radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q12" id="13radioSuccess3" value="3">
                                                       <label for="13radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q12" id="14radioSuccess4" value="4">
                                                       <label for="14radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q12" id="15radioSuccess5" value="5">
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
                                                       <input type="radio" name="q13" id="16radioSuccess1" value="1">
                                                       <label for="16radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q13" id="17radioSuccess2" value="2">
                                                       <label for="17radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q13" id="18radioSuccess3" value="3">
                                                       <label for="18radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q13" id="19radioSuccess4" value="4">
                                                       <label for="19radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q13" id="110radioSuccess5" value="5">
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
                                                       <input type="radio" name="q14" id="111radioSuccess1" value="1">
                                                       <label for="111radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q14" id="112radioSuccess2" value="2">
                                                       <label for="112radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q14" id="113radioSuccess3" value="3">
                                                       <label for="113radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q14" id="114radioSuccess4" value="4">
                                                       <label for="114radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q14" id="115radioSuccess5" value="5">
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
                                                       <input type="radio" name="q15" id="116radioSuccess1" value="1">
                                                       <label for="116radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q15" id="117radioSuccess2" value="2">
                                                       <label for="117radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q15" id="118radioSuccess3" value="3">
                                                       <label for="118radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q15" id="119radioSuccess4" value="4">
                                                       <label for="119radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q15" id="220radioSuccess5" value="5">
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
                                                       <input type="radio" name="q16" id="221radioSuccess1" value="1">
                                                       <label for="221radioSuccess1">
                                                        Strongly Disagree
                                                       </label>
                                                  </div></td>
                                                </td>
                                                 <td><div class="icheck-success d-inline">
                                                      <input type="radio" name="q16" id="222radioSuccess2" value="2">
                                                       <label for="222radioSuccess2">
                                                        
                                                        Disagree
                                                       </label>
                                                  </div></td>
                                                  
                                                 <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q16" id="223radioSuccess3" value="3">
                                                       <label for="223radioSuccess3">
                                                        Uncertain
                                                       </label>
                                                  </div></td>

                                                  <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q16" id="224radioSuccess4" value="4">
                                                       <label for="224radioSuccess4">
                                                        Agree
                                                       </label>
                                                  </div></td>

                                                   <td><div class="icheck-success d-inline">
                                                       <input type="radio" name="q16" id="225radioSuccess5" value="5">
                                                       <label for="225radioSuccess5">
                                                        Strongly Agree
                                                       </label>
                                                  </div></td>
                                               </tr>

                                        </tbody>
                                        </thead>
                                    </table>
                                   <input type="submit" name="submitForm" id="submit" class="form-control btn btn-success">
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
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>
</body>
</html>
<?php include('../../rbac.php'); ?>
<?php $page_name2=basename($_SERVER['PHP_SELF']); ?>
 <?php canAccess(); ?>
 <?php canCreate($page_name2); ?>  
 <?php canEdit($page_name2); ?>
 <?php canDelete($page_name2); ?>
