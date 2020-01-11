<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($prog_edit)) {
	$insert=$conn->prepare("UPDATE `programs` SET `program`=:programName,`updated_at`=:datetime2 WHERE `srno`=:progID");
	$insert->bindParam(":programName",$programName);
	$insert->bindParam(":datetime2",$dateTime);
	$insert->bindParam(":progID",$progID);
	$run=$insert->execute();
	if($run){
      header("Location:program.php?success_message=Program Edited Successfully");
	}else{
	  header("Location:program.php?error_message=Failed to edit program");	
	}
}
 ?>