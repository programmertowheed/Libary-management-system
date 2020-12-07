<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Alerts -->
      <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
 <?php
    $id = Session::get("libraryuserId");
    $userquery = "SELECT * FROM tbl_user WHERE id ='$id'";
    $userred = $db->select($userquery);
    while($userres = mysqli_fetch_assoc($userred)){
      $name    = $userres['username'] ;
      $mobile  = $userres['mobile'] ;
      $email   = $userres['userEmail'] ;
      $role    = $userres['role'] ;
      $img     = $userres['picture'] ;
    }
?>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name;?></span>
          <img class="img-profile rounded-circle" src="assets/img/<?php echo $img;?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="editprofile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Edit profile
          </a>
          <a class="dropdown-item" href="changepassword.php">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Password
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>