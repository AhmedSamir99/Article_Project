<?php 
require_once("vendor/autoload.php");
function remember_Variable($var){
    if(isset($_POST[$var])&&!empty($_POST[$var])){
        return $_POST[$var];
}}
session_start();

$db= new MySqlHandler("users");

if(isset($_GET["id"]) && is_numeric ($_GET["id"])){
    require_once("views/single.php");
}
else{
    
    require_once("views/all.php");
}
?>