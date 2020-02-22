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
	   $count=count($semestersEdit);
	   $deleteExisting=mysqli_query($con,"DELETE FROM `program_semester` WHERE `program_id`='$progID'");
      for ($i=0; $i < $count; $i++) { 
	  	$semester=$semestersEdit[$i];
	  	$insertRel=$conn->prepare("INSERT INTO `program_semester` (`srno`, `program_id`, `semester_id`) VALUES (NULL,:program,:semester)");
	  	$insertRel->bindParam(":program",$progID);
	  	$insertRel->bindParam(":semester",$semester);
	  	$insertRel->execute();
	  }
      header("Location:program.php?success_message=Program Edited Successfully");
	}else{
	  header("Location:program.php?error_message=Failed to edit program");	
	}
}
 ?>