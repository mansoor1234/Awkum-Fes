<?php 
extract($_POST);
$dateTime=dateTime();
// print_r($_POST);
$userid=$_SESSION['user']['User'];
if (isset($program) && isset($semester)) {
	$insert=$conn->prepare("INSERT INTO `programs` (`srno`, `program`, `created_by`, `created_at`) VALUES (NULL, :program, :userid, :datetime1)");
	$insert->bindParam(":program",$program);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
	  $get_id=mysqli_query($con,"select * from programs ORDER BY srno DESC LIMIT 1");
      $row=mysqli_fetch_array($get_id);
      $id=$row['srno'];
       for ($i=0; $i < $semester; $i++) { 
	  	$semesterId=$i+1;
	  	$insertRel=$conn->prepare("INSERT INTO `program_semester` (`srno`, `program_id`, `semester_id`) VALUES (NULL,:program,:semester)");
	  	$insertRel->bindParam(":program",$id);
	  	$insertRel->bindParam(":semester",$semesterId);
	  	$insertRel->execute();
	  }
      $_SESSION['success']="Program Inserted Successfully.";
	}else{
      $_SESSION['error']="Failed to insert program.";
	}
}
 ?>