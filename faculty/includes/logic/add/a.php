<?php

                 $d = new DateTime('F', new DateTimeZone('UTC'));
                 $d->modify('first day of previous month');
                 $year1 = $d->format('Y'); 
                 $month1 = $d->format('F'); 
                if (isset($_SESSION['salary_month'])) {
                  $my=explode("-",$_SESSION['salary_month']);
                  $month1=$my[1];
                  $year1=$my[0];
                 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Custom fonts for this template-->
  <link href="app-assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="app-assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="app-assets/admin/css/sb-admin.css" rel="stylesheet">
<style >
  .ubl{
    background-color: #040d6d;
  }
  .mezanbl{
    background-color:#45025a; 
  }.hbl{
    background-color: #32ad91;
  }

@media only screen and (min-width: 600px) {
 .page-wrapper.default-theme.sidebar-bg.bg1.toggled{
  margin-left: 0px;
}
}
@media only screen and (max-width: 600px) {
 .page-wrapper.default-theme.sidebar-bg.bg1.toggled{
  margin-left: 50px;
}
}
.navbar.navbar-expand-lg.navbar-light.bg-dark{
  margin-top: -57px;
}
table,th,td{
    padding: 1px !important;
    font-size: 13px;
    border:1px solid #ded4d485;
    
  }.td{
      text-align:center;
  }table{
   
  }
</style>
</head>

<body id="page-top">

  

  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">
        
 


        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="margin-right: 56px;">
          <li class="breadcrumb-item">
          Monthly Payroll
          </li>
          
        </ol>

        
       
           
            
        <!-- DataTables Example -->
        <div class="card mb-3" style="margin-right: 56px;">
          <div class="card-header">
            <i class="fas fa-table"></i> <b>Monthly Payroll</b>
            <div class="row">
              <div class="col-md-2 col-lg-2"></div>
              <div class="col-md-8 col-lg-8">
             <div class="input-group-prepend">
                 
              <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal4'><i class="fas fa-plus-circle"></i> Add Adjustment</button>
              <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal1'><i class="fas fa-plus-circle"></i> Add Fines</button>
              <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal5'><i class="fas fa-plus-circle"></i> Global Fines</button>
              <button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal2'><i class="fas fa-plus-circle"></i> Add Commission</button>
              <a  class='btn btn-dark btn-sm'  href="html/payroll/print_attend.php" title="Provigional Salary Slip"><i class="fas fa-print"></i> Print Provisional</a>
              <a  class='btn btn-warning btn-sm'  href="html/payroll/print_attend_orig.php"  title="Origional Salary Slip"><i class="fas fa-print"></i> Print Origional</a>
              <a  class='btn btn-primary btn-sm'  href="html/payroll/print_reciept.php"  title="Origional Salary Slip"><i class="fas fa-print"></i> Print Reciept</a>
              <a  class='btn btn-primary btn-sm'  href="html/payroll/print_excel.php"  title="Origional Salary Slip"><i class="fas fa-print"></i>Excel Export</a>
                  <?php 
                $comp_id=$_SESSION['comp_id'];
               
                $today=date("d");
                $todaym=date("m");
                $dateObj   = DateTime::createFromFormat('!m', (int)$month1);
                $monthName = $dateObj->format('F');
                 
                 $check_if_record_present=$conn->prepare("select * from employee_gross_salary where month=:month AND year=:year AND company=:comp");
                 $check_if_record_present->bindParam(":month",$monthName);
                 $check_if_record_present->bindParam(":year",$year1);
                 $check_if_record_present->bindParam(":comp",$comp_id);
                 $check_if_record_present->execute();
                 $countre=$check_if_record_present->rowCount();
                if($today>10 && $todaym>$month1 && $countre==0){
                ?>
                <a  class='btn btn-primary btn-sm'  href="html/payroll/save_salary.php"  title="Save Salary"><i class="fas fa-save"></i> Save</a>
              <?php } ?>
               </div>
                <input type="month" class="form-control select_ym float-right" name="select_month float-right" style="    position: absolute;top: -33px; left: 100%;width: 22%;height: 29px;"  onchange="document.location.reload(true)" value="<?php if(isset($_SESSION['salary_month'])){echo $_SESSION['salary_month'];}?>">
               </div>
             </div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
             <form method="POST">
              <table class="" id="dataTable" width="100%" cellspacing="0" style=" border-collapse: collapse !important; ">
                <thead>
                   <tr>
                    <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Id</th>
                    <th>Total Hours</th>
                    <th>Hours Spent</th>
                    
                    <th>Basic Amount</th>
                    <th>Overtime Amount</th>
                    <th>Advance </th>
                    <th>Loan </th>
                    <th>Incentive </th>
                    <th>Fines </th>
                    <th>Fp Fines </th>
                    <th>Commission </th>
                    <th>Adjustment </th>
                    <th>Calculated Salary</th>
                    <th>Total Amount</th>
                    <th>Action/Add Leaves</th>
                  </tr>
                </thead>
                <tfoot>
                   <tr>
                    <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Id</th>
                    <th>Total Hours</th>
                    <th>Hours Spent</th>
                    
                    <th>Basic Amount</th>
                    <th>Overtime Amount</th>
                    <th>Advance </th>
                    <th>Loan </th>
                    <th>Incentive </th>
                    <th>Fines </th>
                    <th>Fp Fines </th>
                    <th>Commission </th>
                    <th>Adjustment </th>
                    <th>Calculated Salary</th>
                    <th>Total Amount</th>
                    <th> <button type='button' class='btn btn-warning btn-sm' id="btn" data-toggle='modal' data-target='#myModal'><i class="fas fa-plus-circle"></i>Add Leaves</button></th>
                  </tr>
                </tfoot>
                <tbody>
                  <form method="POST">
                <?php 
                 

                 $query1=mysqli_query($con,"SELECT DISTINCT atten_emp_id,name,duty_hours  FROM employee_attendance INNER JOIN selected_can ON employee_attendance.atten_emp_id = selected_can.emp_id WHERE company='$comp_id' AND month='$month1' AND year='$year1' AND emp_status='0'");
                 $total_rocords=mysqli_num_rows($query1);
                 $query2=mysqli_query($con,"SELECT  DISTINCT atten_emp_id,name,duty_hours,basicsalary  FROM employee_attendance INNER JOIN selected_can ON employee_attendance.atten_emp_id = selected_can.emp_id WHERE company='$comp_id' AND month='$month1' AND year='$year1' AND emp_status='0'  ORDER BY name ASC ");
                 $sl=1;
                 while ($rows=mysqli_fetch_array($query2)) {
                    $emp_id=$rows['atten_emp_id'];
                    $emp_name=$rows['name'];
                    $duty_hours=$rows['duty_hours'];
                    $basicsalary=$rows['basicsalary'];
                    
                    $total_hrs=30*$duty_hours;
                    $hours=0;
                    $mins=0;
                    $late=0;
                    $absent=0;
                    $forgot=0;
                    $leaves=0;
                    $overtime=0;
                    $overmin=0;
                    $overamount=0;
                    $trip=0;
                    $h2=0;
                    $adjustment=0;
                    $calculated=0;
                    $query3=mysqli_query($con,"SELECT *  FROM employee_attendance  WHERE atten_emp_id='$emp_id' AND month='$month1' AND year='$year1' ");
                    $total_days=mysqli_num_rows($query3);
                    while ($row=mysqli_fetch_array($query3)) {
                   
                    $id=$row['attend_id'];
                    $year=$row['year'];
                    $month=$row['month'];
                    $day=$row['day'];
                    $dup=mysqli_query($con,"select * from employee_attendance where day='$day' AND month='$month' AND year='$year'");
                    $get_dup=mysqli_num_rows($dup);
                    $in=$row['check_in'];
                    $out=$row['check_out'];
                    $leaves+=$row['leaves'];
                    if($row['leaves']==1){$forgot+=0;}else{$forgot+=$row['forgot'];}
                    $trip+=$row['trip'];
                    $over=$row['over'];
                    $check_in=explode(":", $in);
                    $check_out=explode(":", $out);
                    $in_hr=$check_in[0];
                    $in_min=$check_in[1];
                    $out_hr=$check_out[0];
                    $out_min=$check_out[1];

                    $all_days=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                    $dateObj   = DateTime::createFromFormat('!m', (int)$month);
                    $monthName = $dateObj->format('F');
                    if($out_hr=="00" && $out_min=="00" OR $in_hr=="00" && $in_min=="00")
                    {
                     $mins+=0;
                     $hours+=0;
                    }else{
                  if($over==1){
                    if($out_hr=="00"){$out_hr=24;}
                    elseif($out_hr=="01"){$out_hr=25;}
                    elseif($out_hr=="02"){$out_hr=26;}
                    elseif($out_hr=="03"){$out_hr=27;}
                    elseif($out_hr=="04"){$out_hr=28;}
                    elseif($out_hr=="05"){$out_hr=29;}
                  }
              
                     $h=$out_hr-$in_hr;
                     $m=$out_min-$in_min;
                     if($m<0){$m=60+$m;$h-=1;}
                     if($h>=$duty_hours)
                     {
                      $h2=$duty_hours;
                      $m2=0;
                     }else
                     {
                      $h2=$h;
                      $m2=$m; 
                     }
                     $mins+=$m2;
                     $hours+=$h2;
                     
                     
                    
                     if($h<$duty_hours){
                     if($h==$duty_hours-1 && $m<30)
                     {
                      $late+=1;
                     }elseif($h<$duty_hours-1)
                     {
                      $late+=1;
                     }
                    }
                    
                     
                    if($h>=$duty_hours){
                      $overtime+=$h-$duty_hours;
                      
                      if($m>29){$overtime+=1;}elseif($m>=20 && $m<30){$overmin+=30;}
                    }
                    }}
                    
                    $absent=$all_days-$total_days;
                    $get_off=mysqli_query($con,"select off_per_month from selected_can where emp_id='$emp_id' AND emp_status='0'");
                    $row_off=mysqli_fetch_array($get_off);
                    $off_per_month=$row_off['off_per_month'];
                       $result=$absent-$off_per_month;
                     if ($result>=0){$hours+=$duty_hours*$off_per_month;$absent=$absent-$off_per_month;}
                      else{$absent=0;$hours+=$duty_hours*$off_per_month;$absent=$absent-$off_per_month;}
                   
                    if($absent<0){$absent=0;}
                    include 'salary_generate.php';
                    $yearmnth=$year1."-".$month1;
                    $adjust=mysqli_query($con,"select * from employee_adjustment where adj_emp_id='$emp_id' AND created_at='$yearmnth'");
                    $num_rows=mysqli_num_rows($adjust);
                    if($num_rows>0){
                    $get_adjust=mysqli_fetch_assoc($adjust);
                    $adjust_amount=$get_adjust['amount'];
                    $adjustment=$adjust_amount;
                    }else{
                     $adjustment=0;   
                    }
                    
                    $mins=round($mins/60);
                    $hours+=$mins;
                   
                    if($overmin>=60){$overtime+=round($overmin/60);$overmin="00";}else{$overmin=$overmin;}
                    
                    $rem_hrs=$hours-$total_hrs;
                    $perhour=round($basicsalary);
                    $perhour/=$duty_hours;
                    $perhour/=30;
                    $overamount=round($perhour*$overtime);
                    $hours+=$duty_hours*$leaves;
                    $hours+=$duty_hours*$trip;
                    
                    if($overmin!="00"){$overamount+=round($perhour/2);}
                    if($basicsalary>15000){$overamount=0;$overtime=0;}
                    $total_sal_perhr=$hours*$perhour;
                    $totalAmount=round($total_sal_perhr);
                    
                    if($forgot<3 && $forgot>0){$forgotAmount=round($forgot*$basicsalary/30);$hours+=$forgot*$duty_hours;}
                    elseif($forgot==3){$forgotAmount=$forgot*$basicsalary/30; $forgotAmount=round($forgotAmount-$perhour);$hours+=($forgot*$duty_hours)-1;}
                    elseif($forgot>3){
                       
                        $forgotAmount=($forgot-1)*$basicsalary/30; 
                        $forgotAmount=round($forgotAmount-$perhour);
                        $hours+=(($forgot-1)*$duty_hours)-1;
                        
                    }else{$forgotAmount=0;}
                    $totalAmount+=$forgotAmount;
                    $totalfpamount=$forgot*$basicsalary/30;
                    $fpfine=round($totalfpamount-$forgotAmount);
                    $get_position=mysqli_query($con,"select * from selected_can where emp_id='$emp_id'");
                    $get_position=mysqli_fetch_array($get_position);
                    $position=$get_position['position'];
                    $salary_type=$get_position['salary_type'];
                    if($salary_type==1){
                    $totalAmount=$basicsalary+$fpfine;
                    $calculated=$basicsalary;
                    }else{
                    $calculated=$totalAmount;
                    $totalAmount+=$fpfine;
                    }
                    $fine2=$fine."+".$gf_amount;
                    $totalAmount-=$loan+$advance+$fine+$gf_amount+($fpfine*2);
                    $totalAmount+=$commission+$overamount+$incentive;
                    $totalAmount+=$adjustment+$amount_ginc;
                    if($totalAmount<0){
                       $totalAmount=0;
                       
                    }if($fpfine<1){
                       $fpfine=0;
                       
                    }
                    // $update=mysqli_query($con,"UPDATE `employee_gross_salary` SET `calculated_salary`='$calculated' WHERE emp_id='$emp_id'");
                    ?>
                   <tr> 
                      <td><?php echo $sl++;?></td>
                      <td><?php echo $emp_name;?></td>
                      <td><?php echo $emp_id;?></td>
                      <td><?php echo $total_hrs;?></td>
                      <td><?php echo $hours;?></td>
                      
                      <td><?php echo $rows['basicsalary']; ?></td>
                      <td><?php echo $overamount; ?></td>
                      <td><?php echo $advance; ?></td>
                      <td><?php echo $loan;?></td>
                      <td><?php echo $incentive; ?></td>
                      <td><?php echo $fine2; ?></td>
                      <td><?php echo $fpfine; ?></td>
                      <td><?php echo $commission; ?></td>
                      <td><?php echo $adjustment; ?></td>
                      <td><?php echo $calculated; ?></td>
                      <td><?php echo round($totalAmount); ?></td>
                      <td> <input type="radio" name="del[]" class="form-control check" value="<?php echo  $emp_id;?>"></td>
                  </tr>
                <?php } ?>
                </tbody>
              </form>
              </table>
             
            </form>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>

      </div>
  

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Apply Model   -->
 <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Leaves</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
       <div class="modal-body">
         <form method="POST" action="php/add_leave.php" enctype="multipart/form-data">
          <div class="input-group-prepend">
           <label class="form-control label" >Employee</label>
            <input type="text" class="form-control"  name="emp_id" id="employe" required>
           </div>
           <div class="input-group-prepend">
           <label class="form-control label" >Date</label>
            <div id="targetDate"></div>
           </div>

        <!-- Modal footer -->
        <div class="modal-footer">
         <input type="submit" name="leave" class="btn btn-success float-right" value="Add Leave" style="width: 100%">
          
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
     <!-- Apply Model Closed -->

<!-- Apply Fine Model   -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Fines</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
       <div class="modal-body">
         <form method="POST" action="php/add_fines.php">
           <div class="input-group-prepend">
            <label class="form-control label">Employee Name*</label>
             <select class="form-control" name="employee[]"   multiple="multiple" required>
              <option>Choose Option</option>
               <?php $select_emp=mysqli_query($con,"select * from selected_can where company='$comp_id' AND emp_status='0' ORDER BY name ASC"); ?>
              <?php while($rows=mysqli_fetch_array($select_emp)){ ?>
              <option value="<?php echo $rows['emp_id']; ?>"><?php echo $rows['name']; ?></option>
              <?php }?>
             </select><br>
            </div>
           
           <div class="input-group-prepend">
            <label class="form-control label">Date*</label>
            <input type="date" name="date1" class="form-control">
             <br>
            </div>
            <div class="input-group-prepend">
              <label class="form-control label">Reason*</label>
                <input type="text" name="reason" class="form-control" id="amount"  required  placeholder="Reason"><br>
            </div>
            <div class="input-group-prepend">
              <label class="form-control label">Amount*</label>
                <input type="number" name="amount" class="form-control" id="amount"  required  placeholder="Amount"><br>
            </div>
            </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <input type="submit" name="done" class="btn btn-success float-right" value="Done" style="width: 100%">
          
        </div>
        </form>
      </div>
    </div>
  </div>
     <!-- Apply Model Closed -->

<!-- Apply Fine Model   -->
<div class="modal fade" id="myModal5">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Global Fines</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
       <div class="modal-body">
         <form method="POST" action="php/add_globalfines.php">
          
           
           <div class="input-group-prepend">
            <label class="form-control label">Date*</label>
            <input type="date" name="date1" class="form-control">
             <br>
            </div>
            <div class="input-group-prepend">
              <label class="form-control label">Reason*</label>
                <input type="text" name="reason" class="form-control" id="amount"  required  placeholder="Reason"><br>
            </div>
             <div class="input-group-prepend">
              <label class="form-control label">Month*</label>
               <select class="form-control" name="month">
                 <option value="01">January</option>
                 <option value="02">February</option>
                 <option value="03">March</option>
                 <option value="04">April</option>
                 <option value="05">May</option>
                 <option value="06">June</option>
                 <option value="07">July</option>
                 <option value="08">August</option>
                 <option value="09">September</option>
                 <option value="10">October</option>
                 <option value="11">November</option>
                 <option value="12">December</option>
               </select>
            </div>
            <div class="input-group-prepend">
              <label class="form-control label">Amount*</label>
                <input type="number" name="amount" class="form-control" id="amount"  required  placeholder="Amount"><br>
            </div>
            </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <input type="submit" name="done" class="btn btn-success float-right" value="Done" style="width: 100%">
          
        </div>
        </form>
      </div>
    </div>
  </div>
     <!-- Apply Model Closed -->
     <!-- Apply Fine Model   -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Commission</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
       <div class="modal-body">
         <form method="POST" action="php/add_comm.php">
          <div class="input-group-prepend">
            <label class="form-control label">Employee Name*</label>
             <select class="form-control" name="employee" required>
              <option>Choose Option</option>
               <?php $select_emp=mysqli_query($con,"select * from selected_can where company='$comp_id' AND emp_status='0' ORDER BY name ASC"); ?>
              <?php while($rows=mysqli_fetch_array($select_emp)){ ?>
              <option value="<?php echo $rows['emp_id']; ?>"><?php echo $rows['name']; ?></option>
              <?php }?>
             </select><br>
            </div>
           
           <div class="input-group-prepend">
            <label class="form-control label">Date*</label>
            <input type="month" name="date1" class="form-control">
             <br>
            </div>
            <div class="input-group-prepend">
              <label class="form-control label">Amount*</label>
                <input type="number" name="amount" class="form-control" id="amount"  required  placeholder="Amount"><br>
            </div>
            </div>
        <!-- Modal footer -->
        <div class="modal-footer">
         <input type="submit" name="done" class="btn btn-success float-right" value="Done" style="width: 100%">
          
        </div>
        </form>
      </div>
    </div>
  </div>
     <!-- Apply Model Closed -->
     <?php include('modal4.php');?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="app-assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="app-assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="app-assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <!-- <script src="app-assets/admin/vendor/chart.js/Chart.min.js"></script> -->
  <script src="app-assets/admin/vendor/datatables/jquery.dataTables.js"></script>
  <script src="app-assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="app-assets/admin/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="app-assets/admin/js/demo/datatables-demo.js"></script>
  <!-- <script src="app-assets/admin/js/demo/chart-area-demo.js"></script> -->

  <script>

$('#select_all').click(function(event) {   
    if(this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
$("#btn").click(function(){
  var checkedValue = $('.check:checked').val();
  if(checkedValue){
    $("#employe").val(checkedValue);
    // alert(checkedValue);
     $.ajax(
          {
          url:"ajax/attendance/leaves.php",
          method:"post",
          data:{leaves:checkedValue},
          success:function(result){
            $("#targetDate").html(result);
          } 
          });
  }else{
    alert("Please select row first"); 
  }
  
});
$(".select_ym").on("change",function(){
var month=$(this).val();
$.ajax(
          {
          url:"ajax/payroll/salary_generate.php",
          method:"post",
          data:{month:month},
          success:function(result){
            $("#target1").html(result);
          } 
          });
})
</script>
    <?php
     extract($_POST);
    //  print_r($_POST);
     if(isset($insert_adjust))
     {
    $insert=mysqli_query($con,"INSERT INTO `employee_adjustment` (`adj_id`, `adj_emp_id`, `amount`, `created_at`) VALUES (NULL,'$employee','$amount','$date1');");
   if($insert){

    //   $userid=$_SESSION['user_idd'];
    //   $activityType='Adjustment Insertion';
    //   $description='Adjusted added for employee '.$emp_id.'';
    //   $table='employee_adjustment';
    //   $column='adj_id';
    //  createUserLogs($userid,$activityType,$description,$table,$column);
    //  $select_username=mysqli_query($con,"select * from users where id='$userid'");
    //  $get_name=mysqli_fetch_array($select_username);
    //  $username=$get_name['name'];
    //  $query ="INSERT INTO `notifications` (`notify_id`, `user_id`, `name`, `type`, `department`, `message`, `status`, `date`) VALUES (NULL, '$userid', '$username', 'Insertion','HR', '$description', 'unread', CURRENT_TIMESTAMP)";
    //   performQuery($query);  
           echo "<script>alert('Adjustment Added')</script>";
            echo "<script>window.open('index.php?monthlypayroll=true','_self')</script>";
        }else{
           echo "<script>alert('Failed to add adjustments')</script>";
            echo "<script>window.open('index.php?monthlypayroll=true','_self')</script>";
        }
     }
     ?>







