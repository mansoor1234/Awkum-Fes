<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addCampus)) {
	$insert=$conn->prepare("INSERT INTO `campus` (`srno`, `campus`, `city`, `address`,`created_by`, `created_at`) VALUES (NULL, :campus, :city,:address,:userid,:datetime1)");
	$insert->bindParam(":campus",$campusName);
	$insert->bindParam(":city",$city);
	$insert->bindParam(":address",$address);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      header("Location:campus.php?success_message=Campus Inserted Successfully");
	}else{
	  header("Location:campus.php?error_message=Failed to add campus");
	}
}
 ?>