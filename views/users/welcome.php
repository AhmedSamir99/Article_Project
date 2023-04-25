<?php
session_start();

// check if last visit is stored in session
if (isset($_SESSION['last_visit'])) {
    $lastVisit = $_SESSION['last_visit'];
    echo "Welcome back! Your last visit was on $lastVisit";
} else {
    echo "Welcome to our website!";
}

// set current time as last visit
$_SESSION['last_visit'] = date('F j, Y, g:i a');
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

<script>

    function visitProfile(){
        window.location.href="profile.php";
    }


</script>


</body>
</html>