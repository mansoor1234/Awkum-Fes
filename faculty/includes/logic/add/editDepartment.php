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
      header("Location:department.php?success_message=Department Edited Successfully");
	}else{
	  header("Location:department.php?error_message=Failed to edit department");	
	}
}
 ?>