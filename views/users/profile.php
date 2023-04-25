<?php
    require_once("../../vendor/autoload.php");
    session_start();
    $dbHandler = new MySqlHandler('users');
    $dbHandler2 = new MySqlHandler('groups');

    if(isset($_SESSION["logged"]) ==true && $_SESSION['type'] == 'user') {
    
    $sql = "SELECT u.*, g.name as group_name FROM users u JOIN groups g ON u.group_id = g.id";

    $sql2="SELECT name FROM groups WHERE id=".$_SESSION['user']['group_id'];

    $groups= $dbHandler2->getResults($sql2);

    //   }
    }
        else{
            die("You are not allowed");
        }

?>


<!DOCTYPE html>
<html>
  <head>
    <title>My Profile</title>
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
    <div class="header">
      <h1>My Profile</h1>
    </div>
    <div class="container">
      <img class="profile-picture" src="../../images/avatar.png" alt="Profile Picture">
      <div class="info">
        <h2><?php echo $_SESSION['user']['name'] ?> </h2>
        <p><?php echo $_SESSION['user']['type'] ?></p>
        <p><?php echo $_SESSION['user']['email'] ?></p>
        <p><?php echo $_SESSION['user']['mobile_number'] ?></p>
        <p><?php echo $_SESSION['user']['username'] ?></p>
        <p>Group: <?php echo $groups[0]['name'] ?></p>
      </div>
    </div>
  </body>
</html>

