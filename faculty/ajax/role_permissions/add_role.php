<?php 
include('../../config.php');

if (isset($_POST['AddRoleBtn'])) {
extract($_POST);

$roleStatus=1;
$dateTime=date("Y-m-d H:m:s");
$createdBy=0;
$get_id=mysqli_query($con,"select * from rbac_role ORDER BY role_id DESC LIMIT 1");
$row=mysqli_fetch_array($get_id);
$id=$row['role_id']+1;
$insertRole=$conn->prepare("INSERT INTO `rbac_role` (`role_id`, `role_name`, `role_description`, `created_by`, `date_time`, `role_status`) VALUES (:id,:roleName,:roleDesc,:createdBy,:dateTime1,:roleStatus)");
$insertRole->bindParam(":id",$id);
$insertRole->bindParam(":roleName",$roleName);
$insertRole->bindParam(":roleDesc",$roleDesc);
$insertRole->bindParam(":createdBy",$createdBy);
$insertRole->bindParam(":dateTime1",$dateTime);
$insertRole->bindParam(":roleStatus",$roleStatus);
$run=$insertRole->execute();
if($run){

Function fetchFields($name,$menu_id){
extract($_POST);
global $conn;
global $con;
$get_perm_id=mysqli_query($con,"select * from rbac_permissions ORDER BY perm_id DESC LIMIT 1");
$row2=mysqli_fetch_array($get_perm_id);
$perm_id=$row2['perm_id']+1;


$get_role_id=mysqli_query($con,"select * from rbac_role ORDER BY role_id DESC LIMIT 1");
$row=mysqli_fetch_array($get_role_id);
$role_id1=$row['role_id'];

$create=$name."create";
$read=$name."read";
$edit=$name."edit";
$delete=$name."delete";
$datetime1=dateTime();
$create_by='1';

if(isset($$create)){  $newcreate=$$create[0];} else{ $newcreate=0;  }
if(isset($$read)){  $newread=$$read[0];} else{ $newread=0;  }
if(isset($$edit)){  $newedit=$$edit[0];} else{ $newedit=0;  }
if(isset($$delete)){  $newdelete=$$delete[0];} else{ $newdelete=0;  }

$insert=$conn->prepare("INSERT INTO `rbac_permissions` (`perm_id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `create_by`, `create_date`) VALUES (:id,:role_id ,:menu_id ,:read ,:create , :edit, :delete1,:create_by ,:datetime1 )");
$insert->bindParam(":id",$perm_id);
$insert->bindParam(":role_id",$role_id1);
$insert->bindParam(":menu_id",$menu_id);
$insert->bindParam(":read",$newread);
$insert->bindParam(":create",$newcreate);
$insert->bindParam(":edit",$newedit);
$insert->bindParam(":delete1",$newdelete);
$insert->bindParam(":create_by",$create_by);
$insert->bindParam(":datetime1",$datetime1);
$run=$insert->execute();
if($run){return true;}
}

if(!empty($users) || empty($users)){
$result=fetchFields('user',1);
}
if(!empty($permSetup) || empty($permSetup)){
$result=fetchFields('permissionsetup',2);
}
if(!empty($addRole) || empty($addRole)){
$result=fetchFields('addrole',3);
}
if(!empty($userRole) || empty($userRole)){
$result=fetchFields('userrole',4);
}
}
if($result){
echo "true";
}
}
 ?>
