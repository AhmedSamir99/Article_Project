<?php 
require_once("vendor/autoload.php");
session_start();

$dbHandler = new MySqlHandler('users');


require_once("views/login/login_form.php");

?>