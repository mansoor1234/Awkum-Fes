<?php 
session_start();
unset($_SESSION["stdID"]);
unset($_SESSION["stdEMAIL"]);
unset($_SESSION["stdNAME"]);
unset($_SESSION["stdREG"]);
$_SESSION['success2']="Logged Out Successfully";
header("Location:../../index2.php");
 ?>