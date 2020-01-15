<?php 
include('../../config.php');

if (isset($_POST['user_id'])) {
  $user_id=$_POST['user_id'];
  $get_userid=$conn->prepare("select * from `rbac_user` where id=:id");
  $get_userid->bindParam(":id",$user_id);
  $get_userid->execute();
  $rows=$get_userid->fetch(PDO::FETCH_ASSOC);




 ?>                   

                                 <div class="row">
                                  <div class="col-lg-12">
                                    <div >
                            	      <center>
                                            <div id="error_messages_area">
                                            <div class="alert alert-success has-icon" role="alert" id="edit_success_message" style="display: none;"><i class="fa fa-check-circle alert-icon"></i> User has been edited successfully.</div>
                                            <div class="alert alert-danger has-icon" role="alert" id="edit_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, Failed to edit user.</div>
                                            <div class="alert alert-danger has-icon" role="alert" id="edit_password_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Your password doesn't match</div>
                                            <div class="alert alert-danger has-icon" role="alert" id="password_field_empty_error" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Please fill the required fields</div>
                                            <div class="alert alert-danger has-icon" role="alert" id="email_already_taken" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Email already taken</div>
                                            <div class="alert alert-danger has-icon" role="alert" id="username_already_taken" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Username already taken</div>
                                         </center>
                                      </div>
                                <div class="card card-fullheight">
                                    <div class="card-body">
                                        <h5 class="box-title text-primary"></h5>
                                        
                                          <div class="row">
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" placeholder="First Name" name="firstname" value="<?php echo $rows['firstname'];?>" required>
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" placeholder="Username" name="lastname" value="<?php echo $rows['lastname'];?>" readonly>
                                                </div>
                                            </div>
                                           </div>
                                            </div>
                                            <div class="row">
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-text"></i></div><input class="form-control" type="text" name="about" value="<?php echo $rows['about'];?>" placeholder="About">
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-email"></i></div><input class="form-control" type="email" name="email" id="edit_user_email" required onkeyup="validateEditEmail(this.value)" placeholder="Email Address" value="<?php echo $rows['email'];?>" readonly>
                                                </div>
                                            </div>
                                           </div>
                                            </div>
                                         <div class="row" id="edit_password_field" style="display: none;">
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                               <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-key"></i></div><input class="form-control" type="password" id="user_edit_password" name="password" required placeholder="Password">
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-key"></i></div><input class="form-control" type="password" id="user_edit_confirm_password" name="confirm_password" required onkeyup="editConfirmPassword(this.value)" placeholder="Confirm Password" > 
                                                </div>
                                            </div>
                                            <input type="hidden" name="edit_user_form" value="<?php echo $user_id;?>">
                                           </div>
                                          </div>
                                          <a href="#" class="btn btn-primary btn-sm" onclick="showPasswordField()" id="change_pass_btn">Change Password</a>
                                           <div style="height: 10px;">
                                             <div>
                                               <small id="password_edit_match_error_message" style="display: none;color:red">* Password doesn't match</small>
                                             </div>
                                             <div>
                                                <small id="invalid_edit_email_error_message" style="display: none;color:red">* Invalid email address</small>
                                              </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                   
<?php

}
extract($_POST);
if(isset($addUserInfo)){

$get_id=mysqli_query($con,"select * from rbac_user ORDER BY id DESC LIMIT 1");
$row=mysqli_fetch_array($get_id);

$checkEmail=$conn->prepare("select * from rbac_user where email=:email");
$checkEmail->bindParam(":email",$email);
$checkEmail->execute();
$countEmail=$checkEmail->rowCount();

$checkUsername=$conn->prepare("select * from rbac_user where lastname=:lastname");
$checkUsername->bindParam(":lastname",$lastname);
$checkUsername->execute();
$countUsername=$checkUsername->rowCount();

$firstname = preg_replace( "#[^\w]#", "", $firstname ); 
$lastname = preg_replace( "#[^\w]#", "", $lastname ); 
$email=strtolower($email);
$ip=getUserIpAddr();
$datetime=dateTime();
$id=$row['id']+1;
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo "<script>$('#email_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
exit();
}
if ($password!=$confirm_password) {
echo "<script>$('#password_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
exit();
}if($countEmail>0){
echo "<script>$('#email_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
exit();
}
if($countUsername>0){
echo "<script>$('#username_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
exit();
}
if(!empty($_FILES["image"]["name"])){
$image=$_FILES["image"]['name'];
$image_tmp=$_FILES["image"]['tmp_name'];
$image_size=$_FILES["image"]['size'];
$type=pathinfo($image,PATHINFO_EXTENSION);
$type=strtolower($type);
$rand=rand(0,99999999);
$path="../../assets/img/users/".$rand.trim($image);
move_uploaded_file($image_tmp, $path);
list($height,$width)=getimagesize($path);
if($type!="jpg" && $type!="png" && $type!="jpeg"){

echo "<script>$('#type_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
unlink($path);
exit();    
}
if($image_size>1000000){
echo "<script>$('#size_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
unlink($path);
exit();    
}
elseif($width>295 && $height>413){
echo "<script>$('#dimension_error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
unlink($path);
exit();
}

}
if(isset($image)){
$image=$rand.trim($image);    
}else{
$image="admin-image.png";  
}
$password=md5($password);

$insert=$conn->prepare("INSERT INTO `rbac_user`
(`id`,`firstname`, `lastname`, `email`, `password`, `image`, `ip_address`, `user_type`,`status`, `created_at`) VALUES 
(:id,:first,:last,:email,:password,:image,:ip,'1','1',:created_at)");

$insert->bindParam(":id",$id);
$insert->bindParam(":first",$firstname);
$insert->bindParam(":last",$lastname);
$insert->bindParam(":email",$email);
$insert->bindParam(":password",$password);
$insert->bindParam(":image",$image);
$insert->bindParam(":ip",$ip);
$insert->bindParam(":created_at",$datetime);
$run=$insert->execute();
unset($_POST);
if($run){
echo "<script>$('.alert-danger').css('display','none');</script>";
echo "<script>$('#success_message').css('display','block');</script>";
echo " <button class='btn btn-primary' type='button' disabled id='saved_btn' >Saved</button>";
}else{
echo "<script>$('#error_message').css('display','block');</script>";
echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
}

}

  ?>