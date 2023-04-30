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

        <button type="submit">Login</button>
     </form>
</body>
</html>
