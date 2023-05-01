<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php'); 
?>

<?php
// session_start();

include "../../dbcon.php";

class Dashboard {
  private $con;

  public function __construct($con) {
    $this->con = $con;
  }

  public function getNumArticles() {
    $articles = "SELECT COUNT(*) from articles;";
    $num_articles = mysqli_query($this->con, $articles);
    $n_ar = mysqli_fetch_array($num_articles);
    return $n_ar[0];
  }

  public function getNumGroups() {
    $groups = "SELECT COUNT(*) from groups;";
    $num_groups = mysqli_query($this->con, $groups);
    $n_gr = mysqli_fetch_array($num_groups);
    return $n_gr[0];
  }

  public function getNumUsers() {
    $users = "SELECT COUNT(*) from users;";
    $num_users = mysqli_query($this->con, $users);
    $n_us = mysqli_fetch_array($num_users);
    return $n_us[0];
  }

  public function render() {
    $n_ar = $this->getNumArticles();
    $n_gr = $this->getNumGroups();
    $n_us = $this->getNumUsers();
   
    echo('
      <!-- Begin Page Content -->
      <div class="container-fluid ">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-tachometer-alt "></i>Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row w-134" style="width: 134%!important">

          <div class="col-xl-3 col-md-6 mb-4" >
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Articles</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <h4>Articles:' . $n_ar .'</h4>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Groups</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <h4>Groups:' . $n_gr .'</h4>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4" >
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <h4>Users:' . $n_us .'</h4>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ');

    include('../../includes/scripts.php');
    include('../../includes/footer.php');
  }
}

$dashboard = new Dashboard($con);
$dashboard->render();
?>