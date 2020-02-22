<?php 
extract($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$dateTime=dateTime();
if (isset($courseEdit2)) {
	$update=$conn->prepare("UPDATE `course` SET `course_name`=:course,`course_code`=:courseCode,`campus_id`=:campus,`department_id`=:department,`program_id`=:program,`semester_id`=:semester,`updated_at`=:datetime1 WHERE `srno`=:id");
	$update->bindParam(":course",$courseName);
	$update->bindParam(":courseCode",$courseCode);
	$update->bindParam(":campus",$campus);
	$update->bindParam(":program",$program);
	$update->bindParam(":department",$department);
	$update->bindParam(":semester",$semester);
	$update->bindParam(":datetime1",$dateTime);
	$update->bindParam(":id",$courseEdit2);
	$run=$update->execute();
	if($run){
      header("Location:courses.php?success_message=Course Edited Successfully");
	}else{
	  header("Location:courses.php?error_message=Failed to edit course");	
	}
}
 ?>