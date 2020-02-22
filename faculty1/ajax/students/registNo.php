<?php 
include('../../config.php');
extract($_POST);
if($regNo){
$date=dateTime();
$inserRegNo=$conn->prepare("INSERT INTO `registration_numbers` (`id`, `number`, `created_at`) VALUES (NULL,:regNo,:dt)");
$inserRegNo->bindParam(":regNo",$regNo);
$inserRegNo->bindParam(":dt",$date);
$run=$inserRegNo->execute();
if($run){
return "true";
}else{
return "false";
}

}

 ?>
<?php
$c=1;
$get_users=mysqli_query($con,"SELECT * from `registration_numbers`  ");
while($rows=mysqli_fetch_array($get_users)){
?>
<tr>
<td><?php  echo $c++;?></td>
<td><?php  echo $rows['number'];?></td>
<td>
<button class="btn btn-primary btn-sm editBtn"  type="button" data-toggle="modal" data-target="#edituser" value="<?php echo $rows['id'];?>" onclick="userEdit(this.value)" id="editBtn"><i class="far fa-edit" ></i> Edit
</button>
<button class="btn btn-primary btn-sm editBtn" type="button" data-toggle="modal" data-target="#changeImage" value="<?php echo $rows['id'];?>"  onclick="changeImage(this.value)" id="deleteBtn"> <i class="fas fa-delete"></i> Delete
</button></td>
</tr>
<?php }?>