<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$_POST["email"];
    $password=$_POST["password"];
    

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if(empty($_POST['email']) && empty($_POST['password'])) {
        header("Location: index.php?error=data is required");

    } elseif (empty($email)) {
        header("Location: index.php?error=email is required");
        exit();
    }
    //    else if (!filter_var($uname, FILTER_VALIDATE_EMAIL)) {
    //         echo "enter valid email";}

    elseif(empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {


        $sql="select * from users where email='".$email."' and password='".$password."'";

        $result = $dbHandler->getResults($sql);

        if ($result) {
            $_SESSION['logged']=true; //the user is logged in
            $_SESSION['type'] = $result[0]['type'];
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['email'] = $result[0]['email'];
            $user=$result[0];
            $_SESSION['user']=$user;
            header("Location:views/Extra/dashboard.php");
            exit();
        }
    }
}

?>
