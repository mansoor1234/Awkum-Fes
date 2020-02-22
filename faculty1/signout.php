<?php 
include("config.php"); 
session_destroy();
$logoutDateTime=dateTime();
$userID=$_SESSION['user']['User'];
$lastLogOut=$conn->prepare("UPDATE `rbac_user` SET `last_logout`=:logout  WHERE `id`=:id");
$lastLogOut->bindParam(":logout",$logoutDateTime);
$lastLogOut->bindParam(":id",$userID);
$lastLogOut->execute();
header("Location:login.php?logout_msg=You have been logged out");
 ?>