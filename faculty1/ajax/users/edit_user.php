<?php 

include('../../config.php');
if (isset($_POST['edit_user_form'])) {
extract($_POST);
 $firstname = preg_replace( "#[^\w]#", "", $firstname ); 
 $lastname = preg_replace( "#[^\w]#", "", $lastname ); 
 $email=strtolower($email);
 if($password!=" "){

if($password!=$confirm_password) {

echo "<script>$('#edit_password_error_message').css('display','block');</script>";
echo " <input  class='btn btn-primary mr-2' type='submit' id='submit_edit_btn' name='user_edit_form' onclick='editUser(this.value)' value='Save Changes'>";
exit();
}else{
   $password=md5($password);
  $update_user=$conn->prepare("UPDATE `rbac_user` SET `firstname`=:first,`lastname`=:last,`about`=:about,`email`=:email,`password`=:password WHERE `id`=:id");
  $update_user->bindParam(":first",$firstname);
  $update_user->bindParam(":last",$lastname);
  $update_user->bindParam(":about",$about);
  $update_user->bindParam(":email",$email);
  $update_user->bindParam(":password",$password);
  $update_user->bindParam(":id",$edit_user_form);
  $run2=$update_user->execute();
if($run2){
 	
 echo "<script>$('.alert-danger').css('display','none');</script>";	
 echo "<script>$('#saved_edit_btn').css('display','flex');</script>";
 echo "<script>$('#edit_success_message').css('display','block');</script>";
}else{

 echo "<script>$('#error_message').css('display','block');</script>";
 echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_edit_btn' name='user_edit_form' onclick='editUser(this.value)' value='Save Changes'>";
}
}

}else{
   $password=md5($password);
  $update_user=$conn->prepare("UPDATE `rbac_user` SET `firstname`=:first,`lastname`=:last,`about`=:about,`email`=:email WHERE `id`=:id");
  $update_user->bindParam(":first",$firstname);
  $update_user->bindParam(":last",$lastname);
  $update_user->bindParam(":about",$about);
  $update_user->bindParam(":email",$email);
  $update_user->bindParam(":id",$edit_user_form);
  $run2=$update_user->execute();
if($run2){
 echo "<script>$('#edit_error_message').css('display','none');</script>";	
 echo "<script>$('#saved_edit_btn').css('display','flex');</script>";
 echo "<script>$('#edit_success_message').css('display','block');</script>";

}else{
	
  echo "<script>$('#edit_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_edit_btn' name='user_edit_form' onclick='editUser(this.value)' value='Save Changes'>";
}
}
}
 ?>