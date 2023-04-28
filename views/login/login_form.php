<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="views/login/style.css">
</head>
<body>
     <form  method="post">
     <?php include 'login.php'; ?>
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>email </label>
        <input type="email" name="email" placeholder="email"><br>

        <label>password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
     </form>
</body>
</html>
