<?php
// session_start();
// require_once '../vendor/autoload.php'; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email=$_POST["email"];
        $password=$_POST["password"];  
        $dbHandler = new MySqlHandler('users');
        $sql="select * from users where email='".$email."' and password='".$password."'"; 

        $result = $dbHandler->getResults($sql);

        if ($result) {
            $_SESSION['logged']=true; //the user is logged in
            $type = $result[0]['type']; // fetch the first row of the result set
            $_SESSION['type'] = $type;
            if($type=="admin"){
                // header("Location:../index.php");
                header("Location:views/articles/all.php");
            }
            elseif($type=="editor"){
                header("Location:./users/all.php");
            }
        } else {
            echo "Invalid email or password";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <section>
        <div class="form-box" >
            <div class="form-value">
    <form id="form" action="#" method="post" name="contactForm" >
    <div class="inputbox">
        <input type="password" name="password" >
        <label for="">password</label>
    </div>

    <div class="inputbox">    
        <input type="input" name="email" >
        <label for="">Email</label>

    </div>    

    <div style="display: flex; flex-direction: row;">
        <button type="submit">Login</button> 
    </div>
    </form>
</div>
</div> 
</section>   
</body>
</html>