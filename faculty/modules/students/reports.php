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
            <h1 class="m-0 text-dark">Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Reports</li>
              <li class="breadcrumb-item active">Reports View/Print</li>
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
                 Reports
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
              <h2 class="card-title"><b>Reports</b></h2>
              <a href="<?php echo BASE_URL ;?>modules/students/print.php" class="btn btn-success createBtn float-sm-right">Print Report</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
 <?php 
// print_r($_POST);
if (isset($_POST['report'])) {
  extract($_POST);
  $disagree1=0;
  $stdisagree1=0;
  $agree1=0;
  $stagree1=0;
  $uncertain1=0;
  $weight1=0;

   $disagree2=0;
  $stdisagree2=0;
  $agree2=0;
  $stagree2=0;
  $uncertain2=0;
  $weight2=0;

   $disagree3=0;
  $stdisagree3=0;
  $agree3=0;
  $stagree3=0;
  $uncertain3=0;
  $weight3=0;

   $disagree4=0;
  $stdisagree4=0;
  $agree4=0;
  $stagree4=0;
  $uncertain4=0;
  $weight4=0;

   $disagree5=0;
  $stdisagree5=0;
  $agree5=0;
  $stagree5=0;
  $uncertain5=0;
  $weight5=0;

   $disagree6=0;
  $stdisagree6=0;
  $agree6=0;
  $stagree6=0;
  $uncertain6=0;
  $weight6=0;

   $disagree7=0;
  $stdisagree7=0;
  $agree7=0;
  $stagree7=0;
  $uncertain7=0;
  $weight7=0;

   $disagree8=0;
  $stdisagree8=0;
  $agree8=0;
  $stagree8=0;
  $uncertain8=0;
  $weight8=0;

   $disagree9=0;
  $stdisagree9=0;
  $agree9=0;
  $stagree9=0;
  $uncertain9=0;
  $weight9=0;

   $disagree10=0;
  $stdisagree10=0;
  $agree10=0;
  $stagree10=0;
  $uncertain10=0;
  $weight10=0;

   $disagree11=0;
  $stdisagree11=0;
  $agree11=0;
  $stagree11=0;
  $uncertain11=0;
  $weight11=0;


   $disagree12=0;
  $stdisagree12=0;
  $agree12=0;
  $stagree12=0;
  $uncertain12=0;
  $weight12=0;


   $disagree13=0;
  $stdisagree13=0;
  $agree13=0;
  $stagree13=0;
  $uncertain13=0;
  $weight13=0;



   $disagree15=0;
  $stdisagree15=0;
  $agree15=0;
  $stagree15=0;
  $uncertain15=0;
  $weight15=0;



   $disagree14=0;
  $stdisagree14=0;
  $agree14=0;
  $stagree14=0;
  $uncertain14=0;
  $weight14=0;



   $disagree16=0;
  $stdisagree16=0;
  $agree16=0;
  $stagree16=0;
  $uncertain16=0;
  $weight16=0;
  $_SESSION['semester']=$semester;
  $_SESSION['program']=$program;
  $_SESSION['campus']=$campus;
  $_SESSION['department']=$department;
  $_SESSION['course']=$course;
  $_SESSION['faculty']=$faculty;
  $_SESSION['session']=$session;
  $get_reports=$conn->prepare("SELECT *
   FROM evaluation WHERE semester_id=:semesterID AND campus_id=:campus AND program_id=:program AND department_id=:department AND course_id=:course AND faculty_id=:faculty AND session=:session");
  $get_reports->bindParam(":semesterID",$semester);
  $get_reports->bindParam(":campus",$campus);
  $get_reports->bindParam(":program",$program);
  $get_reports->bindParam(":department",$department);
  $get_reports->bindParam(":course",$course);
  $get_reports->bindParam(":faculty",$faculty);
  $get_reports->bindParam(":session",$session);
  $get_reports->execute();
  $rows=$get_reports->fetchAll(PDO::FETCH_ASSOC);
  $count=$get_reports->rowCount();

  // echo "<pre>";
  // print_r($rows);
  // echo "</pre>";

  $get_total_students=$conn->prepare("SELECT *
   FROM students WHERE semester_id=:semesterID AND campus_id=:campus AND program_id=:program AND department_id=:department ");
  $get_total_students->bindParam(":semesterID",$semester);
  $get_total_students->bindParam(":campus",$campus);
  $get_total_students->bindParam(":program",$program);
  $get_total_students->bindParam(":department",$department);
  $get_total_students->execute();
  $countTotal=$get_total_students->rowCount();

  $query1=mysqli_query($con,"select * from campus where srno=".$_POST['campus']."");
   $row1=mysqli_fetch_array($query1);
   $campus=$row1['campus'];

   $query2=mysqli_query($con,"select * from department where srno=".$_POST['department']."");
   $row2=mysqli_fetch_array($query2);
   $dept_name=$row2['dept_name'];

   $query3=mysqli_query($con,"select * from programs where srno=".$_POST['program']."");
   $row3=mysqli_fetch_array($query3);
   $program=$row3['program'];

   $query4=mysqli_query($con,"select * from semester where srno=".$_POST['semester']."");
   $row4=mysqli_fetch_array($query4);
   $semester=$row4['semester'];

   $query5=mysqli_query($con,"select * from course where srno=".$_POST['course']."");
   $row5=mysqli_fetch_array($query5);
   $course_name=$row5['course_name'];
   $course_code=$row5['course_code'];

   $query6=mysqli_query($con,"select * from faculty where srno=".$_POST['faculty']."");
   $row6=mysqli_fetch_array($query6);
   $name=$row6['name'];
   
   for ($i=0; $i < $count; $i++) { 
      $q1=$rows[$i]['q1'];
      $q2=$rows[$i]['q2'];
      $q3=$rows[$i]['q3'];
      $q4=$rows[$i]['q4'];
      $q4=$rows[$i]['q4'];
      $q5=$rows[$i]['q5'];
      $q6=$rows[$i]['q6'];
      $q7=$rows[$i]['q7'];
      $q8=$rows[$i]['q8'];
      $q9=$rows[$i]['q9'];
      $q10=$rows[$i]['q10'];
      $q11=$rows[$i]['q11'];
      $q12=$rows[$i]['q12'];
      $q13=$rows[$i]['q13'];
      $q14=$rows[$i]['q14'];
      $q15=$rows[$i]['q15'];
      $q16=$rows[$i]['q16'];
      if($q1==1){
        $stdisagree1+=1;
      }elseif($q1==2){
        $disagree1+=1;
      }elseif($q1==3){
        $uncertain1+=1;
      }elseif($q1==4){
        $agree1+=1;
      }elseif($q1==5){
        $stagree1+=1;
      }
      if($q2==1){
        $stdisagree2+=1;
      }elseif($q2==2){
        $disagree2+=1;
      }elseif($q2==3){
        $uncertain2+=1;
      }elseif($q2==4){
        $agree2+=1;
      }elseif($q2==5){
        $stagree2+=1;
      }
      if($q3==1){
        $stdisagree3+=1;
      }elseif($q3==2){
        $disagree3+=1;
      }elseif($q3==3){
        $uncertain3+=1;
      }elseif($q3==4){
        $agree3+=1;
      }elseif($q3==5){
        $stagree3+=1;
      }
      if($q4==1){
        $stdisagree4+=1;
      }elseif($q4==2){
        $disagree4+=1;
      }elseif($q4==3){
        $uncertain4+=1;
      }elseif($q4==4){
        $agree4+=1;
      }elseif($q4==5){
        $stagree4+=1;
      }
      if($q5==1){
        $stdisagree5+=1;
      }elseif($q5==2){
        $disagree5+=1;
      }elseif($q5==3){
        $uncertain5+=1;
      }elseif($q5==4){
        $agree5+=1;
      }elseif($q5==5){
        $stagree5+=1;
      }
      if($q6==1){
        $stdisagree6+=1;
      }elseif($q6==2){
        $disagree6+=1;
      }elseif($q6==3){
        $uncertain6+=1;
      }elseif($q6==4){
        $agree6+=1;
      }elseif($q6==5){
        $stagree6+=1;
      }
      if($q7==1){
        $stdisagree7+=1;
      }elseif($q7==2){
        $disagree7+=1;
      }elseif($q7==3){
        $uncertain7+=1;
      }elseif($q7==4){
        $agree7+=1;
      }elseif($q7==5){
        $stagree7+=1;
      }
      if($q8==1){
        $stdisagree8+=1;
      }elseif($q8==2){
        $disagree8+=1;
      }elseif($q8==3){
        $uncertain8+=1;
      }elseif($q8==4){
        $agree8+=1;
      }elseif($q8==5){
        $stagree8+=1;
      }
      if($q9==1){
        $stdisagree9+=1;
      }elseif($q9==2){
        $disagree9+=1;
      }elseif($q9==3){
        $uncertain9+=1;
      }elseif($q9==4){
        $agree9+=1;
      }elseif($q9==5){
        $stagree9+=1;
      }
      if($q10==1){
        $stdisagree10+=1;
      }elseif($q10==2){
        $disagree10+=1;
      }elseif($q10==3){
        $uncertain10+=1;
      }elseif($q10==4){
        $agree10+=1;
      }elseif($q10==5){
        $stagree10+=1;
      }
      if($q11==1){
        $stdisagree11+=1;
      }elseif($q11==2){
        $disagree11+=1;
      }elseif($q11==3){
        $uncertain11+=1;
      }elseif($q11==4){
        $agree11+=1;
      }elseif($q11==5){
        $stagree11+=1;
      }
      if($q12==1){
        $stdisagree12+=1;
      }elseif($q12==2){
        $disagree12+=1;
      }elseif($q12==3){
        $uncertain12+=1;
      }elseif($q12==4){
        $agree12+=1;
      }elseif($q12==5){
        $stagree12+=1;
      }
      if($q13==1){
        $stdisagree13+=1;
      }elseif($q13==2){
        $disagree13+=1;
      }elseif($q13==3){
        $uncertain13+=1;
      }elseif($q13==4){
        $agree13+=1;
      }elseif($q13==5){
        $stagree13+=1;
      }
      if($q14==1){
        $stdisagree14+=1;
      }elseif($q14==2){
        $disagree14+=1;
      }elseif($q14==3){
        $uncertain14+=1;
      }elseif($q14==4){
        $agree14+=1;
      }elseif($q14==5){
        $stagree14+=1;
      }
      if($q15==1){
        $stdisagree15+=1;
      }elseif($q15==2){
        $disagree15+=1;
      }elseif($q15==3){
        $uncertain15+=1;
      }elseif($q15==4){
        $agree15+=1;
      }elseif($q15==5){
        $stagree15+=1;
      }
      if($q16==1){
        $stdisagree16+=1;
      }elseif($q16==2){
        $disagree16+=1;
      }elseif($q16==3){
        $uncertain16+=1;
      }elseif($q16==4){
        $agree16+=1;
      }elseif($q16==5){
        $stagree16+=1;
      }

 

   } 
   $weight1=round(((($stdisagree1*1)+($disagree1*2)+($uncertain1*3)+($agree1*4)+($stagree1*5)))/$count,2);
    $weight2=round((($stdisagree2*1)+($disagree2*2)+($uncertain2*3)+($agree2*4)+($stagree2*5))/$count,2);
    $weight3=round((($stdisagree3*1)+($disagree3*2)+($uncertain3*3)+($agree3*4)+($stagree3*5))/$count,2);
    $weight4=round((($stdisagree4*1)+($disagree4*2)+($uncertain4*3)+($agree4*4)+($stagree4*5))/$count,2);
    $weight5=round((($stdisagree5*1)+($disagree5*2)+($uncertain5*3)+($agree5*4)+($stagree5*5))/$count,2);
    $weight6=round((($stdisagree6*1)+($disagree6*2)+($uncertain6*3)+($agree6*4)+($stagree6*5))/$count,2);
    $weight7=round((($stdisagree7*1)+($disagree7*2)+($uncertain7*3)+($agree7*4)+($stagree7*5))/$count,2);
    $weight8=round((($stdisagree8*1)+($disagree8*2)+($uncertain8*3)+($agree8*4)+($stagree8*5))/$count,2);
    $weight9=round((($stdisagree9*1)+($disagree9*2)+($uncertain9*3)+($agree9*4)+($stagree9*5))/$count,2);
$weight10=round((($stdisagree10*1)+($disagree10*2)+($uncertain10*3)+($agree10*4)+($stagree10*5))/$count,2);
$weight11=round((($stdisagree11*1)+($disagree11*2)+($uncertain11*3)+($agree11*4)+($stagree11*5))/$count,2);
$weight12=round((($stdisagree12*1)+($disagree12*2)+($uncertain12*3)+($agree12*4)+($stagree12*5))/$count,2);
$weight13=round((($stdisagree13*1)+($disagree13*2)+($uncertain13*3)+($agree13*4)+($stagree13*5))/$count,2);
$weight14=round((($stdisagree14*1)+($disagree14*2)+($uncertain14*3)+($agree14*4)+($stagree14*5))/$count,2);
$weight15=round((($stdisagree15*1)+($disagree15*2)+($uncertain15*3)+($agree15*4)+($stagree15*5))/$count,2);
$weight16=round((($stdisagree16*1)+($disagree16*2)+($uncertain16*3)+($agree16*4)+($stagree16*5))/$count,2);
$totalScore=$weight1+$weight2+$weight3+$weight4+$weight5+$weight6+$weight7+$weight8+$weight9+$weight10+$weight11+$weight12+$weight13+$weight14+$weight15+$weight16;
?>           
              <table  class="w-100" >
                <thead>
                   <tr>
                    <td colspan="4">Campus</td>
                    <td colspan="4"><?php echo $campus; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Department</td>
                    <td colspan="4"><?php echo $dept_name; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Program</td>
                    <td colspan="4"><?php echo $program; ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">Semester</td>
                    <td colspan="4"><?php echo $semester; ?></td>
                  </tr>
                   <tr>
                    <td colspan="4">Teacher</td>
                    <td colspan="4"><?php echo $name; ?></td>
                  </tr>
                   <tr>
                    <td colspan="4">Course Title</td>
                    <td colspan="4"><?php echo $course_name; ?></td>
                  </tr>
                   <tr>
                    <td colspan="4">Course Code</td>
                    <td colspan="4"><?php echo $course_code; ?></td>
                  </tr>
                   <tr>
                    <td colspan="4">Year Of Survey</td>
                    <td colspan="4"><?php echo $session; ?></td>
                  </tr>
                   <tr>
                    <td colspan="4">No Of Students</td>
                    <td colspan="4"><?php echo $countTotal; ?></td>
                  </tr>
                   <tr>
                    <td colspan="4">No Of Respondants</td>
                    <td colspan="4"><?php echo $count; ?></td>
                  </tr>
                <tr>
                  <th>Q.NO</th>
                  <th>Parameters</th>
                  <th>Strongly Disagree</th>
                  <th>Disagree</th>
                  <th>Uncertain</th>
                  <th>Agree</th>
                  <th>Strongly Agree</th>
                  <th>Weighted Average</th>
                </tr>
                </thead>
                <tbody id="list">
                  <tr>
                    <td><b>A</b></td>
                    <td colspan="7" style="color:red"><b>COURSE CONTENTS</b></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td ><h6 class="box-title">The course contents, objectives & outcomes were provided by the concerned teacher.             
                  </h6></td>
                  <td><?php echo $stdisagree1; ?></td>
                  <td><?php echo $disagree1; ?></td>
                  <td><?php echo $uncertain1; ?></td>
                  <td><?php echo $agree1; ?></td>
                  <td><?php echo $stagree1; ?></td>
                  <td><?php echo $weight1; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td ><h6 class="box-title">The teacher provides relevant/useful course meterial (notes, books references, <br> web reference etc).             
                    </h6></td>
                  <td><?php echo $stdisagree2; ?></td>
                  <td><?php echo $disagree2; ?></td>
                  <td><?php echo $uncertain2; ?></td>
                  <td><?php echo $agree2; ?></td>
                  <td><?php echo $stagree2; ?></td>
                  <td><?php echo $weight2; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td ><h6 class="box-title">The teacher explain the course contents and concepts clearly.              
                    </h6></td>
                  <td><?php echo $stdisagree3; ?></td>
                  <td><?php echo $disagree3; ?></td>
                  <td><?php echo $uncertain3; ?></td>
                  <td><?php echo $agree3; ?></td>
                  <td><?php echo $stagree3; ?></td>
                  <td><?php echo $weight3; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td ><h6 class="box-title">The teacher has completed the course.              
                    </h6></td>
                  <td><?php echo $stdisagree4; ?></td>
                  <td><?php echo $disagree4; ?></td>
                  <td><?php echo $uncertain4; ?></td>
                  <td><?php echo $agree4; ?></td>
                  <td><?php echo $stagree4; ?></td>
                 <td><?php echo $weight4; ?></td>
                  </tr>
                  <tr>
                    <td><b>B</b></td>
                    <td colspan="7" style="color:red"><b>COURSE APPLICATION</b></td>
                  </tr>
                  <tr>
                    <td>5</td>
                   <td ><h6 class="box-title">The teacher gives real life examples of the topic/lecture being taught.              
                   </h6></td>
                  <td><?php echo $stdisagree5; ?></td>
                  <td><?php echo $disagree5; ?></td>
                  <td><?php echo $uncertain5; ?></td>
                  <td><?php echo $agree5; ?></td>
                  <td><?php echo $stagree5; ?></td>
                  <td><?php echo $weight5; ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td ><h6 class="box-title">The teacher connects students to local and global resources to gather <br> information about and to solve real world problems.              
                   </h6></td>
                  <td><?php echo $stdisagree6; ?></td>
                  <td><?php echo $disagree6; ?></td>
                  <td><?php echo $uncertain6; ?></td>
                  <td><?php echo $agree6; ?></td>
                  <td><?php echo $stagree6; ?></td>
                  <td><?php echo $weight6; ?></td>
                  </tr>
                  <tr>
                    <td>7</td>
                     <td ><h6 class="box-title">The teacher engages students in learning and applying the critical <br> thinking skills (Assignments, Practicals, Projects, Field Visits,Tasks) used in the course.             
                    </h6></td>
                  <td><?php echo $stdisagree7; ?></td>
                  <td><?php echo $disagree7; ?></td>
                  <td><?php echo $uncertain7; ?></td>
                  <td><?php echo $agree7; ?></td>
                  <td><?php echo $stagree7; ?></td>
                  <td><?php echo $weight7; ?></td>
                  </tr>
                  <tr>
                    <td>8</td>
                     <td ><h6 class="box-title">The teacher engages students in developing communications skills <br> that support learning in the subject area.              
                     </h6></td>
                  <td><?php echo $stdisagree8; ?></td>
                  <td><?php echo $disagree8; ?></td>
                  <td><?php echo $uncertain8; ?></td>
                  <td><?php echo $agree8; ?></td>
                  <td><?php echo $stagree8; ?></td>
                  <td><?php echo $weight8; ?></td>
                  </tr>
                  <tr>
                    <td><b>C</b></td>
                    <td colspan="7" style="color:red"><b>CLASS DESCIPLINE</b></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td ><h6 class="box-title">The teacher encourages the students to ask questions and participate <br> in the class & provide guidance on course meterial.             
                    </h6></td>
                  <td><?php echo $stdisagree9; ?></td>
                  <td><?php echo $disagree9; ?></td>
                  <td><?php echo $uncertain9; ?></td>
                  <td><?php echo $agree9; ?></td>
                  <td><?php echo $stagree9; ?></td>
                  <td><?php echo $weight9; ?></td>
                  </tr>
                  <tr>
                    <td>10</td>
                   <td ><h6 class="box-title">The teacher maintains an environment that helps in learning.             
                   </h6></td>
                  <td><?php echo $stdisagree10; ?></td>
                  <td><?php echo $disagree10; ?></td>
                  <td><?php echo $uncertain10; ?></td>
                  <td><?php echo $agree10; ?></td>
                  <td><?php echo $stagree10; ?></td>
                  <td><?php echo $weight10; ?></td>
                  </tr>
                  <tr>
                    <td>11</td>
                   <td ><h6 class="box-title">The teacher comes & leaves the class on time.              
                   </h6></td>
                  <td><?php echo $stdisagree11; ?></td>
                  <td><?php echo $disagree11; ?></td>
                  <td><?php echo $uncertain11; ?></td>
                  <td><?php echo $agree11; ?></td>
                  <td><?php echo $stagree11; ?></td>
                  <td><?php echo $weight11; ?></td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td ><h6 class="box-title">The teacher has delivered all the lectures as per time table.              
                    </h6></td>
                  <td><?php echo $stdisagree12; ?></td>
                  <td><?php echo $disagree12; ?></td>
                  <td><?php echo $uncertain12; ?></td>
                  <td><?php echo $agree12; ?></td>
                  <td><?php echo $stagree12; ?></td>
                  <td><?php echo $weight12; ?></td>
                  </tr>
                  <tr>
                    <td><b>D</b></td>
                    <td colspan="7" style="color:red"><b>ASSESSMENT</b></td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td ><h6 class="box-title">The teacher is fair in examination.              
                    </h6></td>
                  <td><?php echo $stdisagree13; ?></td>
                  <td><?php echo $disagree13; ?></td>
                  <td><?php echo $uncertain13; ?></td>
                  <td><?php echo $agree13; ?></td>
                  <td><?php echo $stagree13; ?></td>
                  <td><?php echo $weight13; ?></td>
                  </tr>
                  <tr>
                    <td>14</td>
                     <td ><h6 class="box-title">The teacher returns / marked scripts(papers, assignments, tests, quizzes, mid-term <br>and final-term result etc) within 15 days after the exam being done.              
                   </h6></td>
                  <td><?php echo $stdisagree14; ?></td>
                  <td><?php echo $disagree14; ?></td>
                  <td><?php echo $uncertain14; ?></td>
                  <td><?php echo $agree14; ?></td>
                  <td><?php echo $stagree14; ?></td>
                  <td><?php echo $weight14; ?></td>
                  </tr>
                  <tr>
                    <td>15</td>
                     <td ><h6 class="box-title">The teacher gives good feedback on assignments, projects, tests, <br>quizzes, and presentations etc, so the student can improve.             
                     </h6></td>
                  <td><?php echo $stdisagree15; ?></td>
                  <td><?php echo $disagree15; ?></td>
                  <td><?php echo $uncertain15; ?></td>
                  <td><?php echo $agree15; ?></td>
                  <td><?php echo $stagree15; ?></td>
                  <td><?php echo $weight15; ?></td>
                  </tr>
                 <tr>
                  <td>16</td>
                    <td ><h6 class="box-title">The teacher is available during the specified office hours and <br>for discussions after the class.              
                    </h6></td>
                  <td><?php echo $stdisagree16; ?></td>
                  <td><?php echo $disagree16; ?></td>
                  <td><?php echo $uncertain16; ?></td>
                  <td><?php echo $agree16; ?></td>
                  <td><?php echo $stagree16; ?></td>
                  <td><?php echo $weight16; ?></td>
                 </tr>
                 <tr>
                   <td></td>
                   <td colspan="6"><center><b>Score</b></center></td>
                   <td><b><?php echo $totalScore; ?></b></td>
                 </tr>
                  <tr>
                   <td></td>
                   <td colspan="6"><center><b>Percentage</b></center></td>
                   <td><b>50</b></td>
                 </tr>
               </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Q.NO</th>
                  <th>Parameters</th>
                  <th>Strongly Disagree</th>
                  <th>Disagree</th>
                  <th>Uncertain</th>
                  <th>Agree</th>
                  <th>Strongly Agree</th>
                  <th>Weighted Average</th>
                </tr>
                </tfoot> -->
              </table>
              <a href="<?php echo BASE_URL ;?>modules/students/print.php" class="btn btn-success createBtn float-sm-right">Print Report</a>
            <?php } ?>

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
                    <h4 class="modal-title">Reports </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="POST" id="reports">
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
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                          <div class="form-group">
                          <select  class="form-control createBtn  " name="course" id="course" onchange="getFaculty(this.value)">
                             <option value="0">Choose Course</option>
                           </select>
                        </div>
                        </div>
                    </div>
                      <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                           <select  class="form-control createBtn " name="faculty" id="faculty" >
                                <option value="0">Choose Faculty</option>
                           </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2 offset-3">
                        <div class="form-group">
                          <div class="form-group">
                          <select  class="form-control createBtn  " name="session" id="session" >
                             <option value="0">Choose Session</option>
                             <option value="2020/2021">2020/2021</option>
                           </select>
                        </div>
                        </div>
                    </div>
                  </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="report" value="report">
                    <input type="submit" class="btn btn-primary" name="reports" onclick="validateReports()" value="Search">
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
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Faculty</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" id="editFacultyForm">
                   <div id="modal_content"></div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                         <input  class="btn btn-primary mr-2" type="submit"  name="facultyEdit" onclick="validateEditFaculty()"  value="Save Changes" >
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
function getFaculty(course){
var program=$("#program").val();
 var campus=$("#campus").val();
 var department=$("#department").val();
 var semesterID=$("#semester").val();
 $.ajax(
  {
   url:"../../ajax/add/faculty.php",
   method:"post",
   data:{semesterID:semesterID,program:program,campus:campus,department:department,courseID:course,getFaculty:'faculty'},
   success:function(result){
    alert(result);
   $('#faculty')
    .empty()
    .append(result)
 } 
 });
 }
 function validateReports(){
var campus=$("#campus").val(); 
var department=$("#department").val(); 
var program=$("#program").val(); 
var semester=$("#semester").val(); 
var course=$("#course").val(); 
var faculty=$("#faculty").val(); 
var session=$("#session").val(); 
if(campus=="0" || department=="0" || program=="0" || semester=="0" || course=="0" || session=="0" || faculty=="0"){
   $("form").submit(function(e) {
    e.preventDefault();
   });
   if(campus=="0"){$("#campus").css("border","1px solid red");}else{$("#campus").css("border","1px solid green");}
   if(faculty=="0"){$("#faculty").css("border","1px solid red");}else{$("#faculty").css("border","1px solid green");}
   if(session=="0"){$("#session").css("border","1px solid red");}else{$("#session").css("border","1px solid green");}
   if(department=="0"){$("#department").css("border","1px solid red");}else{$("#department").css("border","1px solid green");}
   if(program=="0"){$("#program").css("border","1px solid red");}else{$("#program").css("border","1px solid green");}
   if(semester=="0"){$("#semester").css("border","1px solid red");}else{$("#semester").css("border","1px solid green");}
   if(course=="0"){$("#course").css("border","1px solid red");}else{$("#course").css("border","1px solid green");}
 }else{
  $('form').on('submit',function(event){
  event.preventDefault();
  event.currentTarget.submit();
});
 }
}
</script>
</body>
</html>
<?php include('../../rbac.php'); ?>