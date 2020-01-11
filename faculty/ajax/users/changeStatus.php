<?php 
include('../../config.php');
if (isset($_POST['userid'])) {
	extract($_POST);
    $lastLogin=$conn->prepare("UPDATE `rbac_user` SET `status`=:status  WHERE `id`=:id");
    $lastLogin->bindParam(":status",$status);
    $lastLogin->bindParam(":id",$userid);
    $lastLogin->execute(); 
}
 ?>