<?php 
include('../../config.php');

if (isset($_POST['menu_id'])) {
extract($_POST);
$update=$conn->prepare("UPDATE `rbac_menu_item` SET `menu_title`=:menu_title,`page_id`=:url,`module`=:module,`parent_menu`=:parent,page_name=:pagename WHERE `menu_id`=:menu_id");
$update->bindParam(":menu_title",$menu_title);
$update->bindParam(":url",$url);
$update->bindParam(":module",$module);
$update->bindParam(":parent",$parent_menu);
$update->bindParam(":pagename",$pageName);
$update->bindParam(":menu_id",$menu_id);
$run=$update->execute();
if ($run) {
	echo "<script>$('.alert-danger').css('display','none');</script>";
    echo "<script>$('#edit_success_message').css('display','block');</script>";
    echo " <button class='btn btn-primary' type='button' disabled id='saved_btn'><span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Saved</button>";
}else{
	echo "<script>$('#edit_error_message').css('display','block');</script>";
	echo "<script>$('#edit_success_message').css('display','none');</script>";
    echo "<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>";
}
}
if (isset($_POST['delete_menu_id'])) {
	$menu_id=$_POST['delete_menu_id'];
	$delete=$conn->prepare("DELETE FROM `rbac_menu_item` WHERE `menu_id`=:menu_id");
    $delete->bindParam(":menu_id",$menu_id);
    $run=$delete->execute();
    if($run){
      echo "Record has been deleted";
    }else{
      echo "Failed to delete record";
    }
}
 ?>