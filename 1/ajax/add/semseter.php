<?php 
include('../../config.php');

if (isset($_POST['semID'])) {
  $semID=$_POST['semID'];
  $get_program_data=$conn->prepare("SELECT * from semester where srno=:semID");
  $get_program_data->bindParam(":semID",$semID);
  $get_program_data->execute();
  $rows=$get_program_data->fetch(PDO::FETCH_ASSOC);

extract($rows);


 ?>   
 <div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="text" id="semesterName" name="semesterName" required placeholder="Semester Name" value="<?php echo $semester; ?>" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="hidden"  name="semID" value="<?php echo $semID; ?>">
    </div>
</div>
</div>
<?php } ?>