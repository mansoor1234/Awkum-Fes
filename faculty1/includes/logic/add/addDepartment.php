<?php 
extract($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addCampus)) {
	$insert=$conn->prepare("INSERT INTO `department` (`srno`, `campus_id`, `dept_name`,`created_by`, `created_at`) VALUES (NULL, :campus, :dept,:userid, :datetime1)");
	$insert->bindParam(":campus",$campus);
	$insert->bindParam(":dept",$deptName);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":datetime1",$dateTime);
	$run=$insert->execute();
	if($run){
	  $count=count($programs);
	  $get_id=mysqli_query($con,"select * from department ORDER BY srno DESC LIMIT 1");
      $row=mysqli_fetch_array($get_id);
      $id=$row['srno'];
	  for ($i=0; $i < $count; $i++) { 
	  	$program=$programs[$i];
	  	$insertRel=$conn->prepare("INSERT INTO `dept_program` (`srno`, `dept_id`, `program_id`) VALUES (NULL, :dept, :prog)");
	  	$insertRel->bindParam(":dept",$id);
	  	$insertRel->bindParam(":prog",$program);
	  	$insertRel->execute();
	  }
      header("Location:department.php?success_message=Department Inserted Successfully");
	}else{
      header("Location:department.php?error_message=Failed to insert department");
	}
}
 ?>