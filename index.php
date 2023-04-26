<?php 
require_once("vendor/autoload.php");
session_start();

$db= new MySqlHandler("users");
$articles= new MySqlHandler("articles");
        
require_once("views/login.php");
?>