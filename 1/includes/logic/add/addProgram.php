<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addProgram)) {
	$insert=$conn->prepare("INSERT INTO `programs` (`srno`, `program`, `created_by`, `created_at`) VALUES (NULL, :program, :userid, :datetime1)");
	$insert->bindParam(":program",$program);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      header("Location:program.php?success_message=Program Inserted Successfully");
	}else{
      header("Location:program.php?error_message=Failed to insert program");
	}
}
 ?>