<?php 
include('../../config.php');

extract($_POST);
if (isset($userid) && isset($roleid)) {
$check_record=mysqli_query($con,"select * from rbac_role_access_table where user_id='$userid'");
$count=mysqli_num_rows($check_record);
if ($userid=="empty" || $roleid=="empty") {
	echo "<script>$('#error_message').css('display','flex')</script>";
	exit();
}elseif ($count>0) {
	echo "<script>$('#error_message2').css('display','flex')</script>";
	exit();
}else{
	
	$get_id=mysqli_query($con,"select * from rbac_role_access_table ORDER BY role_acc_id DESC LIMIT 1");
    $row=mysqli_fetch_array($get_id);
    $rowid=$row['role_acc_id']+1;
  
	$insert=$conn->prepare("INSERT INTO `rbac_role_access_table` (`role_acc_id`, `user_id`, `role_id`)
	 VALUES (:id, :userid, :roleid)");
	$insert->bindParam(":id",$rowid);
	$insert->bindParam(":userid",$userid);
	$insert->bindParam(":roleid",$roleid);
	$run=$insert->execute();
	if($run){
    echo "<script>$('#success_message').css('display','flex')</script>";
	}
}
}else {
	echo "<script>$('#error_message').css('display','flex')</script>";
	exit();
}

?>