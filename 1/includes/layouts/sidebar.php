

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo BASE_URL;?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TEF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo BASE_URL;?>assets/img/users/<?php echo $_SESSION['user']['IMAGE']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user']['FNAME']; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview" id="Students" style="display: ;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="Campuses" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/campus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Campus</p>
                </a>
              </li>
               <li class="nav-item" id="Department" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item" id="Program" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/program.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Program</p>
                </a>
              </li>
              <li class="nav-item" id="Semesters" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/semesters.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semesters</p>
                </a>
              </li>
              <li class="nav-item" id="Courses" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/courses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item" id="studentList" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/students.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              
              <!-- <li class="nav-item" id="studentList" style="display: ;">
                <a href="<?php echo BASE_URL;?>modules/students/studentRegstNo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration No</p>
                </a>
              </li> -->
            </ul>
          </li>
        <li class="nav-item has-treeview" id="Users" style="display: none;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="usersList" style="display: none;">
                <a href="<?php echo BASE_URL;?>modules/users/usersList.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview" id="Permissions" style="display: none;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Role Permissions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="display: none;" id="permissionSetup">
                <a href="<?php echo BASE_URL;?>modules/rolePermissions/permissionSetup.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions Setup</p>
                </a>
              </li>
              <li class="nav-item" style="display: none;"  id="addRole">
                <a href="<?php echo BASE_URL;?>modules/rolePermissions/addRole.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Role</p>
                </a>
              </li>
              <li class="nav-item" style="display: none;" id="userRole">
                <a href="<?php echo BASE_URL;?>modules/rolePermissions/userRole.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Role</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>