<?php
require_once '../vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form has been submitted, process the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $type = $_POST['type'];
    $group_id = $_POST['group_id'];

    $dbHandler = new MySqlHandler('users');

    // Insert the form data into the users table
    $sql = "INSERT INTO users (name, email, mobile_number,password,username, type, group_id) VALUES ('$name', '$email', '$mobilenumber','$password','$username', '$type', '$group_id')";
    $result = $dbHandler->executeQuery($sql);

    if ($result) {
        header("Location:../index.php");
    } 
}
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
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="mobilenumber">Mobile Number:</label>
        <input type="text" id="mobilenumber" name="mobilenumber"><br>
        <label for="mobilenumber">Password:</label>
        <input type="password" id="password" name="password"><br>
        <label for="mobilenumber">User Name:</label>
        <input type="text" id="username" name="username"><br>
        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="user">User</option>
         
        </select><br>
        <label for="group_id">Group ID:</label>
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
    </form>
</body>
</html>
