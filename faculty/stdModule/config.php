<?php
session_start(); // start session
// connect to database
$con = new mysqli("localhost", "root", "", "awkum_fes");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
try{
$conn=new PDO("mysql:host=localhost;dbname=awkum_fes","root","");
 }catch(PDOException $e)
 {
   die("connection failed".$e->getmessage());
 }  
 $connn = new mysqli("localhost", "root", "", "awkum_fes");
  // Check connection
  if ($connn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
    error_reporting(E_ALL);
  ini_set('display_errors', 1);
  // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__))); // path to the root folder
	define ('INCLUDE_PATH', realpath(dirname(__FILE__) . '/includes' )); // Path to includes folder
	define ('ASSET_PATH', realpath(dirname(__FILE__) . '/assets' )); // Path to assets folder
	define('BASE_URL', 'http://localhost/faculty/'); // the home url of the website

function dateTime(){
  date_default_timezone_set('Asia/Karachi');
  return $date = date('Y-m-d H:i:s', time()); 
}
  ?>