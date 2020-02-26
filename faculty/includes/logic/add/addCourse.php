<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addCourse)) {
	$insert=$conn->prepare("INSERT INTO `course` (`srno`, `course_name`, `course_code`, `campus_id`, `department_id`, `program_id`, `semester_id`, `created_by`, `created_at`) VALUES (NULL, :course, :courseCode,:campus,:department,:program,:semester,:userid,:datetime1)");
	$insert->bindParam(":course",$courseName);
	$insert->bindParam(":courseCode",$courseCode);
	$insert->bindParam(":campus",$campus);
	$insert->bindParam(":program",$program);
	$insert->bindParam(":department",$department);
	$insert->bindParam(":semester",$semester);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      $_SESSION['success']="Course Inserted Successfully.";
	}else{
      $_SESSION['error']="Failed to add course.";
	}
}
 ?>
