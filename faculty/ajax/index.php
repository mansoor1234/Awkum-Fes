<?php 
include('../config.php');

if (isset($_POST['campusID'])) {
extract($_POST);
 $getNumber=$conn->prepare("select * from campus where srno=:campus");
           $getNumber->bindParam(":campus",$campusID);
           $getNumber->execute();
           $row1=$getNumber->fetchAll(PDO::FETCH_ASSOC);
           $count1=$getNumber->rowCount();
            $campus=$row1[0]['campus'];?>
                 <div class="row">
                  <div class="col-lg-12 col-12">
		               <div class="alert alert-danger text-center">
		                 <strong><?php echo $campus; ?></strong> 
		               </div>
		            </div>
            <?php
              $getNumber2=$conn->prepare("select * from department where srno=:dept");
              $getNumber2->bindParam(":dept",$deptID);
              $getNumber2->execute();
              $row2=$getNumber2->fetchAll(PDO::FETCH_ASSOC);
              $count2=$getNumber2->rowCount();
                $deptID=$row2[0]['srno'];
                $department=$row2[0]['dept_name'];?>
		            <div class="col-lg-12 col-12">
		               <div class="alert alert-success text-center">
		                 <strong><?php echo $department; ?></strong> 
		               </div>
		            </div>
                     <?php
                      $getNumber3=$conn->prepare("SELECT program,programs.srno  FROM dept_program INNER JOIN department ON department.srno = dept_program.dept_id INNER JOIN programs ON programs.srno = dept_program.program_id where department.srno=:dept");
                      $getNumber3->bindParam(":dept",$deptID);
                      $getNumber3->execute();
                      $row3=$getNumber3->fetchAll(PDO::FETCH_ASSOC);
                      $count3=$getNumber3->rowCount();

                      ?>
                      <div class="col-lg-4 col-4"></div>
                      <div class="col-lg-5 col-5">
                      	<center>
                      <table class="table " >
                      	<thead>
                      		<tr>
                      		  <th>Program</th>
                      		  <th>Students</th>
                      		</tr>
                      	</thead>
                      <tbody>
                      <?php
                      $total=0;
                      for ($i=0; $i < $count3; $i++) { 
                      	$program=$row3[$i]['program'];
                      	$program_id=$row3[$i]['srno'];
                      	$getNumber4=$conn->prepare("select * from students where campus_id=:campus and department_id=:dept AND program_id=:program");
                        $getNumber4->bindParam(":campus",$campusID);
                        $getNumber4->bindParam(":program",$program_id);
                        $getNumber4->bindParam(":dept",$deptID);
                        $getNumber4->execute();
                        $count4=$getNumber4->rowCount();
                        $total+=$count4;?>

                       	 <tr>
                   	  		<td>
                   	  			<?php echo $program; ?>
                   	  		</td>
                   	  		<td>
                   	  			<?php echo $count4; ?>
                   	  		</td>
                       	 </tr>
                       	 <?php } ?>
                       	 <tr><td><b>Total</b></td><td><b><?php echo $total ?></b></td></tr>
</tbody>
</table>
</center>
</div>
</div>

<?php } ?>