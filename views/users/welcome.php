<?php
session_start();
require_once '../../vendor/autoload.php'; 
// check if last visit is stored in session
// if (isset($_SESSION['last_visit'])) {
//     $lastVisit = $_SESSION['last_visit'];
//     echo "Welcome back! Your last visit was on $lastVisit";
// } else {
//     echo "Welcome to our website!";
// }

// $login_time= date('F j, Y, g:i a');
// $sql="INSERT INTO users (last_visit) VALUES ('$login_time') where id=$_SESSION['user']['id']";
// set current time as last visit
// $_SESSION['last_visit'] = date('F j, Y, g:i a');



$db = new MySqlHandler("users");
$login_time = date('F j, Y, g:i a');
$user_id = $_SESSION['user']['id'];

// select last visit
$sql1="SELECT last_visit FROM users WHERE id='$user_id'";
$ArrayOFLastVist = $db->getResults($sql1);
$last_visit = $ArrayOFLastVist[0]['last_visit'];
if($last_visit){
    echo "Welcome back! Your last visit was on $last_visit";
}
else {
    echo "Welcome to our website!";
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

<button onclick="visitProfile()">profile</button>
<a href="../logout.php">Logout</a>

<script>

    function visitProfile(){
        window.location.href="profile.php";
    }


</script>


</body>
</html>