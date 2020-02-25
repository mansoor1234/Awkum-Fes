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
<div class="row">
    <div class="col-lg-8  col-sm-12 offset-2 mb-2">
        <div class="form-group">
          <select data-placeholder="Choose Semsters (Multiple Selection)"  class="form-control createBtn chosen-select" name="semestersEdit[]" multiple id="semestersEdit" required>
            <?php $query3=mysqli_query($con,"SELECT semester.srno,semester.semester FROM programs INNER JOIN program_semester ON programs.srno = program_semester.program_id INNER JOIN semester ON semester.srno = program_semester.semester_id WHERE program_id='$progID'");
             ?>
            <?php while($rows2=mysqli_fetch_array($query3)){ ?>
            <option value="<?php echo $rows2['srno']; ?>" selected><?php echo $rows2['semester']; ?></option>
            <?php } ?>
            <?php $query=mysqli_query($con,"SELECT * from semester"); ?>
            <?php while($rows3=mysqli_fetch_array($query)){ ?>
            <?php $sem_id=$rows3['srno']; ?>
            <?php $query4=mysqli_query($con,"SELECT * from program_semester where program_id='$progID' AND semester_id='$sem_id'"); ?>
            <?php $count=mysqli_num_rows($query4); ?>
            <?php if($count==0){ ?>
            <option value="<?php echo $rows3['srno']; ?>"><?php echo $rows3['semester']; ?></option>
            <?php }} ?>
           </select>
        </div>
    </div>
   </div>
<?php } ?>
<?php 
if (isset($_POST['DeptID'])) {
  $DeptID=$_POST['DeptID'];
  $get_dept_data=$conn->prepare("SELECT programs.srno as ProgId,programs.program FROM department INNER JOIN dept_program ON department.srno = dept_program.dept_id INNER JOIN programs ON programs.srno = dept_program.program_id WHERE dept_id=:DeptID");
  $get_dept_data->bindParam(":DeptID",$DeptID);
  $get_dept_data->execute();
  $rows1=$get_dept_data->fetchAll(PDO::FETCH_ASSOC);
  $count=$get_dept_data->rowCount();
     echo "<option value='0'>Choose Program</option>";
     for ($i=0; $i < $count; $i++) {?>
        <option value="<?php echo $rows1[$i]['ProgId'];?>"><?php echo $rows1[$i]['program']; ?></option>
       <?php
     }
  }
 ?>
            <script>
              $(".chosen-select").chosen({
                no_results_text: "Oops, nothing found!"
              });
            </script>