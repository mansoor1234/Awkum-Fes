<?php 
include('../../config.php');

if (isset($_POST['deptID'])) {
  $deptID=$_POST['deptID'];
  $get_campus_data=$conn->prepare("SELECT campus.srno, campus.campus, department.srno as dept_id,department.dept_name
  FROM department
  INNER JOIN campus ON campus.srno=department.campus_id where department.srno=:dept_id");
  $get_campus_data->bindParam(":dept_id",$deptID);
  $get_campus_data->execute();
  $rows=$get_campus_data->fetch(PDO::FETCH_ASSOC);

extract($rows);


 ?>   
 <div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="text" id="deptName" name="deptName" required placeholder="Department Name" value="<?php echo $dept_name; ?>" onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
    </div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
       <select  class="form-control createBtn  chosen-select" name="campusId" id="campus">
          <?php $query=mysqli_query($con,"select * from campus"); ?>
          <option value="<?php echo $srno; ?>"><?php echo $campus; ?></option>
          <?php while($rows1=mysqli_fetch_array($query)){ ?>
          <option value="<?php echo $rows1['srno']; ?>"><?php echo $rows1['campus']; ?></option>
          <?php } ?>
       </select>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-8  col-sm-12 offset-2 mb-2">
        <div class="form-group">
          <select data-placeholder="Choose Program (Multiple Selection)"  class="form-control createBtn chosen-select" name="programsEdit[]" multiple id="programsEdit" required>
            <?php $query3=mysqli_query($con,"SELECT programs.srno as ProgId,programs.program FROM department INNER JOIN dept_program ON department.srno = dept_program.dept_id INNER JOIN programs ON programs.srno = dept_program.program_id WHERE dept_id='$deptID'");
             ?>
            <?php while($rows2=mysqli_fetch_array($query3)){ ?>
            <option value="<?php echo $rows2['ProgId']; ?>" selected><?php echo $rows2['program']; ?></option>
            <?php } ?>
            <?php $query=mysqli_query($con,"SELECT * from programs"); ?>
            <?php while($rows3=mysqli_fetch_array($query)){ ?>
            <?php $progId=$rows3['srno']; ?>
            <?php $query4=mysqli_query($con,"SELECT * from dept_program where dept_id='$deptID' AND program_id='$progId'"); ?>
            <?php $count=mysqli_num_rows($query4); ?>
            <?php if($count==0){ ?>
            <option value="<?php echo $rows3['srno']; ?>"><?php echo $rows3['program']; ?></option>
            <?php }} ?>
           </select>
        </div>
    </div>
   </div>
<div class="row">
<div class="col-lg-8 col-sm-12 mb-2 offset-2">
    <div class="form-group">
     <input class="form-control createBtn" type="hidden"  name="dept_id" value="<?php echo $deptID; ?>">
    </div>
</div>
</div>
<?php } ?>
<?php 
if (isset($_POST['campusID'])) {
  $campusID=$_POST['campusID'];
  $get_dept_data=$conn->prepare("SELECT department.srno,department.dept_name FROM department INNER JOIN campus ON campus.srno=department.campus_id where department.campus_id=:campusID");
  $get_dept_data->bindParam(":campusID",$campusID);
  $get_dept_data->execute();
  $rows1=$get_dept_data->fetchAll(PDO::FETCH_ASSOC);
  $count=$get_dept_data->rowCount();
     echo "<option value='0'>Choose Department</option>";
     for ($i=0; $i < $count; $i++) {?>
        <option value="<?php echo $rows1[$i]['srno'];?>"><?php echo $rows1[$i]['dept_name']; ?></option>
       <?php
     }
  }
 ?>
          <script>
              $(".chosen-select").chosen({
                no_results_text: "Oops, nothing found!"
              });
            </script>
          <!--    $query3=mysqli_query($con,"
              SELECT programs.srno,programs.program FROM department INNER JOIN dept_program ON department.srno = dept_program.dept_id INNER JOIN programs ON programs.srno = dept_program.program_id WHERE dept_id='$deptID'"); -->