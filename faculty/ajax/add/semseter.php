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
<?php 
if (isset($_POST['ProgID'])) {
  $ProgID=$_POST['ProgID'];
  $get_prog_data=$conn->prepare("SELECT semester.srno,semester.semester FROM programs INNER JOIN program_semester ON programs.srno = program_semester.program_id INNER JOIN semester ON semester.srno = program_semester.semester_id WHERE program_id=:ProgID");
  $get_prog_data->bindParam(":ProgID",$ProgID);
  $get_prog_data->execute();
  $rows1=$get_prog_data->fetchAll(PDO::FETCH_ASSOC);
  $count=$get_prog_data->rowCount();
     echo "<option value='0'>Choose Semester</option>";
     for ($i=0; $i < $count; $i++) {?>
        <option value="<?php echo $rows1[$i]['srno'];?>"><?php echo $rows1[$i]['semester']; ?></option>
       <?php
     }
  }
 ?>