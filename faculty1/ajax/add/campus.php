<?php 
include('../../config.php');

if (isset($_POST['campusID'])) {
  $campusID=$_POST['campusID'];
  $get_campus_data=$conn->prepare("select * from `campus` where srno=:id");
  $get_campus_data->bindParam(":id",$campusID);
  $get_campus_data->execute();
  $rows=$get_campus_data->fetch(PDO::FETCH_ASSOC);

extract($rows);


 ?>   
 <div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="text" id="campusName" name="campusName" required placeholder="Campus Name" value="<?php echo $campus; ?>" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
      <input class="form-control createBtn" type="text" id="campusCity" name="city" required  placeholder="Campus City" value="<?php echo $city; ?>" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="text" id="address" name="address" required value="<?php echo $address; ?>" placeholder="Campus Address">
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="hidden"  name="campus_id" value="<?php echo $campusID; ?>">
    </div>
</div>
</div>
<?php } ?>