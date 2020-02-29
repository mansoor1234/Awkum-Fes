<?php 
extract($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$dateTime=dateTime();
if (isset($facultyEdit2)) {
	$update=$conn->prepare("UPDATE `faculty` SET 
		`name`=:name,
		`campus_id`=:campus,
		`department_id`=:department,
		`program_id`=:program,
		`semester_id`=:semester,
		`course_id`=:course,
		`designation`=:designation,
		updated_at=:datetime1 
		WHERE  `srno`=:id");
	$update->bindParam(":name",$name);
	$update->bindParam(":designation",$designationEdit);
	$update->bindParam(":campus",$campus);
	$update->bindParam(":program",$program);
	$update->bindParam(":department",$departmentEdit);
	$update->bindParam(":semester",$semester);
	$update->bindParam(":course",$course);
	$update->bindParam(":id",$facultyEdit2);
	$update->bindParam(":datetime1",$dateTime);
	$run=$update->execute();
	if($run){
      $_SESSION['success']="Faculty edited Successfully.";
	}else{
      $_SESSION['error']="Failed to edit faculty.";
	}
}
 ?>