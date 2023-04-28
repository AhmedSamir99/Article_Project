<?php 
require_once("vendor/autoload.php");
session_start();

// try {
//     $db= new MySqlHandler("users");
//     $articles= new MySqlHandler("articles");
// } catch (Exception $e) {
//     // handle the exception
//     die("Could not connect to the database");
// }

require_once("views/login_form.php");

?>