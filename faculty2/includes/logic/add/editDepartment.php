<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($deptEdit)) {
	$insert=$conn->prepare("UPDATE `department` SET `campus_id`=:campusId,`dept_name`=:deptName,`updated_at`=:datetime2 WHERE `srno`=:dept_id");
	$insert->bindParam(":deptName",$deptName);
	$insert->bindParam(":campusId",$campusId);
	$insert->bindParam(":datetime2",$dateTime);
	$insert->bindParam(":dept_id",$dept_id);
	$run=$insert->execute();
	if($run){
	   $count=count($programsEdit);
	   $deleteExisting=mysqli_query($con,"DELETE FROM `dept_program` WHERE `dept_id`='$dept_id'");
      for ($i=0; $i < $count; $i++) { 
	  	$program=$programsEdit[$i];
	  	$insertRel=$conn->prepare("INSERT INTO `dept_program` (`srno`, `dept_id`, `program_id`) VALUES (NULL, :dept, :prog)");
	  	$insertRel->bindParam(":dept",$dept_id);
	  	$insertRel->bindParam(":prog",$program);
	  	$insertRel->execute();
	  }
      header("Location:department.php?success_message=Department Edited Successfully");
	}else{
	  header("Location:department.php?error_message=Failed to edit department");	
	}
}
 ?>
 