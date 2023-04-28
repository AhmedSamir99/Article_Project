   <?php
   session_start();
   ?>
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
   style="background-image:linear-gradient(180deg,#B5F2DB 10%,#060616 100%); z-index: 999999;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
  <img src="blog1.png" style="width: 120%; height: 43px; transform: rotate(14deg);"> </div>
  <div class="sidebar-brand-text mx-3"></div>
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
<hr class="sidebar-divider bg-light">



<li class="nav-item">
  
  <a class="nav-link" href="groups.php">  <!-- href="views/Groups/index.php"  -->
    <i class="fas fa-fw fa-users"></i>
    <span>groups</span></a>
</li>



<!-- Nav Item - Admin -->
<li class="nav-item">
  <a class="nav-link" href="views/Users/index.php">
    <i class="fas fa-fw fa-user "></i>
    <span>Users</span></a>
</li>


<!-- Nav Item - Comments -->
<li class="nav-item">
  <a class="nav-link" href="views/Articles/index.php">
    <i class="fas fa-fw fa-newspaper "></i>
    <span>Articles</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="chart.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars" style="color:#ABE5D2"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
           <li class="nav-item">
                        <a class="nav-link" href="#" style="color:grey">login</a>
           </li>
           <li class="nav-item">
                        <a class="nav-link" href="#" style="color:grey">signup</a>
           </li>
           
           
            <div class="topbar-divider d-none d-sm-block"></div>
            
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php
                //calling the session variable
                  $name=$_SESSION["name"];
                  $pic=$_SESSION["pic"];
                  echo "$name";
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="<?php echo "$pic";?>">
              </a>
      
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="../index.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>
  