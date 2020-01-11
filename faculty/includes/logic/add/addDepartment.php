<?php 
extract($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($deptEdit)) {
	$insert=$conn->prepare("INSERT INTO `department` (`srno`, `campus_id`, `dept_name`,`created_by`, `created_at`) VALUES (NULL, :campus, :dept,:userid, :datetime1)");
	$insert->bindParam(":campus",$campus);
	$insert->bindParam(":dept",$deptName);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      header("Location:department.php?success_message=department Inserted Successfully");
	}else{
      header("Location:department.php?error_message=Failed to insert department");
	}
}
 ?>