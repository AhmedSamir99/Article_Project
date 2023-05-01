<?php

function generateRandomString($length = 15) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;//to get me 15 random no
}

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
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=email is not valid");
        exit();
    } elseif(empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        $result = $dbHandler->executeQuery($sql);

        if ($result) {
            $result = $dbHandler->getResults($sql);
            if($result == Null){
                header("Location: index.php?error=Your Email or Password is in correct");
                exit();
            }
            $row=$result[0];
            if ($result[0]['email'] === $email && $result[0]['password'] === $pass) {
                $token = generateRandomString(7);

                $sql = "UPDATE users SET token='$token' WHERE email='$email' AND password='$pass'";
                $result=$dbHandler->executeQuery($sql);
                    setcookie('token', $token, time() + (86400 * 30), "/");

                $_SESSION['logged']=true; //the user is logged in
                $_SESSION['type'] = $row['type'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user']=$row;
                if ($_SESSION['type'] == 'user'){
                    header("Location:views/Users/welcome.php");
                }
                else{
                    header("Location:views/Extra/dashboard.php");
                    exit();
                }
            }
        }
    }
}
?>
