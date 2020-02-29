<?php 
include('../../config.php');
if (isset($_POST['userid'])) {
	extract($_POST);
    $lastLogin=$conn->prepare("UPDATE `students` SET `status`=:status  WHERE `srno`=:id");
    $lastLogin->bindParam(":status",$status);
    $lastLogin->bindParam(":id",$userid);
    $lastLogin->execute(); 
}
if (isset($_POST['checkAll'])) {
 extract($_POST);
    $lastLogin=$conn->prepare("UPDATE `students` SET `status`=:status ");
    $lastLogin->bindParam(":status",$checkAll);
    $lastLogin->execute();
}
 ?>