<?php 
extract($_POST);
// print_r($_POST);
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($semester)) {
	$insert=$conn->prepare("INSERT INTO `semester` (`srno`, `semester`, `created_by`, `created_at`) VALUES (NULL, :semester, :userid, :datetime1)");
	$insert->bindParam(":semester",$semester);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
      header("Location:semesters.php?success_message=Semester Inserted Successfully");
	}else{
      header("Location:semesters.php?error_message=Failed to insert semester");
	}
}
 ?>