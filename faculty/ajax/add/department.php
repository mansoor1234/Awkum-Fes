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
          <?php while($rows=mysqli_fetch_array($query)){ ?>
          <option value="<?php echo $rows['srno']; ?>"><?php echo $rows['campus']; ?></option>
          <?php } ?>
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