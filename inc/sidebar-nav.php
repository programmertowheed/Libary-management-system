<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book-reader"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Libary Mangement</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
    Interface
  </div> -->

  <!-- Nav Item Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentarea" aria-expanded="true" aria-controls="studentarea">
      <i class="fas fa-user"></i>
      <span>Student</span>
    </a>
    <div id="studentarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Students area:</h6>
        <a class="collapse-item" href="addstudent.php">Add Student</a>
        <a class="collapse-item" href="studentlist.php">Student List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#departmenrarea" aria-expanded="true" aria-controls="departmenrarea">
      <i class="fas fa-fw fa-cog"></i>
      <span>Department</span>
    </a>
    <div id="departmenrarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Departments area:</h6>
        <a class="collapse-item" href="adddepartment.php">Add Department</a>
        <a class="collapse-item" href="departmentlist.php">Department List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#authorarea" aria-expanded="true" aria-controls="authorarea">
      <i class="fas fa-user"></i>
      <span>Author</span>
    </a>
    <div id="authorarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Authors area:</h6>
        <a class="collapse-item" href="addauthor.php">Add Author</a>
        <a class="collapse-item" href="authorlist.php">Author List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bookarea" aria-expanded="true" aria-controls="bookarea">
      <i class="fas fa-book"></i>
      <span>Book</span>
    </a>
    <div id="bookarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Books area:</h6>
        <a class="collapse-item" href="addbook.php">Add Book</a>
        <a class="collapse-item" href="booklist.php">Book List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#issuebookarea" aria-expanded="true" aria-controls="issuebookarea">
      <i class="fas fa-book"></i>
      <span>Book Issue</span>
    </a>
    <div id="issuebookarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Issues Book area:</h6>
        <a class="collapse-item" href="addissuebook.php">Issue Book</a>
        <a class="collapse-item" href="issuebooklist.php">Issue Book List</a>
      </div>
    </div>
  </li>

  <!-- Nav Item Collapse Menu End-->
 

 
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Design and develop by programmertowheed-->
      <!-- URL: https://www.programmertowheed.com -->

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>