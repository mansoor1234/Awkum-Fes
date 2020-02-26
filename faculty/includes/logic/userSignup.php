<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<?php

if (isset($_POST['loginBtn'])) {
	// validate form values

	$username = $_POST['username'];
	$password = $_POST['password']; // don't escape passwords.

	if (isset($username) && isset($password)) {
		$password=md5($password);
		$getUser =$conn->prepare("SELECT * FROM rbac_user WHERE  user_type='1' AND  email=:username OR lastname=:username LIMIT 1");
        $getUser->bindParam(":username",$username);
        $getUser->bindParam(":password",$password);
        $getUser->execute();
        $user=$getUser->fetch(PDO::FETCH_ASSOC);
		$pass=$user['password'];
		if (!empty($user) && $pass==$password) { 
            loginById($user['id']);
             
		} else { // if no user found
			 $_SESSION['error_msg'] = "Wrong credentials";
		}
	}
}