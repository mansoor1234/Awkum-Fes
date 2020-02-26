<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($semID)) {
	$insert=$conn->prepare("UPDATE `semester` SET `semester`=:semesterName,`updated_at`=:datetime2 WHERE `srno`=:semID");
	$insert->bindParam(":semesterName",$semesterName);
	$insert->bindParam(":datetime2",$dateTime);
	$insert->bindParam(":semID",$semID);
	$run=$insert->execute();
	if($run){
      $_SESSION['success']="Semester Edited Successfully.";
	}else{	
	  $_SESSION['error']="Failed to edit semester.";
	}
}
 ?>