<?php
 if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];
    $sql = "SELECT * FROM users WHERE token='$token'";
    $result = $dbHandler->executeQuery($sql);
    if ($result) {
        $result = $dbHandler->getResults($sql);
        $email = $result[0]['email'];
        $password = $result[0]['password'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="views/login/style.css">
</head>
<body style="background-image:linear-gradient(180deg,#B5F2DB 10%,#060616 100%);">
     <form  method="post">
     <?php include 'login.php'; ?>
        <!-- <h2>LOGIN</h2> -->
        <div style="display:flex;justify-content: space-around;flex-direction: row;">
        <img src="images/blog1.png" style="width: 40%;">
        </div>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>email </label>
        <input type="email" name="email" placeholder="email"><br>

        <label>password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <div style="display: flex; align-items: center;">
  <input type="checkbox" name="rememberMe" id="rememberMe" style="margin: 0;">
  <label for="rememberMe" style="font-weight: bold; margin-right: 0;padding-right:0"><pre>Remember Me</pre></label>
</div>
  <button type="submit" style="background-color: #060616; color: white; padding: 10px; border-radius: 5px; border: none; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);">Login</button>
</div>
     </form>
</body>
</html>
