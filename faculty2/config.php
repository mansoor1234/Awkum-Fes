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

	// ...More code here ...

function getMultipleRecords($sql, $types = null, $params = []) {
  global $connn;
  $stmt = $connn->prepare($sql);
  if (!empty($params) && !empty($params)) { // parameters must exist before you call bind_param() method
    $stmt->bind_param($types,$params);
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $user;
}
function getSingleRecord($sql, $types, $params) {
  global $connn;
  $stmt = $connn->prepare($sql);
  $stmt->bind_param($types,$params);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $stmt->close();
  return $user;
}
function modifyRecord($sql, $types, $params) {
  global $connn;
  $stmt = $connn->prepare($sql);
  $stmt->bind_param($types,$params);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function dateTime(){
  date_default_timezone_set('Asia/Karachi');
  return $date = date('Y-m-d H:i:s', time()); 
}
function loginCheck(){
  if(count($_SESSION['userPermissions']) ==0 && count($_SESSION['user'])==0){
    $_SESSION['error_msg']="Please login first";
  return header("Location:".BASE_URL."login.php");
  exit();
  }else{
    return true;
  }
}
function lastLogin(){
    global $conn;
    $loginDateTime=dateTime();
    $userID=$_SESSION['user']['User'];
    $lastLogin=$conn->prepare("UPDATE `rbac_user` SET `last_login`=:login  WHERE `id`=:id");
    $lastLogin->bindParam(":login",$loginDateTime);
    $lastLogin->bindParam(":id",$userID);
    $lastLogin->execute(); 
}
function canAccess(){
  global $conn;
  extract($_SESSION);
$length=count($userPermissions); 
$pagename=basename($_SERVER['PHP_SELF']);
foreach ($userPermissions as $key => $value) {
  $menu_=$conn->prepare("SELECT * from rbac_menu_item WHERE menu_id=:menu_id");
  $menu_->bindParam("menu_id",$value['menu_id']);
  $menu_->execute();
  $menu_rows=$menu_->fetch(PDO::FETCH_ASSOC);
  $module=$menu_rows['module'];
  $pages=$menu_rows['page_id'];
  if($value['can_access']==1):?>

 <script>
  var modId="<?php echo $module;?>";
  var page="<?php echo $pages;?>";
  
  $("#"+modId).css("display","block");
  $("#"+page).css("display","block");
</script>
<?php  
endif;

 }
}
function canEdit(){
  global $conn;
  extract($_SESSION);
$length=count($userPermissions); 
$pagename=basename($_SERVER['PHP_SELF']);
foreach ($userPermissions as $key => $value) {
  $menu_=$conn->prepare("SELECT * from rbac_menu_item WHERE menu_id=:menu_id");
  $menu_->bindParam("menu_id",$value['menu_id']);
  $menu_->execute();
  $menu_rows=$menu_->fetch(PDO::FETCH_ASSOC);
  $module=$menu_rows['module'];
  $pages=$menu_rows['page_id']; 
  $page_name1=$menu_rows['page_name'];
  $page_name2=basename($_SERVER['PHP_SELF']);
  if($page_name1==$page_name2){
  $menu_value=$conn->prepare("SELECT * from `rbac_permissions` WHERE menu_id=:menu_id AND role_id=:role");
  $menu_value->bindParam("menu_id",$value['menu_id']);
  $menu_value->bindParam("role",$value['role_id']);
  $menu_value->execute();
  $canEdit=$menu_value->fetch(PDO::FETCH_ASSOC);
  if($canEdit['can_edit']==0){
 ?>
 <script>
   $(".editBtn").attr("disabled","disabled");
 </script>
 <?php
  }
  }
}

}
function canDelete(){
  global $conn;
  extract($_SESSION);
$length=count($userPermissions); 
$pagename=basename($_SERVER['PHP_SELF']);
foreach ($userPermissions as $key => $value) {
  $menu_=$conn->prepare("SELECT * from rbac_menu_item WHERE menu_id=:menu_id");
  $menu_->bindParam("menu_id",$value['menu_id']);
  $menu_->execute();
  $menu_rows=$menu_->fetch(PDO::FETCH_ASSOC);
  $module=$menu_rows['module'];
  $pages=$menu_rows['page_id']; 
  $page_name1=$menu_rows['page_name'];
  $page_name2=basename($_SERVER['PHP_SELF']);
  if($page_name1==$page_name2){
  $menu_value=$conn->prepare("SELECT * from `rbac_permissions` WHERE menu_id=:menu_id AND role_id=:role");
  $menu_value->bindParam("menu_id",$value['menu_id']);
  $menu_value->bindParam("role",$value['role_id']);
  $menu_value->execute();
  $canDelete=$menu_value->fetch(PDO::FETCH_ASSOC);
  if($canDelete['can_delete']==0){
 ?>
 <script>
   $(".deleteBtn").attr("disabled","disabled");
 </script>
 <?php
  }
  }
}
}
function canCreate(){
  global $conn;
  extract($_SESSION);
$length=count($userPermissions); 
$pagename=basename($_SERVER['PHP_SELF']);
foreach ($userPermissions as $key => $value) {
  $menu_=$conn->prepare("SELECT * from rbac_menu_item WHERE menu_id=:menu_id");
  $menu_->bindParam("menu_id",$value['menu_id']);
  $menu_->execute();
  $menu_rows=$menu_->fetch(PDO::FETCH_ASSOC);
  $module=$menu_rows['module'];
  $pages=$menu_rows['page_id']; 
  $page_name1=$menu_rows['page_name'];
  $page_name2=basename($_SERVER['PHP_SELF']);
  if($page_name1==$page_name2){
  $menu_value=$conn->prepare("SELECT * from `rbac_permissions` WHERE menu_id=:menu_id AND role_id=:role");
  $menu_value->bindParam("menu_id",$value['menu_id']);
  $menu_value->bindParam("role",$value['role_id']);
  $menu_value->execute();
  $canCreate=$menu_value->fetch(PDO::FETCH_ASSOC);
  if($canCreate['can_create']==0){
 ?>
 <script>
   $(".createBtn").attr("disabled","disabled");
 </script>
 <?php
  }
  }
}
}
?>