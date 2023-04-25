<?php
require_once '../../vendor/autoload.php'; 

$dbHandler = new MySqlHandler('users');

$error_message="";
$error_name="";
$error_email="";
$error_number="";
$error_password="";
$error_username="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
    // if(!empty($_POST)){}

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $type = $_POST['type'];
    $group_id = $_POST['group_id'];



        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['mobilenumber']) || empty($_POST['username'])) {        
            $error_message = "All fields are required";
        }


        if(strlen($name)>MAX_LENGTH ){

          $error_name = "Name is too long";
        }
        elseif(strlen($name)<MIN_LENGTH){
            $error_name = "Name is too short";
        }
    
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_email="please enter a valid email address";
        }
        else {
            $sql= "SELECT COUNT(*) FROM users WHERE email='$email'";
            $result = $dbHandler->getResults($sql);
            if($result[0]["count(*)"] > 0 ){
                $error_email="email already exists";
            }
        }
        


        if($mobilenumber != MOBILENUMBER_MIN_LENGTH){
            $error_number="please enter a valid mobile number with 10 digits";

        }

        if(strlen($password)<PASS_MIN_LENGTH ){
            $error_password="password is too short it must be more than 5";
        }
        elseif(strlen($password)>PASS_MAX_LENGTH){
            $error_password="password is too long it must be less than 20";
        }

        if(strlen($username)>MAX_LENGTH ){
            $error_username="username is too long";
        }
        elseif(strlen($username)<MIN_LENGTH){
            $error_username="username is too short";
        }
        
        

 
    
    if($error_name=="" && $error_message=="" && $error_email=="" && $error_number=="" && $error_password=="" && $error_username==""){
        $sql = "INSERT INTO users (name, email, mobile_number,password,username, type, group_id) VALUES ('$name', '$email', '$mobilenumber','$password','$username', '$type', '$group_id')";
        $result = $dbHandler->executeQuery($sql);
        

        if ($result) {
        header("Location:all.php");
        }   
    }
    
    }
    
    
    
    function remember_Variable($var){
        if(isset($_POST[$var])&&!empty($_POST[$var])){
            return $_POST[$var];
    }}

    

    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo remember_Variable("name");?>"><br>
        <?php  if(isset($error_name)){
                echo $error_name;
        }  ?>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo remember_Variable("email");?>"><br>
        <?php  if(isset($error_email)){
                echo $error_email;
        }  ?>
        <br>
        <label for="mobilenumber">Mobile Number:</label>
        <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo remember_Variable("mobilenumber");?>"><br>
        <?php  if(isset($error_number)){
                echo $error_number;
        }  ?>
        <br>
        <label for="mobilenumber">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo remember_Variable("password");?>"><br>
        <?php  if(isset($error_password)){
            echo $error_password;
        }  ?>
        <br>
        <label for="mobilenumber">User Name:</label>
        <input type="text" id="username" name="username" value="<?php echo remember_Variable("username");?>"><br>
        <?php  if(isset($error_username)){
            echo $error_username;
        }  ?>
        <br>
        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="user">User</option>
         
        </select><br>
        <label for="group_id">Group Name:</label>
        <select id="group_id" name="group_id">
            <?php
            $dbHandler = new MySqlHandler('groups'); 
            $groups = $dbHandler->getData();

            // Loop through groups and create options for dropdown menu
            foreach ($groups as $group) {
                echo '<option value="' . $group['id'] . '">' . $group['name'] . '</option>';
            }
            ?>
        </select><br>
        
        <input type="submit" value="Submit">
        <?php if (isset($error_message)) {
            echo $error_message;
        }
        ?>
    </form>
</body>
</html>


