<?php 
extract($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addCourse)) {
	$insert=$conn->prepare("INSERT INTO `course` (`srno`, `course_name`, `course_code`, `created_by`, `created_at`) VALUES (NULL, :course, :courseCode,:userid,:datetime1)");
	$insert->bindParam(":course",$courseName);
	$insert->bindParam(":courseCode",$courseCode);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      header("Location:courses.php?success_message=Course Inserted Successfully");
	}else{
      header("Location:courses.php?error_message=Failed to insert course");
	}
}
 ?>