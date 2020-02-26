<?php
  // Accept a user ID and returns true if user is admin and false if otherwise
  function isAdmin($user_id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id=? AND role_id IS NOT NULL LIMIT 1";
    $user = getSingleRecord($sql, 'i', [$user_id]); // get single user from database
    if (!empty($user)) {
      return true;
    } else {
      return false;
    }
  }
  function loginById($user_id) {
    global $conn;
    $getRole =$conn->prepare("SELECT rbac_role.role_id as Role, rbac_user.id as User,rbac_user.firstname as FNAME,rbac_user.lastname as LNAME,rbac_user.id as User,rbac_user.email as EMAIL,rbac_role.role_name as ROLENAME,rbac_user.image as IMAGE,rbac_user.status as STATUS FROM rbac_role_access_table INNER JOIN rbac_role ON rbac_role_access_table.role_id = rbac_role.role_id INNER JOIN rbac_user ON rbac_role_access_table.user_id = rbac_user.id WHERE rbac_user.id=:uid LIMIT 1");
    $getRole->bindParam(":uid",$user_id);
    $getRole->execute();
    $user=$getRole->fetch(PDO::FETCH_ASSOC);
    print_r($user);
    if($user['STATUS']==0){
      $_SESSION['error_msg'] = "User is disabled please contact your admin";
      header('location: ' . BASE_URL . 'login.php');
    }elseif(empty($user) || $user['Role']==''){
      $_SESSION['error_msg'] = "Role not assigned";
      header('location: ' . BASE_URL . 'login.php');
    }
    elseif (!empty($user)) {
      // put logged in user into session array
        $_SESSION['user'] = $user;
        $_SESSION['success_msg'] = "You are now logged in";
        $permissionsSql=$conn->prepare("SELECT * from rbac_permissions WHERE role_id=:role_id");
        $permissionsSql->bindParam("role_id",$user['Role']);
        $permissionsSql->execute();
        $userPermissions=$permissionsSql->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['userPermissions'] = $userPermissions;
        lastLogin();
        $_SESSION['success_msg'] = "You are now logged in";
        unset($_SESSION['error_msg']);
        header('location: ' . BASE_URL . 'index.php');
      exit(0);
    }
  }

// Accept a user object, validates user and return an array with the error messages
  function validateUser($user, $ignoreFields) {
  		global $conn;
      $errors = [];
      // password confirmation
      if (isset($user['passwordConf']) && ($user['password'] !== $user['passwordConf'])) {
        $errors['passwordConf'] = "The two passwords do not match";
      }
      // if passwordOld was sent, then verify old password
      if (isset($user['passwordOld']) && isset($user['user_id'])) {
        $sql = "SELECT * FROM users WHERE id=? LIMIT 1";
        $oldUser = getSingleRecord($sql, 'i', [$user['user_id']]);
        $prevPasswordHash = $oldUser['password'];
        if (!password_verify($user['passwordOld'], $prevPasswordHash)) {
          $errors['passwordOld'] = "The old password does not match";
        }
      }
      // the email should be unique for each user for cases where we are saving admin user or signing up new user
      if (in_array('save_user', $ignoreFields) || in_array('signup_btn', $ignoreFields)) {
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $oldUser = getSingleRecord($sql, 'ss', [$user['email'], $user['username']]);
        if (!empty($oldUser['email']) && $oldUser['email'] === $user['email']) { // if user exists
          $errors['email'] = "Email already exists";
        }
        if (!empty($oldUser['username']) && $oldUser['username'] === $user['username']) { // if user exists
          $errors['username'] = "Username already exists";
        }
      }

      // required validation
  	  foreach ($user as $key => $value) {
        if (in_array($key, $ignoreFields)) {
          continue;
        }
  			if (empty($user[$key])) {
  				$errors[$key] = "This field is required";
  			}
  	  }
  		return $errors;
  }
  // upload's user profile profile picture and returns the name of the file
  function uploadProfilePicture()
  {
    // if file was sent from signup form ...
    if (!empty($_FILES) && !empty($_FILES['profile_picture']['name'])) {
        // Get image name
        $profile_picture = date("Y.m.d") . $_FILES['profile_picture']['name'];
        // define Where image will be stored
        $target = ROOT_PATH . "/assets/images/" . $profile_picture;
        // upload image to folder
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target)) {
          return $profile_picture;
          exit();
        }else{
          echo "Failed to upload image";
        }
    }
  }
  ?>