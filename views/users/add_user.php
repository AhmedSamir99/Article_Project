<?php
require_once '../../vendor/autoload.php';
require_once 'user_validation.php';

$dbHandler = new MySqlHandler('users');

$error_message = $error_name = $error_email = $error_number = $error_password = $error_username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $type = $_POST['type'];
    $group_id = $_POST['group_id'];

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['mobilenumber']) || empty($_POST['username'])) {
        $error_message = "All fields are required";
    }

    $error_name = validateName($name);
    $error_email = validateEmail($email, $dbHandler);
    $error_number = validateMobileNumber($mobilenumber);
    $error_password = validatePassword($password);
    $error_username = validateUsername($username);

    if ($error_name == "" && $error_message == "" && $error_email == "" && $error_number == "" && $error_password == "" && $error_username == "") {
try {
    $sql = "INSERT INTO users (name, email, mobile_number,password,username, type, group_id) VALUES ('$name', '$email', '$mobilenumber','$password','$username', '$type', '$group_id')";
    $result = $dbHandler->executeQuery($sql);
    header("Location:all.php");
} catch  (Exception $e) {
    $error_message = "An error occurred while processing your request. Please try again later.";
}
        
    }
}

// require_once '../../vendor/autoload.php';
// require_once 'user_validation.php';

// $dbHandler = new MySqlHandler('users');

// $errors = [];

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $mobileNumber = $_POST['mobilenumber'];
//     $password = $_POST['password'];
//     $username = $_POST['username'];
//     $type = $_POST['type'];
//     $group_id = $_POST['group_id'];

//     if (empty($name) || empty($email) || empty($password) || empty($mobileNumber) || empty($username)) {
//         $errors[] = "All fields are required";
//     }

//     $errors[] = validateName($name);
//     $errors[] = validateEmail($email, $dbHandler);
//     $errors[] = validateMobileNumber($mobileNumber);
//     $errors[] = validatePassword($password);
//     $errors[] = validateUsername($username);

//     $errors = array_filter($errors);

//     if (empty($errors)) {
//         try {
//             $sql = "INSERT INTO users (name, email, mobile_number,password,username, type, group_id) VALUES ('$name', '$email', '$mobileNumber','$password','$username', '$type', '$group_id')";
//             $result = $dbHandler->executeQuery($sql);
//             header("Location:all.php");
//             exit;
//         } catch (Exception $e) {
//             $errors[] = "An error occurred while processing your request. Please try again later.";
//         }
//     }
// }

?>