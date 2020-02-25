<?php 
include('../../config.php');

if (isset($_POST['facultyID'])) {
  $facultyID=$_POST['facultyID'];
  $get_faculty_data=$conn->prepare("SELECT course.srno as cid,faculty.name,designation,semester.srno as sid,semester.semester ,department.srno as did,department.dept_name,campus.srno campid,campus.campus,programs.srno as progid,programs.program ,course.srno as crsid,course.course_name 
    FROM faculty 
     INNER JOIN semester  ON semester.srno = faculty.semester_id 
     INNER JOIN programs ON programs.srno=faculty.program_id 
     INNER JOIN department ON department.srno =faculty.department_id 
     INNER JOIN campus ON campus.srno =faculty.campus_id 
     INNER JOIN course ON course.srno =faculty.course_id 
     WHERE faculty.srno=:facultyID");
  $get_faculty_data->bindParam(":facultyID",$facultyID);
  $get_faculty_data->execute();
  $rows=$get_faculty_data->fetch(PDO::FETCH_ASSOC);

extract($rows);


 ?>   

 <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                          <input type="hidden" name="facultyEdit2" value="<?php echo $facultyID; ?>">
                           <input class="form-control createBtn" type="text" placeholder="Full Name" value="<?php echo $name; ?>" name="name" required onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                         <input class="form-control createBtn" type="text" placeholder="Designation" value="<?php echo $designation; ?>" name="designation" id="designation" required onkeypress="return ((event.keyCode>= 97 && event.keyCode <= 122) || (event.keyCode>= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 32);">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2">
                        <div class="form-group">
                            <select  class="form-control createBtn " name="campus" id="campus2" onchange="getDepartment(this.value)">
                                <option value="<?php echo $campid; ?>"><?php echo $campus; ?></option>
                                <?php $query=mysqli_query($con,"select * from campus"); ?>
                                <option value="0">Choose Campus</option>
                                <?php while($rows=mysqli_fetch_array($query)){ ?>
                                <option value="<?php echo $rows['srno']; ?>"><?php echo $rows['campus']; ?></option>
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
                          <select  class="form-control createBtn  " name="program" id="program2" onchange="getSemester(this.value)">
                            <option value="<?php echo $progid; ?>"><?php echo $program; ?></option>
                             <option value="0">Choose Program</option>
                              <?php $query=mysqli_query($con,"SELECT programs.srno as ProgId,programs.program FROM department INNER JOIN dept_program ON department.srno = dept_program.dept_id INNER JOIN programs ON programs.srno = dept_program.program_id WHERE dept_id='$did'"); ?>
                                <?php while($rows3=mysqli_fetch_array($query)){ ?>
                                <option value="<?php echo $rows3['srno']; ?>"><?php echo $rows3['program']; ?></option>
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
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-2 offset-3">
                        <div class="form-group">
                          <div class="form-group">
                          <select  class="form-control createBtn  " name="course" id="course2" >
                             <option value="<?php echo $crsid; ?>"><?php echo $course_name; ?></option>
                             <option value="0">Choose Course</option>
                                <?php $query=mysqli_query($con,"select * from course where semester='$sid'"); ?>
                                 <?php while($rows2=mysqli_fetch_array($query)){ ?>
                                 <option value="<?php echo $rows2['srno']; ?>"><?php echo $rows2['course_name']; ?></option>
                                 <?php } ?>
                           </select>
                        </div>
                        </div>
                    </div>
                  </div>
<?php } ?>



