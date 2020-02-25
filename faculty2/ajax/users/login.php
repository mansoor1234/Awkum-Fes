<?php 
include('../../config.php');
include('../../includes/common_functions.php');
if (isset($_POST['loginBtn'])) {
	// validate form values
	
	$username = $_POST['username'];
	$password = $_POST['password']; // don't escape passwords.

	if (empty($errors)) {
		$sql = "SELECT * FROM rbac_user WHERE username=? OR email=? LIMIT 1";
		$user = getSingleRecord($sql, 'ss', [$username, $username]);

		if (!empty($user)) { // if user was found
			if (password_verify($password, $user['password'])) { // if password matches
				// log user in
				loginById($user['id']);
			} else { // if password does not match
				$_SESSION['error_msg'] = "Wrong credentials";
			}
		} else { // if no user found
			$_SESSION['error_msg'] = "Wrong credentials";
		}
	}
}

 ?>