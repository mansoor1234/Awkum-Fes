<?php 
extract($_POST);
// print_r($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addFacilty)) {
	$insert=$conn->prepare("INSERT INTO `faculty`(`srno`, `name`, `campus_id`, `department_id`, `program_id`, `semester_id`, `course_id`, `designation`, `created_by`, `created_at`) 
		VALUES (NULL, :name,:campus,:department,:program,:semester,:course,:designation,:userid,:datetime1)");
	$insert->bindParam(":name",$name);
	$insert->bindParam(":designation",$designation);
	$insert->bindParam(":campus",$campus);
	$insert->bindParam(":program",$program);
	$insert->bindParam(":department",$department);
	$insert->bindParam(":semester",$semester);
	$insert->bindParam(":course",$course);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      header("Location:faculty.php?success_message=Faculty Inserted Successfully");
	}else{
      header("Location:faculty.php?error_message=Failed to insert faculty");
	}
}
 ?>
