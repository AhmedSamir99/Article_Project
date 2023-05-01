<?php
include('../../includes/header.php'); 
include('../../includes/navbar.php'); 
require_once '../../vendor/autoload.php';

$db = new MySqlHandler("users");
$login_time = date('F j, Y, g:i a');
$user_id = $_SESSION['user']['id'];

// select last visit
$sql1="SELECT last_visit FROM users WHERE id='$user_id'";
$ArrayOFLastVist = $db->getResults($sql1);
$last_visit = $ArrayOFLastVist[0]['last_visit'];
echo'
    <style>
    .text-custom {
      color: #98D0C0;
    }
    .border-left-custom {
      border-left: 7px solid #B5F2DB;
    }
    @keyframes rotate-hand {
        0% { transform: rotate(0deg); }
        50% { transform: rotate(45deg); }
        100% { transform: rotate(0deg); }
      }
    .fa-rotate-45 {
        transform: rotate(45deg);
        animation-name: rotate-hand;
        animation-duration: 1s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
      }
  </style>';
if($last_visit){
    echo'
  <div class="row">
    <div class="col-8 offset-2">
      <div class="card border-left-custom shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col m-2">
              <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">Your last visit was on</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h4>' . $last_visit .'</h4>
              </div>
              <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                Welcome back! &nbsp;<i class="fas fa-hand-wave fa-2x "></i>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hand-paper fa-2x fa-rotate-45 text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';
}
else {
    echo'
    <div class="row">
  <div class="col-8 offset-2">
    <div class="card border-left-custom shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col text-center">
            <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
              <h4>Welcome to our site!&nbsp;<i class="fas fa-hand-paper fa-2x fa-rotate-45 fa-2x text-gray-300"></i></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    ';
}

$sql2 = "UPDATE users SET last_visit = '$login_time' WHERE id = '$user_id'";
$result= $db->executeQuery($sql2);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include('../../includes/scripts.php');
    include('../../includes/footer.php');
?>
</body>
</html>