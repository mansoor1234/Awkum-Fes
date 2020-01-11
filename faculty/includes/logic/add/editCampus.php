<?php 
extract($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$dateTime=dateTime();
if (isset($campusEdit)) {
	$insert=$conn->prepare("UPDATE `campus` SET `campus`=:campus,`city`=:city,`address`=:address,`updated_at`=:datetime2 WHERE `srno`=:campus_id");
	$insert->bindParam(":campus",$campusName);
	$insert->bindParam(":city",$city);
	$insert->bindParam(":address",$address);
	$insert->bindParam(":datetime2",$dateTime);
	$insert->bindParam(":campus_id",$campus_id);
	$run=$insert->execute();
	if($run){
      header("Location:campus.php?success_message=Campus Edited Successfully");
	}else{
	  header("Location:campus.php?error_message=Failed to edit campus");	
	}
}
 ?>