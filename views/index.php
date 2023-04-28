
<?php

session_start(); 
include "db_conn.php";

if(isset($_COOKIE['token'])){
	$token = $_COOKIE['token'];
	$sql = "SELECT * FROM users WHERE token='$token'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		$email = $row['email'];
		$password = $row['password'];
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>email </label>
     	<input type="email" name="email" value="<?php if(isset($email)) {echo $email; } ?>" placeholder="email"><br>

     	<label>password</label>
     	<input type="password" name="password" value="<?php if(isset($password)) {echo $password; } ?>" placeholder="Password"><br>

     	<button type="submit">Login</button>
        
       <div class="form-group">
       <input type="checkbox" name="rememberMe" id="rememberMe"> <label for="rememberMe">Remember me
</div>
        <a href="forgot_password.php" class="link-primary"> forgot password</a>
     </form>
</body>
</html>