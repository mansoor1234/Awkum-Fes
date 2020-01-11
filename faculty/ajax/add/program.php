<?php 
include('../../config.php');

if (isset($_POST['progID'])) {
  $progID=$_POST['progID'];
  $get_program_data=$conn->prepare("SELECT * from programs where srno=:prog_id");
  $get_program_data->bindParam(":prog_id",$progID);
  $get_program_data->execute();
  $rows=$get_program_data->fetch(PDO::FETCH_ASSOC);

extract($rows);


 ?>   
 <div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="text" id="programName" name="programName" required placeholder="Program Name" value="<?php echo $program; ?>" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="hidden"  name="progID" value="<?php echo $progID; ?>">
    </div>
</div>
</div>
<?php } ?>