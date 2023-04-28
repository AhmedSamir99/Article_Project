<?php 
session_start(); 
include "db_conn.php";

function generateRandomString($length = 15) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

   
    if(empty($_POST['email']) && empty($_POST['password'])) {
        header("Location: index.php?error=data is required");
	   
       } 
	else if (empty($email)) {
		header("Location: index.php?error=email is required");
	    exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo "enter valid email";}
    
    else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
				$token = generateRandomString(7);
				
				$sql = "UPDATE users SET token='$token' WHERE email='$email' AND password='$pass'";
				$result = mysqli_query($conn, $sql);
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect email or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect email or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

