<?php 
include('../../config.php');
if (isset($_POST['semesterID'])) {
  extract($_POST);
  $semesterID=$_POST['semesterID'];
  $get_course_data=$conn->prepare("SELECT *
   FROM course WHERE semester_id=:semesterID AND campus_id=:campus AND program_id=:program AND department_id=:department");
  $get_course_data->bindParam(":semesterID",$semesterID);
  $get_course_data->bindParam(":campus",$campus);
  $get_course_data->bindParam(":program",$program);
  $get_course_data->bindParam(":department",$department);
  $get_course_data->execute();
  $rows1=$get_course_data->fetchAll(PDO::FETCH_ASSOC);
  $count=$get_course_data->rowCount();
     echo "<option value='0'>Choose Course</option>";
     for ($i=0; $i < $count; $i++) {?>
        <option value="<?php echo $rows1[$i]['srno'];?>"><?php echo $rows1[$i]['course_name']; ?></option>
       <?php
     }
  }
 ?>
 <?php 

if (isset($_POST['courseID'])) {
  $courseID=$_POST['courseID'];
  $get_course_data=$conn->prepare("SELECT course.srno as cid,course_name,course_code,semester.srno as sid,semester.semester ,department.srno as did,department.dept_name,campus.srno campid,campus.campus,programs.srno as progid,programs.program 
    FROM course 
    INNER JOIN semester
     ON semester.srno = course.semester_id 
     INNER JOIN programs ON programs.srno=course.program_id 
     INNER JOIN department ON department.srno =course.department_id 
     INNER JOIN campus ON campus.srno =course.campus_id WHERE course.srno=:courseID");
  $get_course_data->bindParam(":courseID",$courseID);
  $get_course_data->execute();
  $rows=$get_course_data->fetch(PDO::FETCH_ASSOC);

extract($rows);


 ?>   

 <div class="row">
      <div class="col-lg-8  col-sm-12 offset-2 mb-2">
          <div id="output"></div>
          <div class="form-group">
            <input type="hidden" name="courseEdit2" value="<?php echo $courseID; ?>">
           <input class="form-control createBtn" type="text" id="courseName" name="courseName" required placeholder="Course Name" value="<?php echo $course_name; ?>"  onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
          </div>
      </div>
    </div>
     <div class="row">
      <div class="col-lg-8  col-sm-12 offset-2 mb-2">
          <div id="output"></div>
          <div class="form-group">
           <input class="form-control createBtn" type="text" id="courseCode" name="courseCode" required placeholder="Course Code" value="<?php echo $course_code ?>" >
          </div>
      </div>
    </div>
<div class="row">
  <div class="col-lg-6 col-sm-12 mb-2">
      <div class="form-group">
          <select  class="form-control createBtn " name="campus" id="campus2" onchange="getDepartment(this.value)">
              <option value="<?php echo $campid; ?>"><?php echo $campus; ?></option>
              <?php $query=mysqli_query($con,"select * from campus"); ?>
              <?php while($rows1=mysqli_fetch_array($query)){ ?>
              <option value="<?php echo $rows1['srno']; ?>"><?php echo $rows1['campus']; ?></option>
              <?php } ?>
          </select>
      </div>
  </div>
  <div class="col-lg-6 col-sm-12 mb-2">
      <div class="form-group">
         <select  class="form-control createBtn " name="department" id="department2" onchange="getProgram(this.value)">

              <option value="<?php echo $did; ?>"><?php echo $dept_name; ?></option>
              <option value="0">Choose Department</option>
              <?php $query=mysqli_query($con,"select * from department where campus_id='$campid'"); ?>
              
              <?php while($rows2=mysqli_fetch_array($query)){ ?>
              <option value="<?php echo $rows2['srno']; ?>"><?php echo $rows2['dept_name']; ?></option>
              <?php } ?>
         </select>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-sm-12 mb-2">
      <div class="form-group">
        <select  class="form-control createBtn  " name="program"  id="program2" onchange="getSemester(this.value)">
              
              <option value="<?php echo $progid; ?>"><?php echo $program; ?></option>
              <option value="0">Choose Program</option>
              <?php $query=mysqli_query($con,"SELECT programs.srno as ProgId,programs.program FROM department INNER JOIN dept_program ON department.srno = dept_program.dept_id INNER JOIN programs ON programs.srno = dept_program.program_id WHERE dept_id='$did'"); ?>
              <option value="<?php echo $progid; ?>"><?php echo $program; ?></option>
              
              <?php while($rows3=mysqli_fetch_array($query)){ ?>
              <option value="<?php echo $rows3['ProgId']; ?>"><?php echo $rows3['program']; ?></option>
              <?php } ?>
         </select>
      </div>
  </div>
  <div class="col-lg-6 col-sm-12 mb-2">
      <div class="form-group">
        <select  class="form-control createBtn " name="semester" id="semester2" onchange="getCourse(this.value)">
              
              <option value="<?php echo $sid; ?>"><?php echo $semester; ?></option>
              <option value="0">Choose Semester</option>
              <?php $query=mysqli_query($con,"SELECT semester.srno,semester.semester FROM programs INNER JOIN program_semester ON programs.srno = program_semester.program_id INNER JOIN semester ON semester.srno = program_semester.semester_id WHERE program_id='$progid'"); ?>
              <?php while($rows4=mysqli_fetch_array($query)){ ?>
              <option value="<?php echo $rows4['srno']; ?>"><?php echo $rows4['semester']; ?></option>
              <?php } ?>
         </select>
      </div>
  </div>
</div>
<?php } ?>
