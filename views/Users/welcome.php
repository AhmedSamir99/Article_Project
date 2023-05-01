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
if($last_visit){
    echo "
    <div style='background-color:gray; padding:20px;
     text-align:center;
     color:white;      
     width:75%;
     margin:auto;
     border-radius:20px;
     margin-top:10%;        
    '>
        <h1>
            Welcome back! Your last visit was on $last_visit
        </h1>
    </div>
    ";
}
else {
    echo " 
    <h1>
    Welcome to our website!
    </h1>

    ";
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