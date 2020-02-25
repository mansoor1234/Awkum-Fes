
<?php 
$con = new mysqli("localhost", "root", "", "awkum_fes");
extract($_POST);
if(isset($stdlogin))
{
$password=md5($password);
$check=$conn->prepare("SELECT * FROM students WHERE reg_no=:reg AND password=:password");
$check->bindParam(":reg",$email);
$check->bindParam(":password",$password);
$check->execute();
$count=$check->rowCount();
$rows=$check->fetchAll(PDO::FETCH_ASSOC);
if($count==1){
$_SESSION['stdID']=$rows[0]['srno'];
$_SESSION['stdEMAIL']=$rows[0]['email'];
$_SESSION['stdNAME']=$rows[0]['name'];
$_SESSION['stdREG']=$rows[0]['reg_no'];
$_SESSION['success2']="You are now logged in.";
header("Location:stdModule/questions/evaluation.php");
}else{
$_SESSION['error2']="Incorrect registration number or password.";	
}
}
?>
