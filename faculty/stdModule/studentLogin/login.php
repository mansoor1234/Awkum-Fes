
<?php 
include("stdModule/config.php");
extract($_POST);
if(isset($stdlogin))
{
$password=md5($password);
$check=$conn->prepare("SELECT * FROM students WHERE reg_no=:reg AND password=:password ");
$check->bindParam(":reg",$email);
$check->bindParam(":password",$password);
$check->execute();
$count=$check->rowCount();
$rows=$check->fetchAll(PDO::FETCH_ASSOC);

if(isset($rows[0]['status'])){
$status=$rows[0]['status']; 
if($count==1 && $status=='1'){
$_SESSION['stdID']=$rows[0]['srno'];
$_SESSION['stdEMAIL']=$rows[0]['email'];
$_SESSION['stdNAME']=$rows[0]['name'];
$_SESSION['stdREG']=$rows[0]['reg_no'];
$_SESSION['success2']="You are now logged in.";
header("Location:stdModule/questions/evaluation.php");
}elseif($status==0){
$_SESSION['error2']="You can't login now.";	
}
}else{
$_SESSION['error2']="Incorrect registration number or password.";	
}
}
?>
