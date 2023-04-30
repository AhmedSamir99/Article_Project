<?php
  include('../../includes/header.php'); 
  include('../../includes/navbar.php'); 
  require_once '../../vendor/autoload.php'; 
  
  $DBHandler = new MySqlHandler('users');
  $DBHandler2 = new MySqlHandler('groups');

  if(isset($_SESSION["logged"]) == true && $_SESSION['type'] == 'user') {
    $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id";
    $sql2 = "SELECT name FROM groups WHERE id=".$_SESSION['user']['group_id'];
    $groups = $DBHandler2->getResults($sql2);
?>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }
    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    h1 {
      margin: 0;
      font-size: 36px;
      font-weight: bold;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .profile-picture {
      display: block;
      margin: 0 auto;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
    }
    .info {
      margin-top: 20px;
      text-align: center;
    }
    h2 {
      font-size: 24px;
      margin-bottom: 0;
    }
    p {
      font-size: 18px;
      color: #777;
    }
  </style>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h3>My Profile</h3>
          <a href="../Extra/dashboard.php" class="btn btn-danger">Back </a>
        </div>
        <div class="card-body">
          <img class="profile-picture" src="../../images/user.png" alt="Profile Picture">
          <div class="info">
            <h2><?php echo $_SESSION['user']['name'] ?> </h2>
            <p><?php echo $_SESSION['user']['type'] ?></p>
            <p><?php echo $_SESSION['user']['email'] ?></p>
            <p><?php echo $_SESSION['user']['mobile_number'] ?></p>
            <p><?php echo $_SESSION['user']['username'] ?></p>
            <?php if(isset($groups[0]['name'])): ?>
              <p>Group: <?php echo $groups[0]['name'] ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php
  } else {
  ?>
    <div class="container">
    <h1 class="h3 m-3 text-gray-800"><i class="fas fa-fw fa-user "></i>Profile</h1>
      <div class="card">
        <div class="card-header">
          <h3>You are not allowed</h3>
        </div>
        <div class="card-body">
          <p>Please log in as a user to access this page.</p>
          <a href="../../" class="btn btn-primary mt-3">Log In</a>
        </div>
      </div>
    </div>
  <?php
  }
  include('../../includes/scripts.php');
  ?>
  <div class="fixed-footer fixed-bottom bg-white">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; .blog 2023</span>
    </div>
  </div>