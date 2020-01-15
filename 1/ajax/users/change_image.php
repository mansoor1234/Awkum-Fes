<?php 
include('../../config.php');
if (isset($_POST['user_id'])) {
 $user_id=$_POST['user_id'];
 echo  "<input type='hidden' name='imageUserId' value='$user_id'>";
}
if (isset($_POST['imageUserId'])) {
	$imageUserId=$_POST['imageUserId'];
    $imagename=$_FILES['imageFile']['name'];
	$image_tmp=$_FILES['imageFile']['tmp_name'];
	$rand=rand(0,99999999);
	$imagename=$rand.trim($imagename);
	$path="../../assets/img/users/".$imagename;
	move_uploaded_file($image_tmp,$path);
	$deletePreviousImage=$conn->prepare("select * from  `rbac_user` where id=:id");
	$deletePreviousImage->bindParam(":id",$imageUserId);
	$deletePreviousImage->execute();
	$fetch=$deletePreviousImage->fetchAll(PDO::FETCH_ASSOC);
	$oldImageName=$fetch[0]['image'];
    unlink("../../assets/img/users/".$oldImageName);
	$update=$conn->prepare("UPDATE `rbac_user` SET  `image`=:image WHERE `id`=:id");
	$update->bindParam(":image",$imagename);
	$update->bindParam(":id",$imageUserId);
	$run=$update->execute();
	if($run){

	 echo "<script>$('#target3').css('color','green');</script>";	
     echo "Image has been updated!";

	}
}


 ?>
