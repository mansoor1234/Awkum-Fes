<?php 
extract($_POST);
// print_r($_POST);
if (isset($deleteFaculty) ) {
	$insert=$conn->prepare("DELETE FROM `faculty` WHERE srno=:srno");
	$insert->bindParam(":srno",$deleteFaculty);
	$run=$insert->execute();
	if($run){
      $_SESSION['success']="Faculty deleted Successfully.";
	}else{
      $_SESSION['error']="Failed to delete faculty.";
	}
}
if (isset($deleteCampus) ) {
	$insert=$conn->prepare("DELETE FROM `campus` WHERE srno=:srno");
	$insert->bindParam(":srno",$deleteCampus);
	$run=$insert->execute();
	if($run){
      $_SESSION['success']="Campus deleted Successfully.";
	}else{
      $_SESSION['error']="Failed to delete campus.";
	}
}if (isset($deleteDept) ) {
	$insert=$conn->prepare("DELETE FROM `department` WHERE srno=:srno");
	$insert->bindParam(":srno",$deleteDept);
	$run=$insert->execute();
	if($run){
	  $insert=$conn->prepare("DELETE FROM `dept_program` WHERE dept_id=:dept_id");
	  $insert->bindParam(":dept_id",$deleteDept);
	  $run=$insert->execute();
      $_SESSION['success']="Department deleted Successfully.";
	}else{
      $_SESSION['error']="Failed to delete department.";
	}
}if (isset($deleteProgram) ) {
	$insert=$conn->prepare("DELETE FROM `programs` WHERE srno=:srno");
	$insert->bindParam(":srno",$deleteProgram);
	$run=$insert->execute();
	if($run){
	  $insert=$conn->prepare("DELETE FROM `program_semester` WHERE program_id=:program_id");
	  $insert->bindParam(":program_id",$deleteProgram);
	  $run=$insert->execute();
      $_SESSION['success']="Program deleted Successfully.";
	}else{
      $_SESSION['error']="Failed to delete program.";
	}
}if (isset($deleteCourse) ) {
	$insert=$conn->prepare("DELETE FROM `course` WHERE srno=:srno");
	$insert->bindParam(":srno",$deleteCourse);
	$run=$insert->execute();
	if($run){
	$_SESSION['success']="Course deleted Successfully.";
	}else{
      $_SESSION['error']="Failed to delete course.";
	}
}if (isset($deleteSemester) ) {
	$insert=$conn->prepare("DELETE FROM `semester` WHERE srno=:srno");
	$insert->bindParam(":srno",$deleteSemester);
	$run=$insert->execute();
	if($run){
	$_SESSION['success']="Semester deleted Successfully.";
	}else{
      $_SESSION['error']="Failed to delete semester.";
	}
}
 ?>
