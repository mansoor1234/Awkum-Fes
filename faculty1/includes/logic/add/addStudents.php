<?php 
extract($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$dateTime=dateTime();
$userid=$_SESSION['user']['User'];
if (isset($addStdnt)) {
	if($pass==$cpass && !empty($pass)){
    $password=md5($pass);
	$insert=$conn->prepare("INSERT INTO `students` (`srno`, `campus_id`, `program_id`, `department_id`, `semester_id`, `reg_no`, `name`, `f_name`, `email`,`password`, `contact`, `address`, `created_by`, `created_at`) VALUES (NULL, :campus, :program, :department, :semester, :regNo, :name, :fname, :email,:pass,:contact, :address,:create, :created)");
	$insert->bindParam(":campus",$campus);
	$insert->bindParam(":program",$program);
	$insert->bindParam(":department",$department);
	$insert->bindParam(":semester",$semester);
	$insert->bindParam(":regNo",$regNo);
	$insert->bindParam(":name",$name);
	$insert->bindParam(":fname",$fName);
	$insert->bindParam(":email",$email);
	$insert->bindParam(":pass",$password);
	$insert->bindParam(":contact",$contact);
	$insert->bindParam(":address",$address);
	$insert->bindParam(":create",$userid);
	$insert->bindParam(":created",$dateTime);
	$run=$insert->execute();
	if($run){
	 header("Location:students.php?success_message=Student Inserted Successfully");
	}else{
      header("Location:students.php?error_message=Failed to insert student");
	}
}else{
	header("Location:students.php?error_message=Password does not match.");
}
}
 ?>