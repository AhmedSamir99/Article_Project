   <?php
   session_start();
   ?>
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
   style="background-image:linear-gradient(180deg,#B5F2DB 10%,#060616 100%); z-index: 999999;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../views/Extra/dashboard.php"style="transform: rotate(14deg)">
  <div class="sidebar-brand-icon rotate-n-15">
    <img src="../../images/blog1.png" style="width: 120%; height: 43px;transform: rotate(14deg)">
  </div>
  <div class="sidebar-brand-text mx-3"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="../../views/Extra/dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt fs-5"></i>
    <span style='font-size:1.1vw'>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider bg-light">

<?php
if($_SESSION['user']['type']=="admin"||$_SESSION['user']['type']=="editor")
{
  echo('
  <!-- Nav Item - Comments -->
  <li class="nav-item">
    <a class="nav-link" href="../../views/Groups/index.php">
      <i class="fas fa-fw fa-users fs-5"></i>
      <span class="fs-5">Groups</span></a>
  </li>
  ');
  echo('
<!-- Nav Item - Admin -->
<li class="nav-item">
  <a class="nav-link" href="../../views/Users/all.php">
    <i class="fas fa-fw fa-user-friends fs-5"></i>
    <span class="fs-5">Users</span></a>
</li>
');
echo('
<!-- Nav Item - Comments -->
<li class="nav-item">
  <a class="nav-link" href="../../views/Articles/all.php">
    <i class="fas fa-fw fa-newspaper fs-5"></i>
    <span class="fs-5">Articles</span></a>
</li>
');
//  Nav Item - Charts 
echo('
<!-- Nav Item - Comments -->
<li class="nav-item">
  <a class="nav-link" href="../../views/Extra/chart.php">
  <i class="fas fa-fw fa-chart-area fs-5"></i>
  <span class="fs-5">Charts</span></a>
</li>
');
}
?>

<li class="nav-item">
  <a class="nav-link" href="../../views/Users/profile.php">
    <i class="fas fa-fw fa-user fs-5"></i>
    <span class="fs-5">Profile</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">


<!-- Divider -->
<hr class="sidebar-divider bg-light">

<li class="nav-item">
<a class="nav-link fs-5" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fs-5"></i>
                  Logout
                </a>
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
          <div class="custom-control custom-switch mt-3" style="margin-left: 20px;">
          <ul class="navbar-nav mr-auto">
<!-- dark mood button -->
<!-- <div class="custom-control custom-switch mt-3 mr-3" style="flex-shrink: 0;">
  <input type="checkbox" class="custom-control-input" id="darkSwitch">
  <label class="custom-control-label mr-2 d-none d-lg-inline text-gray-600 small fs-5" for="darkSwitch" style="font-weight: bold;">Dark mode</label>
</div> -->

            <div class="topbar-divider d-none d-sm-block"></div>
              
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small fs-5">
                <?php
                //calling the session variable
                  $name=$_SESSION["name"];
                  echo "$name";
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="../../images/usericon.png">
              </a>
      
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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

          <form action="../../index.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>
        </div>
      </div>
    </div>
  </div>
 